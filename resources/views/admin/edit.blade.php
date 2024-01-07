<!-- resources/views/admin/users/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit User</h2>
        <form action="{{ route('admin.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group w-50">
                <label for="name">Name:</label>
                <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
            </div>

            <div class="form-group w-50 mt-2">
                <label for="email">Email:</label>
                <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
            </div>

            <div class="form-group w-50 mt-2">
                <label for="role">Role:</label>
                <select name="role" class="form-control" required>
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mt-4 mb-4">
                <label for="categories">Categories:</label><br>
                @foreach($categories as $category)
                    <label class="checkbox-inline m-2">
                        <input type="checkbox" name="categories[]" value="{{ $category->id }}" {{ in_array($category->id, $userCategories->pluck('id')->toArray()) ? 'checked' : '' }}>
                        {{ $category->name }}
                    </label>
                @endforeach
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('admin.index') }}" class="btn btn-default">Cancel</a>
        </form>
    </div>
@endsection
