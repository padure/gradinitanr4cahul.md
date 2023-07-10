<?php
namespace App\Repositories\Menu;

interface MenuInterface {
    public function getAll();
    public function find($id);
    public function save($data);
    public function update($data, $model);
    public function delete($data);
}