{{-- Extending the web layout  --}}
@extends('layouts.app')
{{-- Content to display with HTML symantics --}}
@section('content')
    <section class="p-4">
        <div class="container mx-auto ">
            <h1>Throw you moped in the mix</h1>
            <div class="grid grid-cols-4 gap-4">
                @foreach($projects as $project)
                    <div class="flex flex-col bg-slate-100 rounded-2xl overflow-hidden">
                        <div class="h-[250px]">
                            @if(str_contains($project->image, 'https://'))
                                <img src="{{$project->image}}" class="w-full h-full" alt="...">
                            @else
                                <img src="/storage/images/{{$project->image}}" class="w-full h-full" alt="...">
                            @endif
                        </div>
                        <div class="p-2">
                            <div class="flex flex-col ">
                                <h2 class="">{{$project->name}}</h2>
                                <p class="">{{$project->description}}</p>
                                <a class="my-1 p-1" href="{{route('projects.show', $project->id)}}">View project</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
