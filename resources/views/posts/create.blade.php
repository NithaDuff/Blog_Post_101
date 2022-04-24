<x-layout>
<section class="px-6 py-8">
	<main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 p-6 rounded-xl">
		<h1 class="text-center font-bold text-xl">New Post!</h1>

		<form method="POST" action="/admin/post" enctype="multipart/form-data" class="mt-10">
			@csrf
			<div class="mb-6">
				<label class="block mb-2 uppercase font-bold text-xs text-greay-700"
					for="title"> Title 
				</label> 
				
				<input
					class="border border-gray-400 p-2 w-full" type="text"
					name="title" id="title" value="{{old('title')}}" required>
				@error('title')
					<p class="text-red-500 text-xs mt-1">{{ $message }}</p>
				@enderror
				
				<label class="block mb-2 uppercase font-bold text-xs text-greay-700"
					for="slug"> Slug 
				</label> 
				
				<input
					class="border border-gray-400 p-2 w-full" type="text"
					name="slug" id="slug" value="{{old('slug')}}" required>
				@error('slug')
					<p class="text-red-500 text-xs mt-1">{{ $message }}</p>
				@enderror
				
				<label class="block mb-2 uppercase font-bold text-xs text-greay-700"
					for="thumbnail"> Thumbnail 
				</label> 
				
				<input
					class="border border-gray-400 p-2 w-full" type="file"
					name="thumbnail" id="thumbnail" value="{{old('thumbnail')}}" required>
				@error('thumbnail')
					<p class="text-red-500 text-xs mt-1">{{ $message }}</p>
				@enderror				
				
				<label class="block mb-2 uppercase font-bold text-xs text-greay-700"
					for="excerpt"> Excerpt 
				</label> 
				
				<textArea
					class="border border-gray-400 p-2 w-full"
					name="excerpt" id="excerpt"  required>{{old('excerpt')}}</textArea>
				@error('excerpt')
					<p class="text-red-500 text-xs mt-1">{{ $message }}</p>
				@enderror
				
				<label class="block mb-2 uppercase font-bold text-xs text-greay-700"
					for="body"> Body 
				</label> 
				
				<textArea
					class="border border-gray-400 p-2 w-full"
					name="body" id="body" required>{{old('body')}}</textArea>
				@error('body')
					<p class="text-red-500 text-xs mt-1">{{ $message }}</p>
				@enderror
				
				<label class="block mb-2 uppercase font-bold text-xs text-greay-700"
					for="category_id"> Category 
				</label>
				<select class="overflow-auto max-h-52" name="category_id" id="category_id">
					@foreach(App\Models\Category::all() as $category)
						<option value="{{$category->id}}" {{old('category_id')==$category->id ? 'selected' : ''}}>{{ucwords($category->name)}}</option>
					@endforeach
				</select>
				@error('category_id')
					<p class="text-red-500 text-xs mt-1">{{ $message }}</p>
				@enderror
				
				<label class="block mb-2 uppercase font-bold text-xs text-greay-700"
					for="tags"> Tags 
				</label> 
				
				<input
					class="border border-gray-400 p-2 w-full" type="text"
					name="tags" id="tags" value="{{old('tags')}}" required>
				@error('tags')
					<p class="text-red-500 text-xs mt-1">{{ $message }}</p>
				@enderror
			
			</div>
			<div class="mb-6">
				<x-submit-button>Publish</x-submit-button>
			
			</div>
		</form>
	</main>
</section>
</x-layout>