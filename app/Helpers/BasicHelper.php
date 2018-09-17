<?php
/**
 * Created by PhpStorm.
 * User: PC01
 * Date: 9/17/2018
 * Time: 9:11 PM
 */

namespace App\Helpers;

use Config;

class BasicHelper
{
    protected static $dbDateFormat = 'Y-m-d H:i:s';
    protected static $userDateFormat = 'm/d/Y';
    protected static $userDateTimeFormat = 'm/d/Y H:i:s';

    /**
     * This function will be used for setting date, user, in array in case of
     * inserting database row.
     *
     * @param array $data
     * @return array $data
     */
    public static function addInsertNormal($data = array())
    {
        $date = date(self::$dbDateFormat);
        //setting creation and updation dates
        $data['created_at'] = $date;
        $data['updated_at'] = $date;

        return $data;
    }

    /**
     * function set time whene update data
     * function use vendor rating
     * @param array $data
     * @return array
     */
    public static function updateAt($data = array())
    {
        $date = date(self::$dbDateFormat);
        //setting creation and updation dates
        $data['updated_at'] = $date;

        return $data;
    }

    /**
     * function return default permission by roles name
     * @param array $roleName
     * @return array
     */
    public static function getDefaultPemissionByRole($roleName)
    {
        $permissions = Config::get('permission_default')['Default Roles Permission'][$roleName];
        $roles = [];
        foreach($permissions as $value){
            $role = Config::get('permission_default')['Default Permission'][$value];
            foreach($role as $role){
                $key = $role['permission'];
                $roles[$key] = true ;
            }
        }
        return $roles;
    }

    /**
     * function get default all permission user
     * @return array
     */
    public static function getDefaultUserPemission()
    {
        $permissions = Config::get('permission_default')['Default User Permission'];
        $roles = [];
        foreach($permissions as $permission){
            $key = $permission['permission'];
            $roles[$key] = true;
        }
        return $roles;
    }

}