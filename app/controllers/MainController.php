<?php

namespace app\controllers;

use app\models\MessageModel;
use app\models\UserModel;
use vendor\core\base\View;

/**
 * Created by Nikolay Tuzov
 */
class MainController extends AppController
{
    public function actionIndex()
    {
//        \R::fancyDebug(true);
//        App::$app->getList();
//        $model = new Main();


//        $windows = Main::findAll();

//        $windows = App::$app->cache->get('windows');
//        if (!$windows) {
//            $windows = Main::findAll();
//            App::$app->cache->set('windows', $windows, 3600 * 24);
//        }

        $messageModel = new MessageModel();
        $messages = MessageModel::findAll();

        $userModel = new UserModel();
        $users = UserModel::findAll();

//        $menu = $this->menu;

        View::setMeta([
            'title' => 'Главная страница',
            'keywords' => 'Meta main keywords',
            'description' => 'Meta main description'
        ]);

        $this->setData(
            compact('messages', 'users')
        );
    }

    public function actionTest()
    {
        if ($this->isAjax()) {
//            $model = new Main();
//            $window = \R::findOne('messages', "id = {$_POST['id']}");


//            $this->loadView('_test', compact('window'));
            $this->loadView('_test', []);

            $this->layout = false;
        }

    }

}