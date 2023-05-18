<?php
namespace App\Repositories\Gallery;

use App\Repositories\Gallery\GalleryInterface as GalleryInterface;
use App\Models\Gallery;

class GalleryRepository implements GalleryInterface
{
    public $gallery;

    public function __construct(Gallery $gallery)
    {
        $this->gallery = $gallery;
    }

    public function getAll()
    {
        return $this->gallery::query()->get();
    }

    public function find($id)
    {
        return $this->gallery->findUser($id);
    }
    
    public function save($gallery, $category)
    {
        $extension  = $gallery->getClientOriginalExtension();
        $fileName   = $gallery->getClientOriginalName();
        $image = new Gallery();
        $image->gallery_category_id = $category;
        $image->image = md5(bcrypt(date('l jS \of F Y h:i:s A'))).'.'.$extension;
        $gallery->move(public_path(env('UPLOADS_GALLERY')), $image->image);
        $image->save();
        return back();
    }


    public function delete($id)
    {
        return $this->gallery->deleteUser($id);
    }
}