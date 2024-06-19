@extends('layouts.app')
<div class="container">
        <h1>Copies</h1>
        <a href="{{ route('copies.create') }}" class="btn btn-primary">Add New Copy</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Copy Number</th>
                    <th>Book</th>
                    <th>Shelf</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($copies as $copy)
                    <tr>
                        <td>{{ $copy->copy_num }}</td>
                        <td>{{ $copy->book->name }}</td>
                        <td>{{ $copy->shelf->name }}</td>
                        <td>
                            <a href="{{ route('copies.show', $copy) }}" class="btn btn-info">View</a>
                            <a href="{{ route('copies.edit', $copy) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('copies.destroy', $copy) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>