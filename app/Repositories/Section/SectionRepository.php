<?php
namespace App\Repositories\Section;

use App\Repositories\Section\SectionInterface as SectionInterface;
use App\Models\Section;

class SectionRepository implements SectionInterface
{
    public $section;

    public function __construct(Section $section)
    {
        $this->section = $section;
    }

    public function getAll()
    {
        return $this->section::query()->simplePaginate( env('PAGINATE_EVENT') );
    }

    public function find($id)
    {
        return $this->section->findOrFail($id);
    }
    
    public function save($data)
    {
        $this->section->create($data);
        return back();
    }

    public function update($new, $old)
    {
        $old->update($new);
        return back();
    }

    public function delete($data)
    {
        return $data->delete();
    }
}