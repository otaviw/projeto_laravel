<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    
    public function index(Request $request)
    {
        $categories = Category::all();

        $query = Post::with(['user', 'category'])->latest();

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        $posts = $query->get();

        return view('blog.index', compact('posts', 'categories'));
    }

    
    public function show(Post $post)
    {
        return view('blog.show', compact('post'));
    }

        public function categorias()
    {
        $categories = Category::withCount('posts')->get();
        return view('blog.categorias', compact('categories'));
    }


    public function postsPorCategoria(Category $category)
    {
        $posts = $category->posts()->with('user')->latest()->get();
        return view('blog.posts_por_categoria', compact('category', 'posts'));
    }

    
    public function create()
    {
        $categories = Category::all();
        return view('blog.create', compact('categories'));
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('blog.index')->with('success', 'Post criado com sucesso!');
    }

    
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('blog.edit', compact('post', 'categories'));
    }

    
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        $post->update($request->only('title', 'content', 'category_id'));

        return redirect()->route('blog.index')->with('success', 'Post atualizado com sucesso!');
    }

    
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('blog.index')->with('success', 'Post excluído com sucesso!');
    }
}
