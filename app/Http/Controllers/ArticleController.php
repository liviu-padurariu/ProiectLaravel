<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Categories;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $articles = Article::orderBy('submission_date', 'ASC')
            ->with(['user', 'category'])
            ->paginate(5);
        $value = ($request->input('page', 1) - 1) * 5;
        return view('articles.list', compact('articles'))->with('i', $value);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($userId = null)
    {
        $id = Session::get('user_id');
        $role = Session::get('user_role');

        if (!$id) {
            return redirect()->route('articles.index')->with('error', 'No user Id found');
        }

        $categories = Categories::all();
        $user = User::find($id);

        $categories = $user->categories;

        return view('articles.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        // Create the article
        $article = new Article([
            'id' => $request->id,
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'user_id' => auth()->id(),
            'submission_date' => now(),
            'is_approved' => false,
            'category_id' => $request->input('category_id'),
        ]);

        $article->save();

        return redirect()->route('articles.index')->with('success', 'Article created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $article = Article::find($id);
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $article = Article::find($id);
        $user = $article->user;

        $categories = $user->categories;
        return view('articles.edit', compact('article', 'categories', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required',
            'is_approved' => 'required'
        ]);
        Article::find($id)->update($request->all());
        return redirect()->route('articles.index')->with('success', 'Article updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Article::find($id)->delete();
        return redirect()->route('articles.index')->with('success', 'Article removed successfully');
    }
}
