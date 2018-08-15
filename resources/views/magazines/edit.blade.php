{{--magazine.edit--}}
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">


        <div class="col-4">
            <img src="{{ asset($magazine->img) }}" alt="" width="350">

        </div>
        <div class="col-8 ml-auto">
            <div class="form-group">
                {{ Form::open(['action' => ['MagazineController@update', $magazine->id], 'files' => true]) }}<br>
                {{ method_field('PUT') }}<br>
                {{ Form::label('name', "Название: ") }}<br>
                {{ Form::text('name', $magazine->name,['class'=>'form-control']) }}<br>
                {{ Form::label('description', "Описание: ") }}<br>
                {{ Form::textarea('description', $magazine->description, ['rows' => 3, 'class'=>'form-control']) }}<br>
                {{ Form::label('date', "Дата выхода: ") }} <br>
                {{ Form::date('date', $magazine->date,['class'=>'form-control']) }} <br>
                {{ Form::label('authors', 'Авторы: ') }} <br>
                {{ Form::select('authors[]', $authors, $selected, ['multiple', 'size=9', 'class=form-control']) }} <br>
                {{ Form::file('file',['class'=>'form-control']) }} <br>

                <div class="row justify-content-around">

                {{ Form::submit('submit',['class'=>'btn btn-primary'])  }} <br>
                {{ Form::close() }}


                {{--    Форма удаления }}--}}
                {{ Form::open(['action' => ['MagazineController@destroy', $magazine->id]]) }}
                {{ method_field('DELETE') }}
                {{ Form::submit('Удалить', ['class' => 'btn btn-danger'])  }} <br>
                </div>
            </div>
        </div>
        </div>
    </div>


@endsection