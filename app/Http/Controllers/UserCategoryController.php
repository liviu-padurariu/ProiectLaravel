<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\User;
use App\Models\UserCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $userCategories = UserCategories::orderBy('id', 'ASC')
            ->with(['user', 'category'])
            ->paginate(5);
        $value = ($request->input('page', 1) - 1) * 5;
        return view('userCategories.list', compact('userCategories'))->with('i', $value);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categories::all();
        $users = User::all();
        return view('userCategories.create', compact('categories', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required',
            'category_id' => 'required'
        ]);
        // create new userCategory
        UserCategories::create($request->all());
        return redirect()->route('userCategories.index')->with('success', 'A new userCategories has been created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $userCategory = UserCategories::find($id);
        return view('userCategories.show', compact('userCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $userCategory = UserCategories::find($id);
        $categories = Categories::all(); // Returns all the categories from the categories table
        $users = User::all(); // Returns all user from the users table
        return view('userCategories.edit', compact('userCategory', 'categories', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'user_id' => 'required',
            'category_id' => 'required'
        ]);
        UserCategories::find($id)->update($request->all());
        return redirect()->route('userCategories.index')->with('success', 'User category has been successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        UserCategories::find($id)->delete();
        return redirect()->route('userCategories.index')->with('success', 'User category removed successfully');
    }
}
