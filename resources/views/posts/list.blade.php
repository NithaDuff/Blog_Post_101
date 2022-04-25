<x-layout>

<body style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-8">
        <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
            <table class="border-collapse table-auto w-full text-sm"">
              <tbody class="bg-white dark:bg-slate-800">
              @foreach($posts as $post)
                <tr>
                  <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
                  	<a href="/posts/{{$post->slug}}">{{$post->title}}</a>
                  </td>
                  <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
                  	<a href="/admin/posts/{{$post->slug}}/edit"
                    	class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold"
                    	style="font-size: 10px">Edit</a>
                  </td>
                  <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
                    <form method="POST" action="/admin/posts/{{$post->id}}">
                    	@csrf
                    	@method('DELETE')
                    	
                    	<button class="text-xs text-gray-400">Delete</button>
                    </form>
                  </td>
                </tr>
                @endforeach
                </tr>
              </tbody>
            </table>
            
        </main>
    </section>
</body>

</x-layout>