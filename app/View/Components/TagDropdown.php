<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Tag;

class TagDropdown extends Component
{
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.tag-dropdown', [
            'tags' => Tag::all(),
            'currentTag' => Tag::firstWhere('id',request('tags'))
        ]);
    }
}
