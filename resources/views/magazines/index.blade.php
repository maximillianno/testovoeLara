{{--magazine.index--}}
@extends('layouts.app')

@section('content')
    <h1>Список журналов:</h1>
    @if(session('status'))
        <div class="status" style="color: #28a745">
            <span>{{ session('status') }}</span>

        </div>
    @endif

    <table class="table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Description</th>
            <th>Date</th>
            <th>Authors</th>
            <th>actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($magazines as $magazine)
        <tr>
            <td>{{ $magazine->id }}</td>
            <td>{{ $magazine->name }}</td>
            <td>{{ $magazine->description }}</td>
            <td>{{ $magazine->created_at }}</td>
            <td>
                @foreach($magazine->authors as $author)
                    <span>{{ $author->lastName }}</span>
                @endforeach

            </td>
            {{--<td>{{ Form::image(asset($magazine->img)) }}</td>--}}
            <td>
                <a href="{{ route('magazine.show', ['id'=> $magazine->id]) }}">show</a>
                <a href="{{ route('magazine.edit', ['id'=> $magazine->id]) }}">edit</a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    {{ $magazines->links() }}
    <a class="btn btn-primary" href="{{ route('magazine.create') }}">Новый журнал</a>
@endsection