<?php

namespace app\models;

use vendor\core\base\BaseModel;

/**
 * created by: Nikolay Tuzov
 */
class UserModel extends BaseModel
{
    public static $table = 'user';

    /**
     * @param $name
     * @param $password
     * @return array
     */
    public static function add($name, $password)
    {
        $userDuplicate = \R::find('user', ' name = ? ', [$name]);

        if (!$userDuplicate) {
            $user = \R::dispense('user');
            $user->name = $name;
            $user->password = md5($password);
            $user->created_at = time();

            $id = \R::store($user);
            $res = ['id' => $id];
        } else {
            $res = ['error' => 'Такой пользователь уже есть!'];
        }

        return $res;
    }

    public static function login($name, $password)
    {
        $user = \R::findOne('user', ' name = ? ', [$name]);

        if ($user && $user['password'] == md5($password)) {
            $_SESSION['user_id'] = $user->id;
            $_SESSION['user_name'] = $user->name;

            return $user->id;
        }

        return false;
    }

    public static function getAvatarLink($userId)
    {
        $user = \R::findOne('user', ' id = ? ', [$userId]);
        $avaNum = $user['avatar'];

        return "/img/avatars/{$avaNum}.jpg";
    }
}