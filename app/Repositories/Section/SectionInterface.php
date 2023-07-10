<?php
namespace App\Repositories\Section;

interface SectionInterface {
    public function getAll();
    public function find($id);
    public function save($model);
    public function update($new, $old);
    public function delete($model);
}