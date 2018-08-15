@extends('layouts.app')

@section('content')
    <div class="container">
        {{ Form::open(['action' => ['AuthorController@update', $author->id], 'files' => true]) }}
        {{ method_field('PUT') }}
        <table class="table">
            <thead>
            <tr>
                <th>Имя: </th>
                <th>Фамилия: </th>
                <th>Отчество: </th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{ Form::text('firstName', $author->firstName) }}</td>
                <td>{{ Form::text('lastName', $author->lastName) }}</td>
                <td>{{ Form::text('middleName', $author->middleName) }}</td>
            </tr>
            </tbody>
        </table>

        {{ Form::submit('submit')  }} <br>
        {{ Form::close() }}
        <div class="w-100"></div>

        {{ Form::open(['action' => ['AuthorController@destroy', $author->id]]) }}
                {{ method_field('DELETE') }}
        {{ Form::submit('удалить')  }} <br>


    </div>
{{--    {{ Form::model($author, ['route' => ['author.update', $author->id]]) }}--}}


@endsection