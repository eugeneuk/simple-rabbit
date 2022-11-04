<?php

namespace Eugene\SimpleRabbit\Base;

use Exception;
use PhpAmqpLib\Connection\AMQPStreamConnection;

class Base
{
    protected $connection;
    protected $channel;

    public function __construct(
        string $user = 'guest',
        string $password = 'guest',
        string $host = 'localhost',
        int $port = 5672,
        bool $chanel = null
    ){
        try {
            $this->connection = new AMQPStreamConnection($host, $port, $user, $password);
        }catch (Exception $e){
            var_dump('Connection error!'); ;
        }

        if($chanel === null)
            $this->channel = $this->connection->channel();
    }

    public function setChanel(string $name){
        $this->channel = $this->connection->channel($name);
    }




}