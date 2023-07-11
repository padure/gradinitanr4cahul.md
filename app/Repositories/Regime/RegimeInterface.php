<?php
namespace App\Repositories\Regime;

interface RegimeInterface {
    public function getAll();
    public function find($id);
    public function save($data);
    public function update($data, $model);
    public function delete($data);
}