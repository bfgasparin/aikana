<?php

namespace App\Events;

use App\PainelPhoto;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class PainelPhotoAdded implements ShouldBroadcast
{
    use InteractsWithSockets, SerializesModels;

    public $painelPhoto;
    public $photo;
    public $user;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(PainelPhoto $painelPhoto)
    {
        $this->painelPhoto = $painelPhoto;
        $this->photo = $painelPhoto->photo;
        $this->user = $painelPhoto->photo->user
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return [''];
    }
}
