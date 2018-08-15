{{--magazine.create--}}
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">


            <div class="col-4">
                <img src="" alt="" width="350">

            </div>
            <div class="col-8 ml-auto">
                <div class="form-group">
                    {{ Form::open(['action' => 'MagazineController@store', 'files' => true]) }}</br>
                    {{ csrf_field() }}
                    {{ Form::label('name', "Название: ") }}</br>
                    {{ Form::text('name') }}</br>
                    {{ Form::label('description', "Описание: ") }}</br>
                    {{ Form::textarea('description') }}</br>
                    {{ Form::label('date', "Дата выхода: ") }} </br>
                    {{ Form::date('date') }} </br>
                    {{ Form::file('file') }} </br>
                    {{ Form::submit('submit')  }} </br>
                    {{ Form::close() }}
                </div>
            </div>

        </div>
    </div>
{{--    {{ Form::model($magazine, ['route' => ['magazine.update', $magazine->id]]) }}--}}


@endsection