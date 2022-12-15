<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class SearchAttendance extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public $section_id = "",
        public $date = ""
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.search-attendance');
    }
}
