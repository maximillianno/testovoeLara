@extends('layouts.app')

@section('content')
    <h1>Список авторов:</h1>
    @if(session('status'))
        <div class="status" style="color: #28a745">
            <span>{{ session('status') }}</span>
        </div>
    @endif

    <table class="table">
        <thead>
        <tr>
            <th>Id</th>
            <th>FirstName</th>
            <th>LastName</th>
            <th>MiddleName</th>
            <th>actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($authors as $author)
        <tr>
            <td>{{ $author->id }}</td>
            <td>{{ $author->firstName }}</td>
            <td>{{ $author->lastName }}</td>
            <td>{{ $author->middleName }}</td>
            <td>
                <a href="{{ route('author.show', ['id'=> $author->id]) }}">show</a>
                <a href="{{ route('author.edit', ['id'=> $author->id]) }}">edit</a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    {{ $authors->links() }}
    <a class="btn btn-primary" href="{{ route('author.create') }}">Новый автор</a>
@endsection