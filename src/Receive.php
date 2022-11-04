<?php

namespace Eugene\SimpleRabbit;

use Eugene\SimpleRabbit\Base\Ampq;

class Receive extends Ampq
{
    public function receive()
    {
        print("oi");
        $this->channel->basic_consume($this->queue, '', false, true, true, true, function ($msg) {
            //echo ' [x] Received2 ', $msg->body, "\n";
            die;
        });
        print("oi");
        while ($this->channel->is_consuming()) {
            $this->channel->wait();
        }

    }
}