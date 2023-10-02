{{-- Extending the web layout  --}}
@extends('layouts.app')
{{-- Content to display with HTML symantics --}}
@section('content')
    <div class="section">
        <div class="container">
            <form name="add-project-form" enctype="multipart/form-data" id="add-project-form" method="post" action="{{route('projects.store')}}">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Project name</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="name" aria-describedby="name" required>
                </div>
                @error('name')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
                <div class="mb-3">
                    <label for="description" class="form-label">Project description</label>
                    <input type="text" name="description" value="{{ old('description') }}" class="form-control" id="description" aria-describedby="description" required>
                </div>
                @error('description')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
                <div class="mb-3">
                    <label for="short_description" class="form-label">Project short description</label>
                    <input type="text" name="short_description" value="{{ old('short_description') }}" class="form-control" id="short_description" aria-describedby="short_description" required>
                </div>
                @error('short_description')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
                <div class="mb-3">
                    <label for="image" class="form-label">Project image</label>
                    <input type="file" name="image" value="{{ old('image') }}" class="form-control" id="image" aria-describedby="image">
                </div>
                @error('image')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
                <button type="submit" class="btn btn-primary">Submit</button>

                @if($errors->any)
                    @foreach($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                @endif
            </form>
        </div>
    </div>
@endsection
