<?php
namespace app\models;

use vendor\core\base\BaseModel;
/**
 * created by: Nikolay Tuzov
 */
class MessageModel extends BaseModel
{
    public static $table = 'message';

    /**
     * @param $text
     * @param $userId
     * @return int
     */
    public static function add($text, $userId)
    {
        $message = \R::dispense('message');

        $message->text = $text;
        $message->user_id = $userId;
        $message->created_at = time();

        $id = \R::store($message);

        return $id;
    }
}