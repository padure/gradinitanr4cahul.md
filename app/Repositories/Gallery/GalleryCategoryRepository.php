<?php
namespace App\Repositories\Gallery;

use App\Repositories\Gallery\GalleryCategoryInterface as GalleryCategoryInterface;
use App\Models\GalleryCategory;

class GalleryCategoryRepository implements GalleryCategoryInterface
{
    public $galleryCategory;

    public function __construct(GalleryCategory $galleryCategory)
    {
        $this->galleryCategory = $galleryCategory;
    }

    public function getAll()
    {
        return $this->galleryCategory::query()->get();
    }

    public function find($id)
    {
        return $this->galleryCategory->findUser($id);
    }
    public function delete($id)
    {
        return $this->gallery->deleteUser($id);
    }
}