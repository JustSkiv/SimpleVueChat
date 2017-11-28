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
//        unset($_SESSION['user_id']);
//        unset($_SESSION['user_name']);
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

    public function actionAddAjax()
    {
        if ($this->isAjax() && isset($_POST['text']) && !empty($_SESSION['user_id'])) {
            $this->layout = false;

            $messageModel = new MessageModel();
            $text = htmlspecialchars($_POST['text']);
//            $messageId = MessageModel::add($text, 1);
            $messageId = 1;

            $message = $text;
            // соединяемся с локальным tcp-сервером
            $instance = stream_socket_client('tcp://127.0.0.1:1234');
            // отправляем сообщение
            fwrite($instance, json_encode([
                'body' => ['text' => "$message", 'name' => $_SESSION['user_name'], 'userId' => $_SESSION['user_id']]
            ]));

            echo json_encode([$messageId]);
        }

        return json_encode(json_encode(array('message' => 'ERROR', 'code' => 1337)));
    }

    public function actionGetAjax()
    {
        if ($this->isAjax()) {
            $this->layout = false;

            $messageModel = new MessageModel();
            $messages = MessageModel::findAll();
            $userModel = new UserModel();
            $users = UserModel::findAll();

            $result = [];

            foreach ($messages as $message) {
                $result[] = [
                    'text' => $message['text'],
                    'name' => $users[$message['user_id']]['name'],
                ];
            }

            echo json_encode($result);
        }

        return json_encode(json_encode(array('message' => 'ERROR', 'code' => 1337)));
    }

    public function actionSignUp()
    {
        if ($this->isAjax()) {
            $this->layout = false;

            if (empty($_POST['name']) || empty($_POST['password'])) {
                echo json_encode(['error' => 'Заполни поля!']);
                return;
            }

            $name = $_POST['name'];
            $password = $_POST['password'];

            $userModel = new UserModel();
            $res = $userModel->add($name, $password);

            echo json_encode($res);
        }
    }

    public function actionSignIn()
    {
        if ($this->isAjax()) {
            $this->layout = false;

            if (empty($_POST['name']) || empty($_POST['password'])) {
                echo json_encode(['error' => 'Заполни поля!']);
                return;
            }

            $name = $_POST['name'];
            $password = $_POST['password'];

            $userModel = new UserModel();

            if ($id = $userModel->login($name, $password)) {
                $res = ['id' => $id];
            } else {
                $res = ['error' => 'oops! =('];
            }


            echo json_encode($res);
        }
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