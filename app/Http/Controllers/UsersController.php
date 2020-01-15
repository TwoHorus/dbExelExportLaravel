<?php
namespace App\Http\Controllers;

use App\User;
use App\Worker;
use App\Qes;
use App\Kostentraeger;
use App\Project;
use App\Projecttype;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Illuminate\Http\Request;

class UsersController extends Controller
{
/**
 * @return BinaryFileResponse
 */
    public function export()
    {
        //Example for calling download
        return Excel::download(new UsersExport(1086), 'users.xlsx');
    }

    public function homeselect()
    {
        return view(
            'welcome',
            [
            'years' => \DB::Table('quarter')->select('year')->groupBy('year')->get()
            ]
        );
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


    public function handleInquiry(Request $yearAndType)
    {
        $CLEANINGFLAG=0;
        
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


        $ids = QES::groupBy(['workerid','projectid','quarterid','id'])
        ->select('id')
        ->get();
        if ($CLEANINGFLAG==1) {
            //only drop if cleaning is on
            dd($ids);
            dd(QES::whereNotIn('id', $ids)->get());
            die();
            QES::whereNotIn('id', $ids)->delete();
        }
        $this->validate($yearAndType, [
        'year' => 'bail|required|integer',
        'ACTION' => 'bail|required|string',
        ]);
        $objecthere=\DB::Table('qes')
            ->join('projects', 'qes.projectid', '=', 'projects.id')
            ->join('worker', 'qes.workerid', '=', 'worker.id')
            ->join('team', 'worker.teamid', '=', 'team.id')
            ->join('quarter', 'qes.quarterid', '=', 'quarter.id')
            ->join('projecttype', 'projecttypeid', '=', 'projecttype.id')
            ->join('contractmodel', 'worker.contractmodelid', '=', 'contractmodel.id')
            ->join('kostentraeger', 'projects.ktid', '=', 'kostentraeger.id')
            ->where('year', '=', $yearAndType->input('year'))//this is the variable part
            ->orderBy('workerid')->orderBy('projectid')
            ->select('*', 'team.name as tname', 'projects.name as pname', 'projecttype.name as ptypename', 'kostentraeger.name as ktypename', 'contractmodel.name as eg')
        ->get();
        $rows=[];
        $row=null;
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
    //PUT LAST ROW!!!
        $rows[] = $row;
        if ($yearAndType->input('ACTION') == 'preview') {
            return view('test', ['qes' => $rows,'uienabled' => 'true' ]);
        }
        if ($yearAndType->input('ACTION') == 'export') {
            return Excel::download(new UsersExport($yearAndType->input('year')), 'QES_'.$yearAndType->input('year').'.xlsx');
        }
    }
}
