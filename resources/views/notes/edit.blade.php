@extends('layouts.app')

@section('content')


<div class="container w-50">
  <div class="row justify-content-center">
      <div class="col-md-8 text-center py-4">
          <h1 class=""> Update your Note </h1>        
       </div>
  
       <form action="/notes/{{ $notes->id }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      
    
        <div class="container my-5">
          <div class="row">
            <div class="col-8">
              <label for="formGroupExampleInput" class="form-label">title</label>
              <input type="text" class="form-control" id="formGroupExampleInput" name="title" value="{{ $notes->title }}">
            </div>

            <div class="col-3 m-auto pt-4 mb-1">
            <input type="file" name="image">
            </div>
          </div>
      </div>


        <div class="container">
          <div class="row">
            <div class="col-9">
              <label for="formGroupExampleInput2" class="form-label">description</label>
              <textarea class="form-control" id="formGroupExampleInput2" style="height: 120px" name="description" value="{{ $notes->title }}"></textarea>          </div>

              <ul class="list-group col">
                <label for="formGroupExampleInput2" class="form-label">expected time to finish</label>
                <li class="list-group-item">
                <input class="form-check-input me-1" type="checkbox" value="today" name="time[]">
                Today
                </li>

                <li class="list-group-item">
                <input class="form-check-input me-1" type="checkbox" value="tomorrow" name="time[]">
                Tomorrow 
                </li>

                <li class="list-group-item">
                <input class="form-check-input me-1" type="checkbox" value="this-week" name="time[]">
                This week
                </li>
              </ul>
            </div>

              <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-5">
                <button class="btn btn-outline-dark me-md-2" type="submit">Submit</button>
              </div>
          </div>
        </div>
     </form>
  </div>

 </div>

@endsection