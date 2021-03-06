<?php

namespace App\Exports;

use App\User;
use App\Worker;
use App\Qes;
use App\Kostentraeger;
use App\Project;
use App\Projecttype;


use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class UsersExport implements FromView, ShouldAutoSize
{

    private $year;

    public function __construct(int $year)
    {
        $this->year = $year;
    }
    public function insertdata($row, $datapoint)
    {
        switch ($datapoint->quarter->q ?? $datapoint->q) {
            case '1':
                $row->desiredstate1 = $datapoint->desiredstate;
                $row->actualstate1 = $datapoint->actualstate;
                break;
            case '2':
                $row->desiredstate2 = $datapoint->desiredstate;
                $row->actualstate2 = $datapoint->actualstate;
                break;
            case '3':
                $row->desiredstate3 = $datapoint->desiredstate;
                $row->actualstate3 = $datapoint->actualstate;
                break;
            case '4':
                $row->desiredstate4 = $datapoint->desiredstate;
                $row->actualstate4 = $datapoint->actualstate;
                break;
            default:
                break;
        }
        return $row;
    }

    public function view(): View
    {
        $objecthere=\DB::Table('qes')
        ->join('projects', 'qes.projectid', '=', 'projects.id')
        ->join('worker', 'qes.workerid', '=', 'worker.id')
        ->join('team', 'worker.teamid', '=', 'team.id')
        ->join('quarter', 'qes.quarterid', '=', 'quarter.id')
        ->join('projecttype', 'projecttypeid', '=', 'projecttype.id')
        ->join('contractmodel', 'worker.contractmodelid', '=', 'contractmodel.id')
        ->join('kostentraeger', 'projects.ktid', '=', 'kostentraeger.id')
        ->where('year', '=', $this->year)//this is the variable part
        ->orderBy('workerid')->orderBy('projectid')
        ->select('*', 'team.name as tname', 'projects.name as pname', 'projecttype.name as ptypename', 'kostentraeger.name as ktypename', 'contractmodel.name as eg')
        ->get();
        $rows=[];
        $emptyrow= (object)[
        'workerid' => null,
        'projectid' => null,
        'dent' => 'project',// NEW LINE
        'desiredstate1' => '',
        'actualstate1' => '',
        'desiredstate2' => '',
        'actualstate2' => null,
        'desiredstate3' => null,
        'actualstate3' => null,
        'desiredstate4' => null,
        'actualstate4' => null,
        'projecttypename' => '',
        'projectname' => ' ',
        'funding' => '',
        'drittmittel' => '',
        'kt' => null,
        'eg' => '',// LATER ADD AS FEATURE
        'manhoursinamonth' => null,
        'sender' => 'default',
        'firstname' => ' ',
        'lastname' => ' ',
        'teamname' => ' ',
        ];
        $currentworker=-1;
        $currentproject=-1;
        $firstmismatch=1;
        foreach ($objecthere as $datapoint) {
            if ($currentworker==$datapoint->workerid) {//SAME WORKER
                if ($currentproject==$datapoint->projectid) {//SAME PROJECT
                    //READDATATOROW
                    $row=$this->insertdata($row, $datapoint);
                } else {
                    $currentproject=$datapoint->projectid;//UPDATE PROJECT
                //PUT ROW INTO OUR OBJECTLIST FIRST
                    $rows[] = $row;
                    $row = (object)[
                    'workerid' => null,
                    'projectid' => null,
                    'dent' => 'project',// NEW LINE
                    'desiredstate1' => null,
                    'actualstate1' => null,
                    'desiredstate2' => null,
                    'actualstate2' => null,
                    'desiredstate3' => null,
                    'actualstate3' => null,
                    'desiredstate4' => null,
                    'actualstate4' => null,
                    'projecttypename' => $datapoint->project->type->name ?? ' ',
                    'projectname' => $datapoint->project->name ?? $datapoint->pname,
                    'funding' => $datapoint->project->type->name ?? $datapoint->ptypename,
                    'drittmittel' => 0,
                    'kt' => $datapoint->project->kostentraeger->name ?? $datapoint->ktypename ?? ' ' ,
                    'eg' => '',// LATER ADD AS FEATURE
                    'manhoursinamonth' => 'X',
                    'sender' => 'default',
                    'firstname' => ' ',
                    'lastname' => ' ',
                    'teamname' => ' ',
                    ];
                //READING Q DATA DYNAMICALLY
                    $row=$this->insertdata($row, $datapoint);
                }
            } else {
                $currentworker = $datapoint->workerid; //WORKER IS WORKERNOW
                $currentproject=$datapoint->projectid; //PROJECT IS PROJECT NOW
                if ($firstmismatch==1) {//SPECIAL FIRST ROW ONLY
                    $firstmismatch=0;
                //FIRST ROW IS NULL NOW
                } else {
                //PUT ROW INTO OUR OBJECTLIST FIRST
                    $rows[] = $row;
                    $rows[] = $emptyrow;
                }
            //THEN READ NEW DATA TO NEW ROW OBJECT
                $row = (object)[
                'workerid' => $datapoint->workerid,
                'projectid' => $datapoint->projectid,
                'dent' => 'new',// NEW LINE
                'desiredstate1' => null,
                'actualstate1' => null,
                'desiredstate2' => null,
                'actualstate2' => null,
                'desiredstate3' => null,
                'actualstate3' => null,
                'desiredstate4' => null,
                'actualstate4' => null,
                'projecttypename' => $datapoint->project->type->name ?? ' ',
                'projectname' => $datapoint->project->name ?? $datapoint->pname,
                'funding' => $datapoint->project->type->name ?? $datapoint->ptypename,
                'drittmittel' => 0,
                'kt' => $datapoint->project->kostentraeger->name ?? $datapoint->ktypename ?? ' ' ,
                'eg' => $datapoint->eg,
                'manhoursinamonth' => $datapoint->manhoursinamonth,
                'sender' => 'default',
                'firstname' => $datapoint->worker->firstname ?? $datapoint->firstname,
                'lastname' => $datapoint->worker->lastname ?? $datapoint->lastname,
                'teamname' => $datapoint->worker->team->name ?? $datapoint->tname,
                ];
            //READING Q DATA DYNAMICALLY
                $row=$this->insertdata($row, $datapoint);
            }
        }
        $rows[] = $row;
    // Set auto size for sheet

        return view('test', ['qes' => $rows,'uienabled' => 'false' ]);
    }
}
