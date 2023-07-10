<?php
namespace App\Repositories\Slideshow;

use App\Repositories\Slideshow\SlideshowInterface as SlideshowInterface;
use Intervention\Image\ImageManagerStatic as Image;
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
    
    public function save($slideshow)
    {
        $extension  = $slideshow['image']->getClientOriginalExtension();
        $fileName   = $slideshow['image']->getClientOriginalName();
        $slide              = new Slideshow();
        $slide->title       = $slideshow['title'];
        $slide->description = $slideshow['description'];
        $slide->image       = md5(bcrypt(date('l jS \of F Y h:i:s A'))).'.'.$extension;
        $slide->save();
        Image::make($slideshow['image'])
                ->fit(1366, 768)
                ->save(public_path(env('UPLOADS_SLIDESHOW')) . $slide->image);
        return back();
    }


    public function delete($id)
    {
        return $this->slideshow->deleteUser($id);
    }
}