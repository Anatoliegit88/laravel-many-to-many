@extends('layouts.admin')

@section('content')

<div class="container">
  <h3 class="text-center">
    Add a new project!!
  </h3>
  <div class="row justify-content-center">
      <div class="col-8">
        @include('partials.errors')
        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="mb-4">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}">
          </div>

          <div class="mb-4">
            <label for="type">Typology</label>
            <select name="profession_id" id="type" class="form-select">
              <option value="">Select</option>
              @foreach ($professions as $profession)
              <option value="{{ $profession->id }}"@selected(old('profession_id') == $profession->id)> {{ $profession->name }} </option>
                  
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <label for="cover_image">Image</label>
            <input type="file" name="cover_image" id="cover_image"
            class="form-control">
          </div>
          <div class="mb-4">
            <label for="content">Descriptions</label>
            <textarea name="content" id="content" rows="10" class="form-control">{{old('content')}} </textarea>
          </div>
          <button class="btn ntn-primary" type="submit">Save</button>
        </form>
      </div>
  </div>
</div>
    
@endsection