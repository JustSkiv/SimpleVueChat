<?php
/**
 * created by: Nikolay Tuzov
 */

require_once __DIR__ . '/../vendor/autoload.php';

use Workerman\Worker;

// массив для связи соединения пользователя и необходимого нам параметра
$users = [];

// создаём ws-сервер, к которому будут подключаться все наши пользователи
$ws_worker = new Worker("websocket://0.0.0.0:8000");
// создаём обработчик, который будет выполняться при запуске ws-сервера
$ws_worker->onWorkerStart = function () use (&$users) {
    // создаём локальный tcp-сервер, чтобы отправлять на него сообщения из кода нашего сайта
    $inner_tcp_worker = new Worker("tcp://127.0.0.1:1234");
    // создаём обработчик сообщений, который будет срабатывать,
    // когда на локальный tcp-сокет приходит сообщение
    $inner_tcp_worker->onMessage = function ($connection, $data) use (&$users) {
        $data = json_decode($data);

        echo "user {$data->body->name} (id: {$data->body->userId}) sent message: {$data->body->text}\n";

//        var_dump($connection);
        if (isset($users)) {
            foreach ($users as $userName => $connections) {
                foreach ($connections as $id => $connection) {
                    $connection->send(json_encode($data->body));
                }
            }
        }
        // отправляем сообщение пользователю по userId
//        if (isset($users[$data->user])) {
//            $webconnection = $users[$data->user];
//            $webconnection->send($data->message);
//        }


    };
    $inner_tcp_worker->listen();
};

$ws_worker->onConnect = function ($connection) use (&$users) {
    $connection->onWebSocketConnect = function ($connection) use (&$users) {
        $userName = $_GET['user'];

        // при подключении нового пользователя сохраняем get-параметр, который же сами и передали со страницы сайта
        $users[$userName][$connection->id] = $connection;
        // вместо get-параметра можно также использовать параметр из cookie, например $_COOKIE['PHPSESSID']

        $userConnectionsCount = count($users[$userName]);

        echo "{$userName}[{$connection->id}] connected ({$userConnectionsCount})\n";
    };
};

$ws_worker->onClose = function ($connection) use (&$users) {
    echo "someone is leaving...\n";

    // удаляем параметр при отключении пользователя
    $leavedUser = '<unkonown>';

    foreach ($users as $user => $connections) {
        $userConnectionsCount = count($connections);
        echo "is it {$user} ({$userConnectionsCount})?\n";

        if($leavedConnection = array_search($connection, $connections)){
            $leavedUser = $user;

            unset($users[$user][$connection->id]);
            echo "{$leavedUser}[{$connection->id}] leaved\n";

            break;
        } else {
            echo "no...\n";
        }
    }

};

// Run worker
Worker::runAll();