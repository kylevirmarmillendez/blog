<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreatePostRequest;

use App\Models\Post;

use function PHPUnit\Framework\returnSelf;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::latest()->get();
        return view('posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreatePostRequest $request)
    {

        // $file = $request->file('file');

        // return $file->getClientOriginalName();

    //    $validated = $request->validate([
    //     'title'=> 'required|unique:posts|max:255',
    //     'content'=>'required',
    //    ]);


    //    $title  = $request->title;  
        
        // Post::create($request->all());

        // $post = new Post;

        // $post->title = $request->title;
        // $post->content = $request->content;
        // $post->save();

        // return redirect('/posts');

        $input = $request->all();
        $file = $request->file('file');
        if($file){
            $name = $file->getClientOriginalName();
            $file->move('images', $name);

            $input['path'] = $name;
        }

        Post::create($input);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {   
        $post = Post::findOrFail($id);
        return view('posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);

        return view('posts.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
      
    $post = Post::findOrFail($id);
    $post->update(["title"=>$request->title,"content"=>$request->content]);
    return redirect('/posts');

    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       return "deleted";
    }


    public function fileForm(){
      return view("fileUpload");
    }
    

    public function fileUpload(Request $request){
       $file =  $request->file('file');

       return $file->getClientOriginalName();


        // echo '<br>';

        // return $file;
    }

   
}
