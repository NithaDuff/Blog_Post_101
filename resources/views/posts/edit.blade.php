<x-layout>
<section class="px-6 py-8">
	<main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 p-6 rounded-xl">
		<h1 class="text-center font-bold text-xl">Edit post: {{$post->title}}</h1>

		<form method="POST" action="/admin/posts/{{$post->id}}" enctype="multipart/form-data" class="mt-10">
			@csrf
			@method('PATCH')
			<div class="mb-6">
				<label class="block mb-2 uppercase font-bold text-xs text-greay-700"
					for="title"> Title 
				</label> 
				
				<input
					class="border border-gray-400 p-2 w-full" type="text"
					name="title" id="title" value="{{$post->title}}" required>
				@error('title')
					<p class="text-red-500 text-xs mt-1">{{ $message }}</p>
				@enderror
				
				<label class="block mb-2 uppercase font-bold text-xs text-greay-700"
					for="slug"> Slug 
				</label> 
				
				<input
					class="border border-gray-400 p-2 w-full" type="text"
					name="slug" id="slug" value="{{$post->slug}}" required>
				@error('slug')
					<p class="text-red-500 text-xs mt-1">{{ $message }}</p>
				@enderror
				<label class="block mb-2 uppercase font-bold text-xs text-greay-700 mt-3"
					for="thumbnail"> Thumbnail 
				</label>
				<div class="flex mt-2">
					<div class="flex mt-1">
        				<input
        					class="border border-gray-400 p-2 w-full" type="file"
        					name="thumbnail" id="thumbnail" value="{{$post->thumbnail}}">
        					<img src="{{asset('storage/' . $post->thumbnail)}}" alt="Blog Post illustration" class="rounded-xl" width="100">
        				@error('thumbnail')
        					<p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        				@enderror	
    				</div>
				</div>			
				
				<label class="block mb-2 uppercase font-bold text-xs text-greay-700"
					for="excerpt"> Excerpt 
				</label> 
				
				<textArea
					class="border border-gray-400 p-2 w-full"
					name="excerpt" id="excerpt"  required>{{$post->excerpt}}</textArea>
				@error('excerpt')
					<p class="text-red-500 text-xs mt-1">{{ $message }}</p>
				@enderror
				
				<label class="block mb-2 uppercase font-bold text-xs text-greay-700"
					for="body"> Body 
				</label> 
				
				<textArea
					class="border border-gray-400 p-2 w-full"
					name="body" id="body" required>{{$post->body}}</textArea>
				@error('body')
					<p class="text-red-500 text-xs mt-1">{{ $message }}</p>
				@enderror
				
				<label class="block mb-2 uppercase font-bold text-xs text-greay-700"
					for="category_id"> Category 
				</label>
				<select class="overflow-auto max-h-52" name="category_id" id="category_id">
					@foreach(App\Models\Category::all() as $category)
						<option value="{{$category->id}}" {{$post->category_id==$category->id ? 'selected' : ''}}>{{ucwords($category->name)}}</option>
					@endforeach
				</select>
				@error('category_id')
					<p class="text-red-500 text-xs mt-1">{{ $message }}</p>
				@enderror
				
				<label class="block mb-2 uppercase font-bold text-xs text-greay-700"
					for="tags"> Tags 
				</label> 
				
				@php
					$tags = "";
    				foreach($post->tags as $tag){
    					$tags.= ','.$tag->tagname;
    				}
    				$tags = ltrim($tags, ',');
				@endphp
				<input
					class="border border-gray-400 p-2 w-full" type="text"
					name="tags" id="tags" value="{{$tags}}" required>
				@error('tags')
					<p class="text-red-500 text-xs mt-1">{{ $message }}</p>
				@enderror
			
			</div>
			<div class="mb-6">
				<x-submit-button>Update</x-submit-button>
			
			</div>
		</form>
	</main>
</section>
</x-layout>