<?php
namespace App\Repositories\Group;

interface GroupInterface {
    public function getAll();
    public function find($id);
    public function save($data);
    public function update($data, $model);
    public function delete($data);
}