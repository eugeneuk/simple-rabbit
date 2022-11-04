<?php

namespace Eugene\SimpleRabbit;

use Eugene\SimpleRabbit\Base\Ampq;
use Eugene\SimpleRabbit\Interfaces\SendInterface;

class OneWay extends Ampq implements SendInterface
{
    public $result;

    /**
     * Send data to RabbitMq
     * string @param $message
     * @return mixed
     */
    public function send($message) : string
    {
        $this->setMessage($message);
        $this->channel->basic_publish($this->message, '', $this->queue);
        return $this->message->body;
    }

    /**
     * Receive data from RabbitMq
     * @return string
     */
    public function receive() : string
    {
       $callback = function ($result){
            $this->result = $result->body;
       };

       $this->channel->basic_consume($this->queue, '', false, true, false, false, $callback);


       while ($this->channel->is_consuming()) {
            if(!$this->channel->wait()){
                break;
            }
       }

       return $this->result;
    }
}