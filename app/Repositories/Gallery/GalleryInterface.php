<?php
namespace App\Repositories\Gallery;

interface GalleryInterface {
    public function getAll();
    public function find($id);
    public function save($gallery, $category);
    public function delete($id);
}