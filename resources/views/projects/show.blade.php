{{-- Extending the web layout  --}}
@extends('layouts.app')
{{-- Content to display with HTML symantics --}}
@section('content')
    <div class="section">
        <div class="container">
            @if(str_contains($project->image, 'https://'))
                <img class="" src="{{$project->image}}">
            @else()
                <img class="" src="/images/{{$project->image}}">
            @endif

            <h1 class="">{{$project->name}}</h1>
            <p class="">{{$project->description}}</p>
            <a href="{{ url()->previous() }}" class="">Back</a>
        </div>
    </div>
@endsection
