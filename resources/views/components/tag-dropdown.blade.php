<x-dropdown>
	<x-slot name="trigger">
        <button class="py-2 pl-3 pr-9 text-sm font-semibold w-full 
                lg:w-32 text-left flex lg:inline-flex">
            {{ isset($currentTag) ? $currentTag->tagname : 'Tags' }}
            <x-icon name="down-arrow" class=" absolute pointer-events-none" style="right: 12px;"/>
            </button>
        </x-slot>

        <x-dropdown-item href="/?{{http_build_query(request()->except(['tags','category','page']))}}">
        	All
        </x-dropdown-item>
        @foreach($tags as $tag)
        <x-dropdown-item 
            href="?tags={{$tag->id}}&{{http_build_query(request()->except(['tags','category','page']))}}"
            :active="isset($currentTag) && $currentTag->is($tag)"
        >
            {{ucwords($tag->tagname)}}
        </x-dropdown-item>
    @endforeach
</x-dropdown>