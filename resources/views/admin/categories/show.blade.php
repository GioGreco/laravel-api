@extends('layouts.admin')

@section('content')
    <a class="btn btn-dark" href="{{route('admin.categories.index')}}">BACK</a>
    <h1>{{ $category->name }}</h1>
    <ul>
        @foreach ($category->projects as $project)
            <li>{{$project->title}}</li>
        @endforeach
    </ul>
@endsection
