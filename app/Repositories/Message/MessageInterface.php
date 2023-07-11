<?php
namespace App\Repositories\Message;

interface MessageInterface {
    public function getAll();
    public function delete($model);
}