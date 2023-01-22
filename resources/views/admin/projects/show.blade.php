@extends('layouts.admin')

@section('content')

<div class="container">
  <div class="text-start mt-4">
      <a class="btn btn-primary" href="{{ route('admin.projects.index') }}">
          <i class="fa-solid fa-arrow-left"></i>
      </a>
  </div>
  <h2 class="text-center">{{ $project->title }}</h2>
  <p class="text-center">{{ $project->profession ? $project->profession->title : 'No Profession' }}</p>

  <p class="mt-4">
    @forelse ($project->technologies as $technology)
    <span>#{{ $technology->title }} </span>
    @empty
    <span>Technologies not choosen.</span>
    @endforelse
  </p>
  <div class="mt-4 text-center">
    <img class="w-50" src="{{ asset('storage/' . $project->cover_image) }}" alt="">
</div>
<p class="mt-4">{{ $project->content }}</p>
</div>
    
@endsection