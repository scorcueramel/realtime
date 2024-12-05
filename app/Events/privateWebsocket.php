<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class privateWebsocket implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public string $data;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->data = 'This a private message';
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('privateChannel.user.2');
//        return new PrivateChannel('privateChannel');
    }

    public function broadcastAs(){
        return 'private_msg';
    }
}
