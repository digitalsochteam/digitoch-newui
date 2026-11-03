<?php

namespace App\View\Components;

use Illuminate\View\Component;

class QuotePopup extends Component
{
    public $buttonText;
    public $title;
    public $buttonClass;
    public $submitRoute;

    public function __construct(
        $buttonText = 'Get a Quote',
        $title = 'Request a Quote',
        $buttonClass = '',
        $submitRoute = null
    ) {
        $this->buttonText = $buttonText;
        $this->title = $title;
        $this->buttonClass = $buttonClass;
        $this->submitRoute = $submitRoute;
    }

    public function render()
    {
        return view('components.quote-popup');
    }
}