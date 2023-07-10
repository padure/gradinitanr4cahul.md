<?php
namespace App\Repositories\Law;

use App\Repositories\Law\LawInterface as LawInterface;
use App\Models\Law;

class LawRepository implements LawInterface
{
    public $law;

    public function __construct(Law $law)
    {
        $this->law = $law;
    }

    public function getAll()
    {
        return $this->law::query()->simplePaginate( env('PAGINATE_TEAM') );
    }

    public function find($id)
    {
        return $this->law->findOrFail($id);
    }
    
    public function save($law)
    {
        $extension      = $law['file']->getClientOriginalExtension();
        $fileName       = $law['file']->getClientOriginalName();
        $data           = new Law();
        $data->nume     = $law['nume'];
        $data->section_id  = $law['section_id'];
        $data->file      = md5(bcrypt(date('l jS \of F Y h:i:s A'))).'.'.$extension;
        $data->save();
        $law['file']->move(env('UPLOADS_LAW'), $data->file);
        return back();
    }

    public function update($data, $model){
        $model->nume        = $data['nume'];
        $model->section_id     = $data['section_id'];
        if(empty($data['file'])){
            $model->file     = $model->file;
        }else{
            if (file_exists(env('UPLOADS_LAW') . $model->file)) {
                unlink(env('UPLOADS_LAW') . $model->file);
            }
            $extension      = $data['file']->getClientOriginalExtension();
            $fileName       = $data['file']->getClientOriginalName();
            $model->file     = md5(bcrypt(date('l jS \of F Y h:i:s A'))).'.'.$extension;
            $data['file']->move(env('UPLOADS_LAW'), $data->file);
        }
        $model->save();
        return redirect()->route('laws.index');
    }

    public function delete($data)
    {
        if (file_exists(env('UPLOADS_LAW') . $data->file)) {
            unlink(env('UPLOADS_LAW') . $data->file);
        }
        return $data->delete();
    }
}