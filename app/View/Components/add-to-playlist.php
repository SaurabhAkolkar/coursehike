<?php

namespace App\View\Components;

use Illuminate\View\Component;

class add-to-playlist extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {   
        return view('components.add-to-playlist')->with(['playlists'=>$playlists]);
    }
}
