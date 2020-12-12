<?php

namespace App\View\Components;

use Illuminate\View\Component;

class artist extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

     public $artistName;
     public $artistCategory;
     public $artistCampany;


    public function __construct($artistName, $artistCategory, $artistCampany)
    {
        $this->artistName = $artistName;
        $this->artistCategory = $artistCategory;
        $this->artistCampany = $artistCampany;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.artist');
    }
}
