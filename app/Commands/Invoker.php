<?php

namespace App\Commands;

class Invoker
{
    private Command $command;

    public function setCommand(Command $command): void
    {
        $this->command = $command;
    }

    public function executeCommand(): array
    {
        return $this->command->execute();
    }     
}
