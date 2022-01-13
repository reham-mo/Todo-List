@extends('layouts.app')

@section('content')
  

    <div class="container">
      
            <h1 class="text-center py-4"> Your New Best Todo List </h1>
            <img src= "{{url('img/todo.png')}}" alt="todo logo" style="width: 30%;" class="d-block m-auto">
            <div class="d-flex justify-content-center" >
            <a href="/notes" class="fs-4">create your list &rarr;</a>
            </div>
  
    </div>
@endsection