<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    protected $user;

    public function __construct()
    {
        //$this->user = JWTAuth::parseToken()->authenticate();

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Post::all();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validate data
        $data = $request->only('category', 'title', 'contents', 'active');
        $validator = Validator::make($data, [
            'category' => 'required|string',
            'title' => 'required',
            'contents' => 'required',
            'active' => 'required'
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }

        //Request is valid, create new post
        $Post = Post::create([
            'category' => $request->category,
            'title' => $request->title,
            'contents' => $request->contents,
            'active' => $request->active
        ]);

        //Post created, return success response
        return response()->json([
            'success' => true,
            'message' => 'Post created successfully',
            'data' => $Post
        ], Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $Post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Post = Post::find($id);

        if (!$Post) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, Post not found.'
            ], 400);
        }

        return $Post;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $Posts
     * @return \Illuminate\Http\Response
     */
    public function showByCategory($category)
    {
        $Posts = Post::where('category', $category)->get();

        if (!$Posts) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, Posts not found.'
            ], 400);
        }

        return $Posts;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $Post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $Post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $Post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $Post)
    {
        //Validate data
        $data = $request->only('category', 'title', 'contents', 'active');
        $validator = Validator::make($data, [
            'category' => 'required|string',
            'title' => 'required',
            'contents' => 'required',
            'active' => 'required'
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }

        //Request is valid, update Post
        $Post = $Post->update([
            'category' => $request->category,
            'title' => $request->title,
            'contents' => $request->contents,
            'active' => $request->active
        ]);

        //Post updated, return success response
        return response()->json([
            'success' => true,
            'message' => 'Post updated successfully',
            'data' => $Post
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $Post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $Post)
    {
        $Post->delete();

        return response()->json([
            'success' => true,
            'message' => 'Post deleted successfully'
        ], Response::HTTP_OK);
    }
}
