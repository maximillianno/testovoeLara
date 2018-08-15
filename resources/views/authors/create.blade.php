@extends('layouts.app')

@section('content')
    <div class="container">
        {{ Form::open(['action' => ['AuthorController@store'], 'files' => true]) }}

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
                <td>{{ Form::text('firstName') }}</td>
                <td>{{ Form::text('lastName') }}</td>
                <td>{{ Form::text('middleName') }}</td>
            </tr>
            </tbody>
        </table>


        {{ Form::submit('submit')  }} </br>
        {{ Form::close() }}

    </div>
{{--    {{ Form::model($author, ['route' => ['author.update', $author->id]]) }}--}}


@endsection