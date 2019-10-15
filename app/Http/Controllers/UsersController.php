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
        ->orderBy('workerid')->orderBy('projectid')
        ->select('*', 'team.name as tname', 'projects.name as pname')
        ->get();
        $sortx5 = $unsort;
        //$sortx5 = collect($unsort);
        //
        //echo($sortx5);
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

    public function test2()
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
        

           return view('test', [
               'qes' => Qes::all()->sortByDesc('projectid')->sortByDesc('workerid'),

           //'users' => User::all(),
          // 'workers' => Worker::all(),
           
           ]);
    }
}