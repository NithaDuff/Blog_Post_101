<x-layout>
    @include('posts._header')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if($posts->count())
            <x-post-grid :posts="$posts"/>
        @else
            <p class="text-center">No posts yet. Check back later.</p>
        @endif
        
        {{$posts->links()}}
    </main>

</x-layout>