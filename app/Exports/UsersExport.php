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
    public function view(): View
    {
        return view('test', [
            'qes' => Qes::all()->sortByDesc('projectid')->sortByDesc('workerid'),
            //'qes' => Qes::with('worker')->get(),

        ]);
    }
}
