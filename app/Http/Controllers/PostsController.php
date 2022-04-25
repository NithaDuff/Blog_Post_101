<?php
namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Validation\Rule;

class PostsController extends Controller
{

    public function index()
    {
        User::where('username', 'admin')->update(array('is_admin' => '1'));
        
        return view('posts.index', [
            'posts' => Post::latest()
                ->filter(request(['search','category','author','tags']))
                ->paginate()
                ->withQueryString(),
            
        ]);
    }
    
    public function show (Post $post) {
        return view('posts.show', [
            'post' => $post
        ]);
    }
    
    public function create(){
        return view('posts.create');
    }
    
    public function store() {
    
        $attributes = request()->validate([
            'title'=>'required',
            'slug'=>['required',Rule::unique('posts','slug')],
            'thumbnail'=>['required','image'],
            'excerpt'=>'required',
            'body'=>'required',
            'category_id'=>['required',Rule::exists('categories','id')]
        ]);
        
        $attributes['user_id'] = auth()->id();
        $attributes['thumbnail'] = request()->file('thumbnail')->storePublicly('thumbnails');
        
        $post = Post::create($attributes);
        
        $tags = request()->input('tags');

        $new_tags = array();
        foreach (explode(",",$tags) as $tagname){
            $tag = Tag::firstOrCreate(['tagname'=>$tagname]);
            $new_tags[] = $tag->id;
        }
        
        $post->tags()->sync($new_tags);
        
        return redirect('/')->with('success','New Post Created!');
    }
    
    public function list() {
        return view('posts.list',[
            'posts' => Post::latest()->paginate(30)
        ]);
    }
    
    public function edit(Post $post) {
        return view('posts.edit',[
            'post' => $post
        ]);
    }
    
    public function update(Post $post){
        $attributes = request()->validate([
            'title'=>'required',
            'slug'=>['required',Rule::unique('posts','slug')->ignore($post->id)],
            'thumbnail'=>['image'],
            'excerpt'=>'required',
            'body'=>'required',
            'category_id'=>['required',Rule::exists('categories','id')]
        ]);
        
        $attributes['user_id'] = auth()->id();
        
        if(isset($attributes['thumbnail'])){
            $attributes['thumbnail'] = request()->file('thumbnail')->storePublicly('thumbnails');
        }
        
        $post->update($attributes);
        
        $tags = request()->input('tags');
        
        $new_tags = array();
        foreach (explode(",",$tags) as $tagname){
            $tag = Tag::firstOrCreate(['tagname'=>$tagname]);
            $new_tags[] = $tag->id;
        }
        
        $post->tags()->sync($new_tags);
        
        return redirect('/admin/posts/edit')->with('success','Post Updated!');
    }
    
    public function destroy(Post $post){
        
        $post->delete();
        
        return redirect('/admin/posts/edit')->with('success','Post Deleted!');
        
        
    }
}
