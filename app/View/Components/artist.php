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
     public $artistImage;


    public function __construct($artistName, $artistCategory, $artistCampany, $artistImage)
    {
        $this->artistName = $artistName;
        $this->artistCategory = $artistCategory;
        $this->artistCampany = $artistCampany;
        $this->artistImage = $artistImage;
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
