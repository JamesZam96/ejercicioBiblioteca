@extends('layouts.app')
<div class="container">
        <h1>Edit Copy</h1>
        <form action="{{ route('copies.update', $copy) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="copy_num">Copy Number</label>
                <input type="number" class="form-control" id="copy_num" name="copy_num" value="{{ $copy->copy_num }}" required>
            </div>
            <div class="form-group">
                <label for="book_id">Book</label>
                <select class="form-control" id="book_id" name="book_id" required>
                    @foreach($books as $book)
                        <option value="{{ $book->id }}" @if($book->id == $copy->book_id) selected @endif>{{ $book->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="shelf_id">Shelf</label>
                <select class="form-control" id="shelf_id" name="shelf_id" required>
                    @foreach($shelves as $shelf)
                        <option value="{{ $shelf->id }}" @if($shelf->id == $copy->shelf_id) selected @endif>{{ $shelf->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>