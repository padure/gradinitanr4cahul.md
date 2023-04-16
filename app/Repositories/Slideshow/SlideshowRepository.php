<?php
namespace App\Repositories\Slideshow;

use App\Repositories\Slideshow\SlideshowInterface as SlideshowInterface;
use App\Models\Slideshow;

class SlideshowRepository implements SlideshowInterface
{
    public $slideshow;

    public function __construct(Slideshow $slideshow)
    {
        $this->slideshow = $slideshow;
    }

    public function getAll()
    {
        return $this->slideshow::query()->get();
    }


    public function find($id)
    {
        return $this->slideshow->findUser($id);
    }


    public function delete($id)
    {
        return $this->slideshow->deleteUser($id);
    }
}