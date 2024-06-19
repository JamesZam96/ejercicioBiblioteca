@extends('layouts.app')
<div class="container">
        <h1>Copy Details</h1>
        <p>Copy Number: {{ $copy->copy_num }}</p>
        <p>Book: {{ $copy->book->name }}</p>
        <p>Shelf: {{ $copy->shelf->name }}</p>
        <a href="{{ route('copies.index') }}" class="btn btn-secondary">Back</a>
    </div>