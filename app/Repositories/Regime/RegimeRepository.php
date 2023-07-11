<?php
namespace App\Repositories\Regime;

use App\Repositories\Regime\RegimeInterface as RegimeInterface;
use App\Models\Regime;

class RegimeRepository implements RegimeInterface
{
    public $regime;

    public function __construct(Regime $regime)
    {
        $this->regime = $regime;
    }

    public function getAll()
    {
        return $this->regime::query()->simplePaginate( env('PAGINATE_TEAM') );
    }

    public function find($id)
    {
        return $this->regime->findOrFail($id);
    }
    
    public function save($regime)
    {
        $extension          = $regime['file']->getClientOriginalExtension();
        $data               = new Regime();
        $data->file      = md5(bcrypt(date('l jS \of F Y h:i:s A'))).'.'.$extension;
        $data->save();
        $regime['file']->move(env('UPLOADS_REGIME'), $data->file);
        return back();
    }

    public function update($data, $model){
        if(empty($data['file'])){
            $model->file        = $model->file;
        }else{
            if (is_file(env('UPLOADS_REGIME') . $model->file)) {
                unlink(env('UPLOADS_REGIME') . $model->file);
            }
            $extension          = $data['file']->getClientOriginalExtension();
            $model->file        = md5(bcrypt(date('l jS \of F Y h:i:s A'))).'.'.$extension;
            $data['file']->move(env('UPLOADS_REGIME'), $model->file);
        }
        $model->save();
        return redirect()->route('regimes.index');
    }

    public function delete($data)
    {
        if (is_file(env('UPLOADS_REGIME') . $data->file)) {
            unlink( env('UPLOADS_REGIME') . $data->file);
        }
        return $data->delete();
    }
}