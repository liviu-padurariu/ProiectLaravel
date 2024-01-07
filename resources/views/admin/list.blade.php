<!-- resources/views/admin/users.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Users with Roles and Categories</h2>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Categories</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr style="cursor: pointer;" onclick="window.location='{{ route('admin.edit', $user->id) }}'">
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            {{ $user->role->name ?? 'N/A' }}
                            @if ($user->isAdmin())
                                <span class="badge text-bg-danger">Admin</span>
                            @endif
                        </td>
                        <td>
                            @foreach($user->categories as $category)
                                {{ $category->name }},
                            @endforeach
                        </td>
                        <td>
                            <form method="POST" action="{{ route('admin.destroy', $user->id) }}" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
