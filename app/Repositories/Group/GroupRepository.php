<?php
namespace App\Repositories\Group;

use App\Repositories\Group\GroupInterface as GroupInterface;
use Intervention\Image\ImageManagerStatic as Image;
use App\Models\Group;

class GroupRepository implements GroupInterface
{
    public $group;

    public function __construct(Group $group)
    {
        $this->group = $group;
    }

    public function getAll()
    {
        return $this->group::query()->simplePaginate( env('PAGINATE_TEAM') );
    }

    public function find($id)
    {
        return $this->group->findOrFail($id);
    }
    
    public function save($group)
    {
        $extensionImg       = $group['img']->getClientOriginalExtension();
        $data               = new Group();
        $data->nume         = $group['nume'];
        $data->educator     = $group['educator'];
        $data->functie      = $group['functie'];
        if(isset($group['avatar'])){
            $extensionAvatar    = $group['avatar']->getClientOriginalExtension();
            $data->avatar   = md5(bcrypt(date('l jS \of F Y h:i:s A'))).'.'.$extensionAvatar;
            Image::make($group['avatar'])
                ->fit(100, 100)
                ->save(public_path(env('UPLOADS_GROUP')) . $data->avatar);
        }
        $data->img          = md5(bcrypt(date('l jS \of F Y h:i:s A'))).'.'.$extensionImg;
        Image::make($group['img'])
                ->fit(300, 300)
                ->save(public_path(env('UPLOADS_GROUP')) . $data->img);
        $data->varsta       = $group['varsta'];
        $data->ora          = $group['ora'];
        $data->capacitate   = $group['capacitate'];
        $data->save();
        return back();
    }

    public function update($data, $model){
        $model->nume        = $data['nume'];
        $model->educator    = $data['educator'];
        $model->functie     = $data['functie'];
        if(empty($data['avatar'])){
            $model->avatar  = $model->avatar;
        }else{
            if (is_file(env('UPLOADS_GROUP') . $model->avatar)) {
                unlink(env('UPLOADS_GROUP') . $model->avatar);
            }
            $extensionAvatar = $data['avatar']->getClientOriginalExtension();
            $model->avatar   = md5(bcrypt(date('l jS \of F Y h:i:s A'))).'.'.$extensionAvatar;
            Image::make($data['avatar'])
                ->fit(100, 100)
                ->save(public_path(env('UPLOADS_GROUP')) . $model->avatar);
        }
        if(empty($data['img'])){
            $model->img     = $model->img;
        }else{
            if (is_file(env('UPLOADS_GROUP') . $model->img)) {
                unlink(env('UPLOADS_GROUP') . $model->img);
            }
            $extensionImg   = $data['img']->getClientOriginalExtension();
            $model->img     = md5(bcrypt(date('l jS \of F Y h:i:s A'))).'.'.$extensionImg;
            Image::make($data['img'])
                ->fit(300, 300)
                ->save(public_path(env('UPLOADS_GROUP')) . $model->img);
        }
        $model->varsta      = $data['varsta'];
        $model->ora         = $data['ora'];
        $model->capacitate  = $data['capacitate'];
        $model->save();
        return redirect()->route('groups.index');
    }

    public function delete($data)
    {
        if (is_file(env('UPLOADS_GROUP') . $data->img)) {
            unlink(env('UPLOADS_GROUP') . $data->img);
        }
        if (is_file(env('UPLOADS_GROUP') . $data->avatar)) {
            unlink(env('UPLOADS_GROUP') . $data->avatar);
        }
        return $data->delete();
    }
}