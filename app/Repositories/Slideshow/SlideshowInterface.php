<?php
namespace App\Repositories\Slideshow;

interface SlideshowInterface {
    public function getAll();
    public function find($id);
    public function save($slideshow);
    public function delete($id);
}