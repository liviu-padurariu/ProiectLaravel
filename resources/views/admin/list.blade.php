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
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
