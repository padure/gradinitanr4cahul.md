<?php
namespace App\Repositories\Setting;

use App\Repositories\Setting\SettingInterface as SettingInterface;
use App\Models\Setting;

class SettingRepository implements SettingInterface
{
    public $setting;

    public function __construct(Setting $setting)
    {
        $this->setting = $setting;
    }

    public function getAll()
    {
        return $this->setting::query()->simplePaginate( env('PAGINATE_EVENT') );
    }

    public function getLast($nr)
    {
        return $this->setting::orderBy('id', 'DESC')->get()->take($nr);
    }

    public function find($id)
    {
        return $this->setting->findOrFail($id);
    }
    
    public function save($data)
    {
        $this->setting->create($data);
        return back();
    }

    public function update($new, $old)
    {
        $old->update($new);
        return back();
    }

    public function delete($id)
    {
        return $this->setting->delete();
    }
}