<?php

namespace Eugene\SimpleRabbit\Base;

use PhpAmqpLib\Message\AMQPMessage;

class Ampq extends Base
{
    protected $queue;
    protected $message;

    public function setQueue(
        string $queue_name,
        bool $passive = false,
        bool $durable = false,
        bool $exclusive = false,
        bool $auto_delete = false
    ){
        $this->queue = $queue_name;
        $this->channel->queue_declare($this->queue, $passive, $durable, $exclusive, $auto_delete);
        return $this;
    }

    public function setMessage($message){
        $this->message = new AMQPMessage($message);
    }





}