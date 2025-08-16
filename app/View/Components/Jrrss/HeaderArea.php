<?php

namespace App\View\Components\Jrrss;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Modules\CMS\Entities\CmsSection;
use Modules\Socialevents\Entities\EvenEvent;

class HeaderArea extends Component
{

    protected $header;
    protected $transmissions;

    public function __construct()
    {

        $this->header = CmsSection::where('component_id', 'header_area_1')
            ->join('cms_section_items', 'section_id', 'cms_sections.id')
            ->join('cms_items', 'cms_section_items.item_id', 'cms_items.id')
            ->select(
                'cms_items.content',
                'cms_section_items.position'
            )
            ->orderBy('cms_section_items.position')
            ->get();

        $this->transmissions = EvenEvent::where('broadcast', true)->first();
                //dd($this->transmissions);
    }

    public function render(): View|Closure|string
    {
        return view('components.jrrss.header-area', [
            'header' => $this->header,
            'transmissions' => $this->transmissions,
        ]);
    }
}
