<?php
/**
 * Created by PhpStorm.
 * User: PC01
 * Date: 9/17/2018
 * Time: 5:06 PM
 */

namespace App\Http\Controllers\ApiController;

use Sentinel;
use Validator;
use Log;
use Helper;
use Illuminate\Http\Request;
use App\Services\Repositories\Interfaces\UserInterface;

class UsersController extends BaseController
{
    protected $userRepository;

    public function __construct(UserInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getProfileUser()
    {
        dd(Sentinel::getUser()->roles);
    }

    public function store(Request $request)
    {
        $newUser = $request->only('username', 'password', 'phone', 'email', 'full_name');
        $validator = Validator::make($request->all(), [
            'username' => 'required|unique:users',
            'password'  =>  'required',
            'full_name' =>  'required',
        ]);
        if( $validator->fails() ){
            return $this->sendError('Error.', $validator->errors()->first());
        }

        //Insert user
        $user = $this->userRepository->insert($newUser);
        $data['role'] = $request->role ? $request->role : 3;

        //Find role and setting user Role
        $role = Sentinel::findRoleById($data['role']);
        $role->users()->attach($user);

        //Save log
        Log::info('A user has been created', array('ItemID' => $user->id, 'Module' => 'User'));
        return $this->sendResponse($user, 'Create user success');
    }

    public function getListUsers()
    {
        $users = $this->userRepository->all();
        return $this->sendResponse($users);
    }

}