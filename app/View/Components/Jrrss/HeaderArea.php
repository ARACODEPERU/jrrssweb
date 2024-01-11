<?php

namespace App\View\Components\Jrrss;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Modules\Socialevents\Entities\EvenEvent;

class HeaderArea extends Component
{
    protected $transmissions;

    public function __construct()
    {
        $this->transmissions = EvenEvent::where('broadcast', true)->first();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.jrrss.header-area',[
            'transmissions' => $this->transmissions
        ]);
    }
}
