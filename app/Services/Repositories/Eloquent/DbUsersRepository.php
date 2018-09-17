<?php
/**
 * Created by PhpStorm.
 * User: PC01
 * Date: 9/17/2018
 * Time: 7:28 PM
 */

namespace App\Services\Repositories\Eloquent;

use App\Services\Repositories\Interfaces\UserInterface;
use DB;
use Helper;
use Sentinel;

class DbUsersRepository extends RepositoriesAbstract implements UserInterface
{

    public function insert($data)
    {
        // register user using Sentnel
        $user = Sentinel::registerAndActivate($data);
        return $user;
    }
}