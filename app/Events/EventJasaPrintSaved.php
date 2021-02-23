<?php

namespace App\Events;

use App\Models\JasaPrint;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class EventJasaPrintSaved
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $jasaPrint;

    /**
     * Create a new event instance.
     *
     * @param JasaPrint $jasaPrint
     */
    public function __construct(JasaPrint $jasaPrint)
    {
        $this->jasaPrint = $jasaPrint;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('jasa-print');
    }
}
