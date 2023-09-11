{{-- Extending the web layout  --}}
@extends('layouts.app')
{{-- Content to display with HTML symantics --}}
@section('content')
    <div class="section">
        <div class="container">
            @if(str_contains($project->image, 'https://'))
                <img class="img-fluid" src="{{$project->image}}">
            @else()
                <img class="img-fluid" src="/images/{{$project->image}}">
            @endif

            <h1 class="h1">{{$project->name}}</h1>
            <p class="p-1">{{$project->description}}</p>
            <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
        </div>
    </div>
@endsection
