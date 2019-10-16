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

class UsersExport implements FromView
{
    
    private $year;

    public function __construct(int $year)
    {
        $this->year = $year;
    }

    public function view(): View
    {
    //     return view('test', [
    //         'qes' => Qes::all()->sortByDesc('projectid')->sortByDesc('workerid'),
    //         //'qes' => Qes::with('worker')->get(),

    //     ]);
        //echo $this->year;
        //die();
        return view('test', [
        'qes' => \DB::Table('Qes')
        ->orderBy('Worker')
        ->join('projects', 'Qes.projectid', '=', 'projects.id')
        ->join('worker', 'Qes.workerid', '=', 'worker.id')
        ->join('team', 'worker.teamid', '=', 'team.id')
        ->join('quarter', 'Qes.quarterid', '=', 'quarter.id')
        ->join('projecttype', 'projecttypeid', '=', 'projecttype.id')
        ->where('year', '=', $this->year)//this is the variable part
        ->orderBy('workerid')->orderBy('projectid')
        ->select('*', 'team.name as tname', 'projects.name as pname', 'projecttype.name as ptypename')
        ->get()]);
    }
}
