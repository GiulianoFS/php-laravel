<!-- user_management.blade.php -->

@extends('layouts.app')

@section('content')
    <div id="app">
        <h1>User Management</h1>

        <!-- Create User Form -->
        <form id="createUserForm" action="{{ route('users.create') }}" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Name">
            <input type="email" name="email" placeholder="Email">
            <input type="text" name="password" placeholder="Password"> 
            <button type="submit">Create User</button>
        </form>

        <!-- Update User Form -->
        <form id="updateUserForm" action="{{ route('users.update') }}" method="POST">
            @csrf
            <input type="hidden" name="_method" value="PUT">
            <input type="text" name="name" placeholder="Name">
            <input type="email" name="email" placeholder="Email">
            <button type="submit">Update User</button>
        </form>

        <!-- Delete User Form -->
        <form id="deleteUserForm" action="{{ route('users.delete', ['id' => 1]) }}" method="POST">
            @csrf
            <input type="hidden" name="_method" value="DELETE">
            <button type="submit">Delete User</button>
        </form>

        <!-- Read All Users Button -->
        <button onclick="readAll()">Read All User</button>

        <ul>
            <users-grid></users-grid>
        </ul>

        <!-- Read Filtered Users Form -->
        <form id="readFilteredUsersForm" action="{{ route('users.readFiltered') }}" method="POST">
            @csrf
            <input type="text" name="filter" placeholder="Filter Criteria">
            <button type="submit">Filter Users</button>
        </form>
    </div>
@endsection