@extends('layouts.app')
 
@section('import-cdn')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
 
@section('content')
<h1 class="container my-1">create</h1>
<div class="container mt-5">
  <a class="" href="{{route('admin.projects.index')}}">
    <div class="my-3 btn btn-success">
      back to index
    </div>
  </a>

  <section class="debug">

    <form action="{{ route('admin.projects.store') }}" method="POST">
      @csrf
      
      <label for="name" class="form-label">Name</label>
      <input type="text" class="form-control" id="name" name="name" />

      <label for="git_url" class="form-label">Url repository</label>
      <textarea
      class="form-control"
      id="git_url"
      name="git_url"
      rows="1"
      ></textarea>
      
      <label for="description" class="form-label">Description</label>
      <textarea
      class="form-control"
          id="description"
          name="description"
          rows="5"
          ></textarea>
          
          <button type="submit" class="btn btn-primary">Salva</button>
        </form>
      </div>
    </section>
      
      @endsection
      