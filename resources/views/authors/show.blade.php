@extends('layouts.app')

@section('content')
 <div class="container">
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
             <td>{{ $author->firstName }}</td>
             <td>{{ $author->lastName }}</td>
             <td>{{ $author->middleName }}</td>
         </tr>
         <tr>
             <td><a href="{{ route('author.edit', ['author' => $author->id ]) }}">edit</a></td>
         </tr>
         </tbody>
    </table>
 </div>
@endsection