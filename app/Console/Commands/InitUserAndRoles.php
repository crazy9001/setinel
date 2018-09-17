<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
use Helper;
use Sentinel;

class InitUserAndRoles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'init:user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->initUserAndRoles();
    }

    public function initUserAndRoles()
    {
        DB::table('users')->truncate();
        DB::table('roles')->truncate();
        DB::table('role_users')->truncate();
        DB::table('activations')->truncate();
        DB::table('persistences')->truncate();
        DB::table('throttle')->truncate();

        $secretary = [
            'name' => 'Secretary',
            'slug' => 'secretary',
            'permissions' => Helper::getDefaultPemissionByRole('Secretary')
        ];
        $secretaryRole = Sentinel::getRoleRepository()->createModel()->fill($secretary)->save();

        $editor = [
            'name' => 'Editor',
            'slug' => 'editor',
            'permissions' => Helper::getDefaultPemissionByRole('Editor')
        ];
        $editorRole = Sentinel::getRoleRepository()->createModel()->fill($editor)->save();

        $reporter = [
            'name' => 'Reporter',
            'slug' => 'reporter',
            'permissions' => Helper::getDefaultPemissionByRole('Reporter')
        ];
        $reporterRole = Sentinel::getRoleRepository()->createModel()->fill($reporter)->save();

        $secretaryUser = [
            'email'    => 'ngoctoi.it@gmail.com',
            'username'  => 'ngoctoi.it',
            'password' => '123456',
            'full_name' =>  'Nguyễn Ngọc Tới',
            'permissions' => Helper::getDefaultUserPemission()
        ];

        $editorUser = [
            'email'    => 'maianhbao@gmail.com',
            'username'  => 'maianhbao',
            'password' => '123456',
            'full_name' =>  'Mai Anh Bảo',
            'permissions' => Helper::getDefaultUserPemission()
        ];

        $reporterUser = [
            'email'    => 'haduykhanh@gmail.com',
            'username'  => 'haduykhanh',
            'password' => '123456',
            'full_name' =>  'Hà Duy Khánh',
            'permissions' => Helper::getDefaultUserPemission()
        ];

        $userSecretary = Sentinel::registerAndActivate($secretaryUser);
        $userSecretary->roles()->attach(1);

        $userEditor = Sentinel::registerAndActivate($editorUser);
        $userEditor->roles()->attach(2);

        $userReporter = Sentinel::registerAndActivate($reporterUser);
        $userReporter->roles()->attach(3);

    }
}
