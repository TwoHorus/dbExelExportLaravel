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
            'qes' => \DB::Table('Qes')
            ->orderBy('Worker')
            ->join('projects', 'Qes.projectid', '=', 'projects.id')
            ->join('worker', 'Qes.workerid', '=', 'worker.id')
            ->join('team', 'worker.teamid', '=', 'team.id')
            ->join('quarter', 'Qes.quarterid', '=', 'quarter.id')
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

        $unsort = \DB::Table('Qes')
        ->orderBy('Worker')
        ->join('projects', 'Qes.projectid', '=', 'projects.id')
        ->join('worker', 'Qes.workerid', '=', 'worker.id')
        ->join('team', 'worker.teamid', '=', 'team.id')
        ->join('quarter', 'Qes.quarterid', '=', 'quarter.id')
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
          'worker' => Worker::all(),
          'users' => User::all(),
           'projects' => Project::all(),
           'types' => Projecttype::all(),*/
        ]);
    }

    public function homeselect()
    {
        $user = Qes::all();
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
          // 'workers' => Worker::all(),
           
           ]);
    }

    public function handleInquiry(Request $yearAndType)
    {
        $ids = QES::groupBy(['workerid','projectid','quarterid'])
            
            ->select('id')
            ->get();
           //$ids=QES::get()->all();
           
           //dd(QES::whereNotIn('id', $ids)->get());
            //die();
            QES::whereNotIn('id', $ids)->delete();
        
        $this->validate($yearAndType, [
            'year' => 'bail|required|integer',
            'ACTION' => 'bail|string|required',
          ]);
         // echo ($yearAndType->input('year'));
         /* dd(\DB::Table('Qes')
          ->orderBy('Worker')
          ->join('projects', 'Qes.projectid', '=', 'projects.id')
          ->join('worker', 'Qes.workerid', '=', 'worker.id')
          ->join('team', 'worker.teamid', '=', 'team.id')
          ->join('quarter', 'Qes.quarterid', '=', 'quarter.id')
          ->join('projecttype', 'projecttypeid', '=', 'projecttype.id')
          ->join('contractmodel', 'worker.contractmodelid', '=', 'contractmodel.id')
          ->join('kostentraeger', 'projects.ktid', '=', 'kostentraeger.id')
          ->where('year', '=', $yearAndType->input('year'))//this is the variable part
          ->orderBy('workerid')->orderBy('projectid')
          ->select('*', 'team.name as tname', 'projects.name as pname', 'projecttype.name as ptypename', 'kostentraeger.name as ktypename', 'contractmodel.name as eg')
          ->get());*/
          //die();
        if ($yearAndType->input('ACTION') == 'preview') {
            return view('test', [
              'qes' => \DB::Table('Qes')
            ->orderBy('Worker')
            ->join('projects', 'Qes.projectid', '=', 'projects.id')
            ->join('worker', 'Qes.workerid', '=', 'worker.id')
            ->join('team', 'worker.teamid', '=', 'team.id')
            ->join('quarter', 'Qes.quarterid', '=', 'quarter.id')
            ->join('projecttype', 'projecttypeid', '=', 'projecttype.id')
            ->join('contractmodel', 'worker.contractmodelid', '=', 'contractmodel.id')
            ->join('kostentraeger', 'projects.ktid', '=', 'kostentraeger.id')
            ->where('year', '=', $yearAndType->input('year'))//this is the variable part
            ->orderBy('workerid')->orderBy('projectid')
            ->select('*', 'team.name as tname', 'projects.name as pname', 'projecttype.name as ptypename', 'kostentraeger.name as ktypename', 'contractmodel.name as eg')
            ->get(),
            'uienabled' => 'true'
            ]);
        }
        if ($yearAndType->input('ACTION') == 'export') {
            return Excel::download(new UsersExport($yearAndType->input('year')), 'users.xlsx');
            /* return view('test', [
              'qes' => \DB::Table('Qes')
            ->orderBy('Worker')
            ->join('projects', 'Qes.projectid', '=', 'projects.id')
            ->join('worker', 'Qes.workerid', '=', 'worker.id')
            ->join('team', 'worker.teamid', '=', 'team.id')
            ->join('quarter', 'Qes.quarterid', '=', 'quarter.id')
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
