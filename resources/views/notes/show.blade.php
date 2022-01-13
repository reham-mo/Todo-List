@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row justify-content-center wx-auto pt-5">
        <div class="card w-50 " style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title text-center p-2 mt-4">{{$notes->title}}</h5>
                <img src="{{asset('img/' . $notes->image_path)}}" class="d-block mx-auto mt-3" style="height: 200px; " alt="...">
                <p class="card-text text-center pt-3 mt-4">{{$notes->description}}</p>

                <p class="toppings"> Expected time to finish:</p>

              
                     @php
                       $tiime = trim($notes->time, ' [] ');
                       $tiimes = str_replace('"', '', $tiime);
                       $times = explode(',', $tiimes);
                       @endphp
                       <ul>
                       @foreach($times as $time)
                            <li> {{$time }} </li> </br>
                       @endforeach    
                       </ul>
        
               <div class="text-end pt-5">
               <form action="{{route('notes.destroy', $notes->id)}}" method="POST">
                        @csrf 
                        @method('DELETE')     
                @if (Auth::user())
                
                        <a href="/notes" class="card-link"> &larr; go back</a> 
                        @elseif (isset(Auth::user()->id) && Auth::user()->id == $note->user_id)
                        <a href="{{ route('notes.edit', $notes->id)}}" class="card-link">edit</a>
                        <button type="submit" class="btn btn-link">delete </button>
                 @endif       
                </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection