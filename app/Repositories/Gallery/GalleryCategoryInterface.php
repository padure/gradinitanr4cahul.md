<?php
namespace App\Repositories\Gallery;

interface GalleryCategoryInterface {
    public function getAll();
    public function find($id);
    public function delete($id);
}