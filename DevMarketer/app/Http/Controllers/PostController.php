<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Image;
use DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id','desc')->paginate(20);

        return view('manage.posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //dd($request->image);
        $request->validate([
            'title'     =>  'required|string|unique:posts',
            'content'   =>  'required|string',
            'image'     =>  'required|image|max:2048',
        ]);

        $image_file =$request->image;

        $image = Image::make($image_file);

        Response::make($image->encode('jpeg'));

        $slug = join('-',explode(' ',$request->title));

        $post = new Post();
        $post->title        = $request->title;
        $post->content      = $request->content;
        $post->image        = $image;
        $post->status       = $request->status;
        $post->auther_id    = auth()->user()->id;
        $post->slug         = $slug;



        if($post->save()){
            return redirect(route('post.show',$post->id));
        }
        return redirect()->back()->with('error','Sorry ...! some error happen when add post ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('manage.posts.show')->withPost($post);

    }

    public function storeImage($id){

        $data = $this->show($id);
        //dd($data->post->image);
        $image = Image::make($data->post->image);
        $response = Response::make($image->encode('jpeg'));
        $response->header('Content-Type','image/jpeg');

        return $response;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
