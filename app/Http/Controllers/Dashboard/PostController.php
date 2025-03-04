<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Repositories\PostRepositoryInterface;

class PostController extends Controller
{

    public function __construct(
        public PostRepositoryInterface $postRepository
    ) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::orderBy("created_at", "desc")->paginate(15);

        return view("dashboard.posts.index", ["posts" => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("dashboard.posts.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $data = $request->safe()->except('categories');
        $categories = $request->safe()->only('categories');

        $post = $request->user()->posts()->create($data);

        $this->postRepository->syncWithPost($post, $categories);

        return redirect()->with('success', 'Se a creado con éxito')->route("dashboard.posts.index");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = $post->categories->pluck('slug')->implode(', ');

        $categories_array = $post->categories->pluck('slug')->toArray();

        $this->postRepository->syncWithPost($post, $categories_array);

        return view("dashboard.posts.edit", ['post' => $post, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $data = $request->validated();

        $post->update($data);

        return redirect()->with('success', 'Se actualizo con éxito')->route("dashboard.posts.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return back()->with('success', 'se borro con exito');
    }
}
