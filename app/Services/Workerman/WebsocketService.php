<?php
/**
 * Created by PhpStorm.
 * User: Samuel
 * Date: 2019/6/18
 * Time: 18:15
 */

namespace App\Services\Workerman;

use Workerman\Protocols\Websocket;
use Workerman\Worker;

class WebsocketService
{
    /**
     * @var Websocket
     */
    protected $websocketServer;

    protected $connDataArr = [];

    public function __construct($host='0.0.0.0', $port=3001)
    {
        $this->websocketServer =
        $server = new Worker("websocket://{$host}:{$port}");
        $server->onWorkerStart = [$this, 'onStart'];
        $server->onMessage = [$this, 'onMessage'];
        $server->onWorkerStart = [$this, 'onStart'];
        Worker::runAll();
    }

    public function onStart()
    {
        echo "this is onstart...\n";
    }

    public function onConnect($conn)
    {
        echo "connected\n";
        $this->connDataArr[] = $conn;
        if ($this->connDataArr) {
            $data = [
                'msg'=>"欢迎新用户登录上线！",
                'time'=>date('Y-m-d H:i:s'),
            ];
            $data = json_encode($data, JSON_UNESCAPED_SLASHES);
            foreach ($this->connDataArr as $oneConn) {
                $oneConn->send($data);
            }
        }
    }

    public function onMessage($connect, $data)
    {
        echo "some message\n";
        $msgData = $data;
        $msgDataArr = json_decode($msgData, true);
        print_r($data);
        echo PHP_EOL;
        if ($this->websocketServer->connections) {
            foreach ($this->websocketServer->connections as $oneConn) {
                if ($connect == $oneConn) {
                    continue;
                }
                $oneConn->send(json_encode($msgData, JSON_UNESCAPED_UNICODE));
            }
        }
    }

    public function onClose()
    {
        echo "closed..\n";
    }
}
