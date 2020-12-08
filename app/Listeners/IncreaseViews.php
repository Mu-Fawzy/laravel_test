<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\VisitPost;

class IncreaseViews
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(VisitPost $event)
    {
        if(!(session()->has('visitPost_'.$event->post->id.'') && session()->get('visitPost_'.$event->post->id.'') == $event->post->id))
            $this->increaseVideo($event->post);
    }

    function increaseVideo($post) {
        $post->views = $post->views + 1;
        $post->save();
        session()->put('visitPost_'.$post->id.'', $post->id);        
    }
}
