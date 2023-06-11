<?php
namespace App\Repositories\Event;

interface EventInterface {
    public function getAll();
    public function getEventByCategory($category);
    public function getLast($nr);
    public function find($id);
    public function save($event);
    public function delete($id);
}