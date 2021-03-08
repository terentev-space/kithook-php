<?php

namespace KitHook\Interfaces;

use KitHook\Entities\Messages\QueueMessage;

interface ClientInterface
{
    public function send(QueueMessage $message): void;
}
