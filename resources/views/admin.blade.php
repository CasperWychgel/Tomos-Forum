{{-- Extending the web layout  --}}
@extends('layouts.app')
{{-- Content to display with HTML symantics --}}
@section('content')
    <div class="section">
        <div class="container">
            <h1>Admin project overview</h1>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Image</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($projects as $project)
                        <tr>
                            <th scope="row">1</th>
                            <td>{{$project->name}}</td>
                            <td>{{$project->short_description}}</td>
                            <td>
                                @if(str_contains($project->image, 'https://'))
                                    <img src="{{$project->image}}" class="img-fluid img-cover img-table h-100">
                                @else
                                    <img src="/images/{{$project->image}}" class="img-fluid img-cover img-table h-100">
                                @endif
                            </td>
                            <td>
                                <a href="{{ url('/projects/' . $project->id) }}" title="View Student"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                <a href="{{ url('/projects/' . $project->id . '/edit') }}" title="Edit Student"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                <form method="POST" action="{{ url('/projects/' . $project->id) }}" accept-charset="UTF-8" style="display:inline">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete project"><i class="fa fa-trash-o" aria-hidden="true"></i>Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
