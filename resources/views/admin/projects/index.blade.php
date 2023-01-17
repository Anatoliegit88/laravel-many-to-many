@extends('layouts.admin')

@section('content')
<div class="container">
  <h2 class="text-center">List of Projects!!</h2>
  <div class="text-end">
    <a class="btn btn-primary" href="{{ route('admin.projects.create') }}">Add a new project!</a>
  </div>
  <div class="row justify-content-center">
    <div class="col-8">
      @if (session('message'))
      <div class="alert alert-success">
        {{ session('message') }}
      </div>
      @endif

      <table class="table bg-slate-500">
        <thead>
          <tr>
              <th scope="col">Title</th>
              <th scope="col">Date</th>
              <th scope="col">Actions</th>
          </tr>
      </thead>
      <tbody>
        @foreach ($projects as $project)
        <tr>
          <th scope="row">{{ $project->title }}</th>
             <td>{{ $project->created_at }}</td>
              <td>
                <a class="btn btn-success" href="{{ route('admin.projects.show', $project->slug) }}"><i class="fa-solid fa-eye"></i> </a>
                <a class="btn btn-warning" href="{{ route('admin.projects.edit', $project->slug) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                <form action="{{route('admin.projects.destroy', $project->slug) }}"method="POST" class="d-inline-block">
                  @method('DELETE')
                  @csrf
                  <button type="submit" class="btn btn-danger">
                    <i class="fa-solid fa-trash"></i>
                </button>
                </form>
              </td>                 
        </tr>
        @endforeach
      </tbody>
      </table>
    </div>
  </div>
</div>
    
@endsection