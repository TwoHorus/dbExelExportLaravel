<?php
use App\User;

use App\Worker;
use App\Qes;
use App\Quarter;
use App\Kostentraeger;
use App\Project;
use App\Projecttype;
use App\Team;
use App\Contractmodel;
//use App\Accepted;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(AcceptedTableSeeder::class);
        $this->call(AdminsTableSeeder::class);
        $this->call(ContractmodelTableSeeder::class);
        $this->call(KostentraegerTableSeeder::class);
        $this->call(PasswordResetsTableSeeder::class);
        $this->call(ProjectsTableSeeder::class);
        $this->call(ProjecttypeTableSeeder::class);
        $this->call(QesTableSeeder::class);
        $this->call(QesgroupTableSeeder::class);
        $this->call(QuarterTableSeeder::class);
        $this->call(RequestTableSeeder::class);
        $this->call(TeamTableSeeder::class);
        $this->call(TeamprojectassignTableSeeder::class);
        $this->call(UsergroupassignTableSeeder::class);
        $this->call(WorkerTableSeeder::class);
        $this->call(WorkerprojectassignTableSeeder::class);

        //factory(Worker::class, 50)->create([]);
        factory(Team::class, 4)->create([]);

        factory(User::class, 7)->create([]);
        //factory(Accepted::class, 100)->create([]);
        //factory(Admins::class, 100)->create([]);
        factory(Contractmodel::class, 19)->create([]);
        factory(Kostentraeger::class, 100)->create([]);
        factory(Project::class, 6)->create([]);
        factory(Projecttype::class, 4)->create([]);
        //factory(Qesgroup::class, 100)->create([]);
        factory(Quarter::class, 17)->create([]);
        //factory(Request::class, 100)->create([]);
        
        //factory(Teamprojectassign::class, 100)->create([]);
        //factory(Usergroupassign::class, 100)->create([]);
        //factory(Workerprojectassign::class, 100)->create([]);

        factory(Qes::class, 400)->create([]);
    }
}
