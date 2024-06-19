@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear Autor</h1>

        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('authors.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" required value="{{old('name')}}">
        </div>
        <div class="mb-3">
            <label for="biography" class="form-label">Biografia</label>
            <input type="text" class="form-control" id="biography" name="biography" required>
        </div>

    


    <div class="form-group">
        <label for="user_id"></label>
        <select class="form-control" id="user_id" name="user_id" required>
            @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Crear Autor</button>
</form>
</div>
@endsection
