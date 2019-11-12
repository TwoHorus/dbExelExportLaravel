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
        return Excel::download(new UsersExport(), 'users.xlsx');
    }
    public function exportPreview()
    {
        return view('test', [
        'qes' => \DB::Table('qes')
        ->join('projects', 'qes.projectid', '=', 'projects.id')
        ->join('worker', 'qes.workerid', '=', 'worker.id')
        ->join('team', 'worker.teamid', '=', 'team.id')
        ->join('quarter', 'qes.quarterid', '=', 'quarter.id')
        ->join('projecttype', 'projecttypeid', '=', 'projecttype.id')
        ->join('kostentraeger', 'projects.ktid', '=', 'kostentraeger.id')
        ->where('year', '=', 2016)//this is the variable part
        ->orderBy('workerid')->orderBy('projectid')
        ->select('*', 'team.name as tname', 'projects.name as pname', 'projecttype.name as ptypename', 'kostentraeger.name as ktypename')
        ->get()]);




        $unsort = Qes::all();//->sortBy('workerid');
        $sortx2 = $unsort->sortBy('workerid'.'projectid');
    //echo($sortx2);
        $unsort = Qes::all()->sortBy('projectid');
        $sortx3 = $unsort->sortBy('workerid');

        $unsort = \DB::Table('qes')
        ->join('projects', 'qes.projectid', '=', 'projects.id')
        ->join('worker', 'qes.workerid', '=', 'worker.id')
        ->join('team', 'worker.teamid', '=', 'team.id')
        ->join('quarter', 'qes.quarterid', '=', 'quarter.id')
        ->join('projecttype', 'projecttypeid', '=', 'projecttype.id')
        ->join('kostentraeger', 'projects.ktid', '=', 'kostentraeger.id')
    //->where('lastname', '=', 'Yost')
        ->where('year', '=', 2020)
        ->orderBy('workerid')->orderBy('projectid')
        ->select('*', 'team.name as tname', 'projects.name as pname', 'projecttype.name as ptypename', 'kostentraeger.name as ktypename')
        ->get();
        $sortx5 = $unsort;
    //$sortx5 = collect($unsort);
        echo($sortx5);
    //die();

        return view('test', [
        'qes' => $sortx5,
    //FOR LATER:
    //where('quarterid', '=', '33')->orWhere('quarterid', '=', '30')->get()

    /* NOT NEEDED:
    'worker' => worker::all(),
    'users' => User::all(),
    'projects' => Project::all(),
    'types' => Projecttype::all(),*/
        ]);
    }

    public function homeselect()
    {
       // $user = Qes::all();
    //return $user;
    /* foreach ($user as $XX) {
    echo $XX->worker.'</br>';
    echo $XX->contractmodelid;
    echo '</br></br></br>';
    }*/
    //return 0;
    //return $user;

        return view(
            'welcome',
            [
            'years' => \DB::Table('quarter')->select('year')->groupBy('year')->get()
            ]
        );
        return view('test', [
        'qes' => Qes::all()->sortByDesc('projectid')->sortByDesc('workerid'),

    //'users' => User::all(),
    // 'workers' => worker::all(),

        ]);
    }

    public function handleInquiry(Request $yearAndType)
    {
        $sumrow = (object)[
            'workerid' => null,
            'projectid' => null,
            'dent' => 'new',// NEW LINE
            'desiredstate1' => '=SUM(I1:I5)',
            'actualstate1' => '=SUM(J1:J5)',
            'desiredstate2' => '=SUM(K1:K5)',
            'actualstate2' => '=SUM(L1:L5)',
            'desiredstate3' => '=SUM(M1:M5)',
            'actualstate3' => '=SUM(N1:N5)',
            'desiredstate4' => '=SUM(O1:O5)',
            'actualstate4' => '=SUM(P1:P5)',
            'projecttypename' => '',
            'projectname' => null,
            'funding' => '',
            'drittmittel' => '',
            'kt' => null,
            'eg' => '',// LATER ADD AS FEATURE
            'manhoursinamonth' => null,
            'sender' => 'default',
            'firstname' => null,
            'lastname' => null,
            'teamname' => null,
            ];
            $emptyrow= (object)[
                'workerid' => null,
                'projectid' => null,
                'dent' => 'new',// NEW LINE
                'desiredstate1' => '',
                'actualstate1' => '',
                'desiredstate2' => '',
                'actualstate2' => null,
                'desiredstate3' => null,
                'actualstate3' => null,
                'desiredstate4' => null,
                'actualstate4' => null,
                'projecttypename' => '',
                'projectname' => null,
                'funding' => '',
                'drittmittel' => '',
                'kt' => null,
                'eg' => '',// LATER ADD AS FEATURE
                'manhoursinamonth' => null,
                'sender' => 'default',
                'firstname' => null,
                'lastname' => null,
                'teamname' => null,
                ];


        $ids = QES::groupBy(['workerid','projectid','quarterid','id'])

        ->select('id')
        ->get();
    //$ids=QES::where('workerid','=',"")->get();
    //dd($ids);
    //dd(QES::whereNotIn('id', $ids)->get());
     //die();
        //QES::whereNotIn('id', $ids)->delete();

        $this->validate($yearAndType, [
        'year' => 'bail|required|integer',
        'ACTION' => 'bail|string|required',
        ]);
    // echo ($yearAndType->input('year'));
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
        $currentworker=-1;
        $currentproject=-1;
        $firstmismatch=1;
        foreach ($objecthere as $datapoint) {
            if ($currentworker==$datapoint->workerid) {//SAME WORKER
                if ($currentproject==$datapoint->projectid) {//SAME PROJECT
                //READDATATOROW
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
                } else {
                    $currentproject=$datapoint->projectid;//UPDATE PROJECT
                //PUT ROW INTO OUR OBJECTLIST FIRST
                    $rows[] = $row;
                    $row = (object)[
                    'workerid' => null,
                    'projectid' => null,
                    'dent' => 'new',// NEW LINE
                    'desiredstate1' => null,
                    'actualstate1' => null,
                    'desiredstate2' => null,
                    'actualstate2' => null,
                    'desiredstate3' => null,
                    'actualstate3' => null,
                    'desiredstate4' => null,
                    'actualstate4' => null,
                    'projecttypename' => $datapoint->project->type->name ?? null,
                    'projectname' => $datapoint->project->name ?? $datapoint->pname,
                    'funding' => $datapoint->project->type->name ?? $datapoint->ptypename,
                    'drittmittel' => 0,
                    'kt' => $datapoint->project->kostentraeger->name ?? $datapoint->ktypename ?? null,
                    'eg' => '',// LATER ADD AS FEATURE
                    'manhoursinamonth' => 'X',
                    'sender' => 'default',
                    'firstname' => null,
                    'lastname' => null,
                    'teamname' => null,
                    ];
                //READING Q DATA DYNAMICALLY
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
                //    $rows[] = $sumrow;
                //    $rows[] = $emptyrow;
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
                'projecttypename' => $datapoint->project->type->name ?? null,
                'projectname' => $datapoint->project->name ?? $datapoint->pname,
                'funding' => $datapoint->project->type->name ?? $datapoint->ptypename,
                'drittmittel' => 0,
                'kt' => $datapoint->project->kostentraeger->name ?? $datapoint->ktypename ?? null,
                'eg' => $datapoint->eg,
                'manhoursinamonth' => $datapoint->manhoursinamonth,
                'sender' => 'default',
                'firstname' => $datapoint->worker->firstname ?? $datapoint->firstname,
                'lastname' => $datapoint->worker->lastname ?? $datapoint->lastname,
                'teamname' => $datapoint->worker->team->name ?? $datapoint->tname,
                ];
            //READING Q DATA DYNAMICALLY
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
            }
        }

    //dd($rows);
    //die();

    //PUT LAST ROW!!!

    $rows[] = $row;


        if ($yearAndType->input('ACTION') == 'preview') {
            return view('test', ['qes' => $rows,'uienabled' => 'true' ]);
        /*return view('test', [
        'qes' => \DB::Table('qes')
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
        ->get(),
        'uienabled' => 'true'
        ]);*/
        }
        if ($yearAndType->input('ACTION') == 'export') {
            return Excel::download(new UsersExport($yearAndType->input('year')), 'users.xlsx');
        /* return view('test', [
        'qes' => \DB::Table('qes')
        ->join('projects', 'qes.projectid', '=', 'projects.id')
        ->join('worker', 'qes.workerid', '=', 'worker.id')
        ->join('team', 'worker.teamid', '=', 'team.id')
        ->join('quarter', 'qes.quarterid', '=', 'quarter.id')
        ->join('projecttype', 'projecttypeid', '=', 'projecttype.id')
        ->where('year', '=', $yearAndType->input('year'))//this is the variable part
        ->orderBy('workerid')->orderBy('projectid')
        ->select('*', 'team.name as tname', 'projects.name as pname', 'projecttype.name as ptypename')
        ->get(),
        'uienabled' => 'true'
        ]); */
        }
    }
}
