
<!doctype html>

<title>BLOG POSTS 101</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script defer src="https://unpkg.com/alpinejs@3.10.2/dist/cdn.min.js"></script>

<body style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-8">
        <nav class="md:flex md:justify-between md:items-center">
            <div>
                <a href="/">
                    <img src="/images/logo.svg" alt="Laracasts Logo" width="165" height="16">
                </a>
            </div>

            <div class="mt-8 md:mt-0 flex items-center">
            @auth
                <x-dropdown>
                	<x-slot name="trigger">
                    	<button class="text-xs font-bold uppercase">Welcome {{auth()->user()->name}}!</button>
                	</x-slot>
                	<x-dropdown-item href="/">Dashboard</x-dropdown-item>
                	@admin
                	<x-dropdown-item href="/admin/posts/create" :active="request()->is('admin/posts/create')">New Post</x-dropdown-item>
                	<x-dropdown-item href="/admin/posts/edit" :active="request()->is('admin/posts/edit')">Edit Posts</x-dropdown-item>
                	@endadmin
                	<x-dropdown-item href="#" x-data="{}" @click.prevent="document.querySelector('#logout-form').submit()">Logout</x-dropdown-item>
                
                </x-dropdown> 
                   
                <form id="logout-form" method="POST" action="/logout" class="hidden">
               	 @csrf
                </form>
            @else
            	<a href="/register" class="text-xs font-bold uppercase">Register</a>
            	<a href="/login" class="ml-6 text-xs font-bold uppercase">Login</a>
            @endauth
            </div>
        </nav>

        {{ $slot }}

        <footer class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
        	
        </footer>
    </section>
    <x-flash />
</body>

