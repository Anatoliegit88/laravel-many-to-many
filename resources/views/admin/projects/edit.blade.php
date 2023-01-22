@extends('layouts.admin')

@section('content')

<div class="container">
  <h3 class="text-center">
    Change {{ $project->title }}
  </h3>
  <div class="row justify-content-center">
    <div class="col-8">
      @include('partials.errors')
      <form action="{{route('admin.projects.update', $project->slug)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
          <label for="title">Title</label>
          <input type="text" id="title" name="title" class="form-control" value="{{old('title', $project->title)}}">
        </div>

        <div class="mb-4">
          <label for="type">Typology</label>
          <select name="type_id" id="type" class="form-select"></select>
          <option value="">Select</option>
          @foreach ($professions as $profession)
          <option value=" {{$profession->id}} " @selected(old('profession_id', $project->profession?->id)  == $profession->id)>{{ $profession->name }}</option>
              
          @endforeach
        </div>

        <div class="mb-4">
          <h4>Technologies</h4>
          @foreach ($technologies as $technology)
          <div class="form-check">
            <input type="checkbox" name="technologies[]" id="technology-{{ $technology->id }}"
                class="form-check-input" value="{{ $technology->id }}" @checked($errors->any() ? in_array($technology->id, old('technologies', [])) : $project->technologies->contains($technology))>

            <label for="technology-{{ $technology->id }}"
                class="form-check-label">{{ $technology->title }}</label>
        </div>
              
          @endforeach
        </div>

        <div class="mb-4">
          <label for="cover_image">Image</label>
          <input type="file" name="cover_image" id="cover_image" class="form-control">
      </div>

        <div class="mb-4">
          <label for="content">Descriptions</label>
          <textarea name="content" id="content" rows="10" class="form-control">{{old('content', $project->content)}} </textarea>
        </div>
        <button class="btn ntn-primary" type="submit">Save</button>
      </form>
    </div>
  </div>
</div>
    
@endsection