@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center py-4">
                <h1 class=""> My Todo List</h1>        
        </div>

        @if (Auth::user())
        <div class="col-md-7 pb-3 ms-5 ps-5">
            <a href="{{ route('notes.create')}}"> add new note &rarr;</a>
        </div>

            @else
            <div class="col-md-7 pb-3 ms-5 ps-5">
            <p> please log in to add notes! </p>
        </div>
            

        @endif

        <div class="card w-50">
        
            <div class="card-body py-4">

                    @forelse ($notes as $note)

                   

                    <form action="/notes/{{$note->id}}" method="POST">
                      @csrf 
                      @method('DELETE')

                        <div class="row justify-content-between">
                            <div class="col-8 ms-3">
                                <h5 class="card-title py-3"> &Gt; {{$note->title}}</h5>
                                <a 
                                href="/notes/{{$note->id}}"
                                style="text-decoration: none; color:black" 
                                class="card-text ps-4">
                                {{ substr($note->description, 0, 55) }} ...
                                </a>  
                            </div>

                            @if (isset(Auth::user()->id) && Auth::user()->id == $note->user_id)

                            <div class="col-3 d-flex flex-column align-self-sm-center text-center">
                        
                                <a href="{{ route('notes.edit', $note->id)}}" > edit  &rarr; </a> 
                   
                                <button type="submit" class="btn btn-link">delete  &rarr; </button>
                        
                            </div>
                            @endif  
                    
                            <hr class="w-75 mx-auto my-4 ">
                        </div>

                    </form>
                   
                    @empty
                        <p> No Notes Avaliable</p>

                    
                     @endforelse
            </div>
         </div>
    </div>
</div>
@endsection
