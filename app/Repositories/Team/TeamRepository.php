<?php
namespace App\Repositories\Team;

use App\Repositories\Team\TeamInterface as TeamInterface;
use Intervention\Image\ImageManagerStatic as Image;
use App\Models\Team;

class TeamRepository implements TeamInterface
{
    public $team;

    public function __construct(Team $team)
    {
        $this->team = $team;
    }

    public function getAll()
    {
        return $this->team::query()->simplePaginate( env('PAGINATE_TEAM') );
    }

    public function find($id)
    {
        return $this->team->findOrFail($id);
    }
    
    public function save($team)
    {
        $data           = new Team();
        $data->nume     = $team['nume'];
        $data->functie  = $team['functie'];
        if(isset($team['img'])){
            $extension      = $team['img']->getClientOriginalExtension();
            $data->img      = md5(bcrypt(date('l jS \of F Y h:i:s A'))).'.'.$extension;
            Image::make($team['img'])
                ->fit(100, 100)
                ->save(public_path(env('UPLOADS_MEMBER')) . $data->img);
        }
        $data->save();
        return back();
    }

    public function update($data, $model){
        $model->nume        = $data['nume'];
        $model->functie     = $data['functie'];
        if(empty($data['img'])){
            $model->img = $model->img;
        }else{
            if (is_file(env('UPLOADS_MEMBER') . $model->img)) {
                unlink(env('UPLOADS_MEMBER') . $model->img);
            }
            $extension  = $data['img']->getClientOriginalExtension();
            $fileName   = $data['img']->getClientOriginalName();
            $model->img       = md5(bcrypt(date('l jS \of F Y h:i:s A'))).'.'.$extension;
            Image::make($data['img'])
                ->fit(100, 100)
                ->save(public_path(env('UPLOADS_MEMBER')) . $model->img);
        }
        $model->save();
        return redirect()->route('teams.index');
    }

    public function delete($data)
    {
        if (is_file(env('UPLOADS_MEMBER') . $data->img)) {
            unlink(env('UPLOADS_MEMBER') . $data->img);
        }
        return $data->delete();
    }
}