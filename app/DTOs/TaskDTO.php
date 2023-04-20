<?php

namespace App\DTOs;

class TaskDTO
{
    public $id;
    public $content;

    public function __construct($id, $content)
    {
        $this->id = $id;
        $this->content = $content;
    }
}
