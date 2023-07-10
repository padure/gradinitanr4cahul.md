<?php
namespace App\Repositories\Menu;

use App\Repositories\Menu\MenuInterface as MenuInterface;
use App\Models\Menu;

class MenuRepository implements MenuInterface
{
    public $menu;

    public function __construct(Menu $menu)
    {
        $this->menu = $menu;
    }

    public function getAll()
    {
        return $this->menu::query()->simplePaginate( env('PAGINATE_TEAM') );
    }

    public function find($id)
    {
        return $this->menu->findOrFail($id);
    }
    
    public function save($menu)
    {
        $extension          = $menu['file']->getClientOriginalExtension();
        $data               = new Menu();
        $data->nume         = $menu['nume'];
        $data->descriere    = $menu['descriere'] ?? null;
        $data->file      = md5(bcrypt(date('l jS \of F Y h:i:s A'))).'.'.$extension;
        $data->save();
        $menu['file']->move(env('UPLOADS_MENU'), $data->file);
        return back();
    }

    public function update($data, $model){
        $model->nume            = $data['nume'];
        $model->descriere       = $data['descriere'] ?? null;
        if(empty($data['file'])){
            $model->file        = $model->file;
        }else{
            if (is_file(env('UPLOADS_MENU') . $model->file)) {
                unlink(env('UPLOADS_MENU') . $model->file);
            }
            $extension          = $data['file']->getClientOriginalExtension();
            $model->file        = md5(bcrypt(date('l jS \of F Y h:i:s A'))).'.'.$extension;
            $data['file']->move(env('UPLOADS_MENU'), $model->file);
        }
        $model->save();
        return redirect()->route('menus.index');
    }

    public function delete($data)
    {
        if (is_file(env('UPLOADS_MENU') . $data->file)) {
            unlink( env('UPLOADS_MENU') . $data->file);
        }
        return $data->delete();
    }
}