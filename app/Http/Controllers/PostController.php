<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Contracts\PostInterface;
use App\Contracts\CategoryInterface;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PostInterface $postService)
    {
        $posts = $postService->getAllPosts();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CategoryInterface $categoryService)
    {
        $categories = $categoryService->getAllCategories();
        return view('posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request, PostInterface $postService)
    {
        if ($post = $postService->createPost( $request->all()) ) {
            return redirect('/posts')->withSuccess('Post has been successfully created.');
        }
        return redirect()->back()->withWarning('Whoops, looks like something went wrong, please try later.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id, PostInterface $postService)
    {
        $post = $postService->findPostById( $id );
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id, PostInterface $postService, CategoryInterface $categoryService)
    {
        $post = $postService->findPostById( $id );
        $categories = $categoryService->getAllCategories();
        return view('posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update($id, PostRequest $request, PostInterface $postService)
    {
        if ($post = $postService->updatePost( $id, $request->all() ) ) {
            return redirect('/posts/'. $id )->withSuccess('Post has been successfully updated.');
        }
        return redirect()->back()->withWarning('Whoops, looks like something went wrong, please try later.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, PostInterface $postService)
    {
        if ( null != $post = $postService->deletePost( $id ) ) {
            return redirect('/posts')->withSuccess('Post has been successfully deleted.');
        }
        return redirect()->back()->withWarning('Whoops, looks like something went wrong, please try later.');
    }
}
