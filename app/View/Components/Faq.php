<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Faq extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $mainId;
    public $question;
    public $subId;
    public $answer;

    public function __construct($mainId, $question, $subId, $answer)
    {
        $this->mainId = $mainId;
        $this->question = $question;
        $this->subId = $subId;
        $this->answer = $answer;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.faq');
    }
}
