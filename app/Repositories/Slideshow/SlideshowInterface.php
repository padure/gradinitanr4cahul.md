<?php
namespace App\Repositories\Slideshow;

interface SlideshowInterface {
    public function getAll();
    public function find($id);
    public function save($id);
    public function delete($id);
}