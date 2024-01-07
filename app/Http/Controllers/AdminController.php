<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Roles;
use App\Models\Categories;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!auth()->user()->isAdmin()) {
            return redirect('/home');
        }

        // Fetch all users from the database
        $users = User::all();

        return view('admin.list', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (!auth()->user()->isAdmin()) {
            return redirect('/home');
        }

        $user = User::find($id);
        $roles = Roles::all();
        $categories = Categories::all();

        $userCategories = $user->categories;

        return view('admin.edit', compact('user', 'roles', 'categories', 'userCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the request
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required',
            'categories' => 'array',
        ]);

        $user = User::find($id);

        if (!$user) {
            // Handle the case where the user is not found
            return redirect()->route('admin.index')->with('error', 'User not found.');
        }

        // Update user details
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'role_id' => $request->input('role'),
        ]);

        // Sync the categories for the user
        $user->categories()->sync($request->input('categories', []));

        // Redirect back with success message or to a different route
        return redirect()->route('admin.index')->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::find($id)->delete();
        return redirect()->route('admin.index')->with('success', 'User removed successfully');
    }
}
