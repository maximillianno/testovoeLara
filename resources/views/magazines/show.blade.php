{{--magazine.show--}}
@extends('layouts.app')

@section('content')
 <div class="container">
     <div class="row">
         <div class="col-4">
             <img src="{{ asset($magazine->img) }}" alt="" width="350">
         </div>
         <div class="col-8 ml-auto">

                 <h3 class="text-primary">Название: </h3>
                 <h4>{{ $magazine->name }}</h4>


                 <h3 class="text-primary">Описание: </h3>
                 <h4>{{ $magazine->descrih4tion }}</h4>

                 <h3 class="text-primary">Дата: </h3>
                 <h4>{{ $magazine->date }}</h4>
             



         </div>
     </div>
             <a href="{{ route('magazine.edit', ['magazine' => $magazine->id ]) }}">edit</a>

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


 </div>
@endsection