<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;



class BlogController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except(['index','show']);
    }
    public function index(Request $request){
        if($request->search){
            $posts = Post::where('title', 'like', '%' . $request->search . '%')
                ->orWhere('body', 'like', '%' . $request->search . '%')->latest()->paginate(4);
            //last post serach = %ost%
        }elseif($request->category){
            $posts = Category::where('name', $request->category)->firstOrFail()->posts()->paginate(3)->withQueryString();

        }
        
        else{
            $posts = Post::latest()->paginate(4);
        }
        $categories = Category::all();
        
        return view('blogposts.blog',compact('posts','categories'));
    }
    public function create(){
        $categories = Category::all();
        return view('blogposts.create-blog-post',compact('categories'));

    }
    public function store(Request $request){
        
        $request->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048 ',
            'body' => 'required',
            'category_id' => 'required'
        ]);
        $title = $request->input('title');
        $category_id = $request->input('category_id');
        if( Post::latest()->first()!==null){
            $postId = Post::latest()->first()->id+1;
        }else{
            $postId = 1;
        }
        
        $slug = Str::slug($title,'-') . '-' . $postId;
        $user_id = Auth::user()->id;
        $body = $request->input('body');

        // file upload 
        // $imageName = time().'.'.$request->image->extension();
        $imagePath= 'storage/'. $request->file('image')->store('postImages','public');
        $post = new Post();
        $post->title = $title;
        $post->category_id = $category_id;
        $post->slug = $slug;
        $post->user_id = $user_id;
        $post->body = $body;
        $post->imagePath = $imagePath;



        $post->save();
        return redirect()->back()->with('status','Post Created Successfully');
        
        

       
    }
    public function edit(Post $post){
        if(auth()->user()->id!==$post->user->id){
            abort(403);
        }
        return view('blogposts.edit-blog-post',compact('post'));
    }

    public function update(Post $post,Request $request){
        if(auth()->user()->id!==$post->user->id){
            abort(403);
        }
        $request->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048 ',
            'body' => 'required'
        ]);
        $postId = $post->id;
        $title = $request->input('title');
        $slug = Str::slug($title,'-') . '-' . $postId;
        // $user_id = Auth::user()->id;
        $body = $request->input('body');

        // file upload 
        // $imageName = time().'.'.$request->image->extension();
        $imagePath= 'storage/'. $request->file('image')->store('postImages','public');
        // $post = new Post();
        $post->title = $title;
        $post->slug = $slug;
        // $post->user_id = $user_id;
        $post->body = $body;
        $post->imagePath = $imagePath;



        $post->save();
        return redirect()->back()->with('status','Post Updated Successfully');
        
    }
    public function show(Post $post){
        $category = $post->category;
        $relatedPosts = $category->posts()->where('id','!=',$post->id) ->latest()->take(3)->get();
        return view('blogposts.single-blog-post',compact('post','relatedPosts'));
    }
    // public function show($slug){
    //     $post = Post::where('slug', $slug)->first();
    //     return view('blogposts.single-blog-post',compact('post'));
        
    // }
    //using route modle binding
    public function destroy(Post $post){
        //dd($post);
        $post->delete();
        
        return redirect()->back()->with('status','Post deleted Successfully');
    }
}
