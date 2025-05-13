<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CookbookController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::with(['user', 'comments'])
            ->withCount('allComments');

        if ($request->filter === 'recent') {
            $query->where('created_at', '>=', Carbon::now()->subDay());
        } elseif ($request->filter === 'older') {
            $query->orderBy('created_at', 'asc');
        } else {
            $query->latest();
        }

        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                    ->orWhere('description', 'like', '%' . $request->search . '%');
            });
        }

        $posts = $query->paginate(10);
        return view('cookbook', compact('posts'));
    }

    public function create()
    {
        return view('cookbook.posts.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'nullable|image|max:30000'
        ]);

        $post = new Post($validated);
        $post->user_id = Auth::user()->id;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('posts', 'public');
            $post->image = $path;
        }

        $post->save();

        return redirect()->route('cookbook')
            ->with('success', 'Post created successfully!');
    }

    public function show(Post $post)
    {
        $post->load(['user', 'comments.user', 'comments.allReplies.user']);
        return view('cookbook.posts.show', compact('post'));
    }


    public function userPosts(Request $request)
    {
        $posts = Post::where('user_id', Auth::id())
            ->withCount('allComments')
            ->latest()
            ->paginate(10);

        return view('cookbook.posts.manage', compact('posts'));
    }


    public function storeComment(Request $request, Post $post)
    {
        $validated = $request->validate([
            'content' => 'required',
            'parent_id' => 'nullable|exists:comments,id'
        ]);

        $comment = new Comment($validated);
        $comment->user_id = Auth::user()->id;
        $comment->post_id = $post->id;
        $comment->save();

        return back()->with('success', 'Comment added successfully!');
    }


    public function destroy(Post $post)
    {
        if (!Auth::user() || Auth::id() !== $post->user_id) {
            abort(403, 'Unauthorized action.');
        }
        $post->delete();

        return redirect()->route('cookbook.my-posts')
            ->with('success', 'Post deleted successfully!');
    }


    public function destroyComment(Comment $comment)
    {
        if (!Auth::user() || Auth::id() !== $comment->user_id) {
            abort(403, 'Unauthorized action.');
        }
        $comment->delete();

        return back()->with('success', 'Comment deleted successfully!');
    }

    public function edit(Post $post)
    {
        if (!Auth::user() || Auth::id() !== $post->user_id) {
            abort(403, 'Unauthorized action.');
        }
        return view('cookbook.posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        if (!Auth::user() || Auth::id() !== $post->user_id) {
            abort(403, 'Unauthorized action.');
        }

        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'nullable|image|max:30000'
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }
            $path = $request->file('image')->store('posts', 'public');
            $post->image = $path;
        }

        $post->update($validated);

        return redirect()->route('cookbook.my-posts')
            ->with('success', 'Post updated successfully!');
    }
}