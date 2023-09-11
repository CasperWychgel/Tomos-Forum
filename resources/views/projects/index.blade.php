{{-- Extending the web layout  --}}
@extends('layouts.app')
{{-- Content to display with HTML symantics --}}
@section('content')
    <div class="flex flex-col p-20">
        @foreach($projects as $project)
            <div class="">
                <div class="row g-0">
                    <div class="col-md-4">
                        @if(str_contains($project->image, 'https://'))
                            <img src="{{$project->image}}" class="img-fluid img-cover h-100 im" alt="...">
                        @else
                            <img src="/images/{{$project->image}}" class="img-fluid img-cover h-100" alt="...">
                        @endif
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{$project->name}}</h5>
                            <p class="card-text">{{$project->description}}</p>
                            <a href="{{route('projects.show', $project->id)}}" class="btn btn-primary">View project</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
