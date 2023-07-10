<?php
namespace App\Repositories\Setting;

interface SettingInterface {
    public function getAll();
    public function getLast($nr);
    public function find($id);
    public function save($setting);
    public function update($new, $old);
    public function delete($id);
}