<?php
/**
 * Created by PhpStorm.
 * User: PC01
 * Date: 9/17/2018
 * Time: 5:06 PM
 */

namespace App\Http\Controllers\ApiController;

use Sentinel;

class UsersController extends BaseController
{
    public function getProfileUser()
    {
        dd(Sentinel::getUser());
    }
}