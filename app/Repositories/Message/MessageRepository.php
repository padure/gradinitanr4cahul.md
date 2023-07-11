<?php
namespace App\Repositories\Message;

use App\Repositories\Message\MessageInterface as MessageInterface;
use App\Models\Message;

class MessageRepository implements MessageInterface
{
    public $message;

    public function __construct(Message $message)
    {
        $this->message = $message;
    }

    public function getAll()
    {
        return $this->message::query()->simplePaginate( env('PAGINATE_EVENT') );
    }
    public function delete($data)
    {
        return $data->delete();
    }
}