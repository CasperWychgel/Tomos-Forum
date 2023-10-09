{{-- Extending the web layout  --}}
@extends('layouts.app')
{{-- Content to display with HTML symantics --}}
@section('content')
    <section class="p-4">
        <div class="container mx-auto ">
            <form name="add-project-form" enctype="multipart/form-data" id="add-project-form" method="post" action="{{route('projects.store')}}">
                @csrf
                <div class="space-y-12">
                    <div class="border-b border-gray-900/10 pb-12">
                        <h2 class="text-base font-semibold leading-7 text-gray-900">New project</h2>
                        <p class="mt-1 text-sm leading-6 text-gray-600">This project will be displayed publicly.</p>

                        <div class="">
                            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                <div class="sm:col-span-3">
                                    <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Project name</label>
                                    <div class="mt-2">
                                        <input value="{{ old('name') }}" type="text" name="name" id="name" autocomplete="given-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>
                            </div>
                        </div>
                        @error('name')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <div class="col-span-full">
                                <label for="about" class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                                <div class="mt-2">
                                    <textarea name="description" id="description" aria-describedby="description" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>{{ old('description') }}</textarea>
                                </div>
                                <p class="mt-3 text-sm leading-6 text-gray-600">Write a few sentences about this project.</p>
                            </div>
                            @error('description')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                            <div class="col-span-full">
                                <label for="cover-photo" class="block text-sm font-medium leading-6 text-gray-900">Pictures</label>
                                <span>Upload a file</span>
                                <input id="images" value="{{ old('images') }}" name="images" type="file" class="" multiple>
                            </div>
                            @error('image')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <a href="{{route('projects.index')}}" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
                    <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                </div>
                @if($errors->any)
                    @foreach($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                @endif
            </form>
        </div>
    </section>
@endsection
