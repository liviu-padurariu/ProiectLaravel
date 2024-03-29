<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // The 'auth' middleware is applied by default to all methods.
        // If you want to exclude a method from the middleware, you can use the 'except' method.
        $this->middleware('auth')->except('publicPage');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();

        if ($user->isAdmin()) {
            // Redirect to the admin dashboard
            return redirect()->route('admin.index');
        }

        // For regular users, display the regular home view
        return view('home');
    }

    public function publicPage(Request $request)
    {
        $articles = Article::where('is_approved', true)
            ->orderBy('submission_date', 'ASC')
            ->with(['user', 'category'])
            ->paginate(5);
        $value = ($request->input('page', 1) - 1) * 5;
        return view('welcome', compact('articles'))->with('i', $value);
    }
}
