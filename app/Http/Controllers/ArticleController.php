<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Categories;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

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
    public function create()
    {
        $categories = Categories::all();
        $users = User::all();
        return view('articles.create', compact('categories', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required'
        ]);
        // Set 'submission_date' to the current date and time
        $request->merge(['submission_date' => Carbon::now()]);
        $request->merge(['is_approved' => false]);

        // create new article
        // create new article
        Article::create($request->all());
        return redirect()->route('articles.index')->with('success', 'Your article added successfully!');
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
        $categories = Categories::all();
        $users = User::all();
        return view('articles.edit', compact('article', 'categories', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'user_id' => 'required',
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
