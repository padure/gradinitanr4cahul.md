<?php
namespace App\Repositories\Event;

use App\Repositories\Event\EventInterface as EventInterface;
use Intervention\Image\ImageManagerStatic as Image;
use App\Models\Event;
use App\Models\EventCategory;

class EventRepository implements EventInterface
{
    public $event;

    public function __construct(Event $event)
    {
        $this->event = $event;
    }

    public function getAll()
    {
        return $this->event::query()->simplePaginate( env('PAGINATE_EVENT') );
    }

    public function getEventByCategory($category)
    {
        return $this->event::query()
            ->where('event_category_id', $category)
            ->simplePaginate( env('PAGINATE_EVENT'));
    }

    public function getLast($nr)
    {
        return $this->event::orderBy('id', 'DESC')->get()->take($nr);
    }

    public function find($id)
    {
        return $this->event->findOrFail($id);
    }
    
    public function save($event)
    {
        $extension  = $event['image']->getClientOriginalExtension();
        $fileName   = $event['image']->getClientOriginalName();
        $data              = new Event();
        $data->title       = $event['title'];
        $data->description = $event['description'];
        $data->body = $event['body'];
        $data->autor = $event['autor'];
        $data->event_category_id = $event['event_category_id'];
        $data->image       = md5(bcrypt(date('l jS \of F Y h:i:s A'))).'.'.$extension;
        $data->save();
        Image::make($event['image'])
                ->fit(1366, 768)
                ->save(public_path(env('UPLOADS_EVENT')) . $data->image);
        return back();
    }


    public function delete($id)
    {
        return $this->event->delete();
    }
}