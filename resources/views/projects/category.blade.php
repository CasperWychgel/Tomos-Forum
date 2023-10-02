{{-- Extending the web layout  --}}
@extends('layouts.app')
{{-- Content to display with HTML symantics --}}
@section('content')
    <section class="p-4">
        <div class="container mx-auto ">
            <h1>Throw you moped in the mix</h1>
            <div class="grid grid-cols-4 gap-4">
                @foreach($projects as $project)
                    <div class="flex flex-col rounded">
                        <div class="">
                            <div class="">
                                @if(str_contains($project->image, 'https://'))
                                    <img src="{{$project->image}}" class="" alt="...">
                                @else
                                    <img src="/images/{{$project->image}}" class="" alt="...">
                                @endif
                            </div>
                            <div class="">
                                <div class="">
                                    <h5 class="">{{$project->name}}</h5>
                                    <p class="">{{$project->description}}</p>
                                    <a href="{{route('projects.show', $project->id)}}" >View project</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
