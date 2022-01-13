@extends('layouts.app')

@section('content')

  <div class="container w-50 mt-4">

    <div class="text-center">
        <h1> Add new Note! </h1>
    </div>


  <form action="/notes" method="POST" enctype="multipart/form-data">
    @csrf

  <div class="container my-5">
    <div class="row">
      <div class="col-8">
        <label for="formGroupExampleInput" class="form-label">title</label>
        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="enter title" name="title">
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
          <textarea class="form-control" placeholder="enter description" id="formGroupExampleInput2" style="height: 120px" name="description"></textarea>
        </div>
            
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

        <!-- controller validation -->
          @if ($errors->any())
              <div>
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif

      <div class="gap-2 d-md-flex float-end mt-5">
      <a href="/notes" class="btn btn-outline-dark me-md-2"> &larr; GO BACK </a>
      <button class="btn btn-outline-dark me-md-2" type="submit">ADD</button>
    </div>
  </form>


  </div>


@endsection

