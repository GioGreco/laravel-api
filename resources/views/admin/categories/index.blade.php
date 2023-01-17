@extends('layouts.admin')

@section('content')
    <h1>Categories</h1>
    <a class="btn btn-success" href="{{route('admin.categories.create')}}">Crea nuova categoria</a>
    @if(session()->has('message'))
        <div class="alert alert-success mb-3 mt-3">
            {{ session()->get('message') }}
        </div>
    @endif
    <ul>
        @foreach ($categories as $category)
            <li>
                <a class="btn btn-primary text-white btn-sm" href="{{route('admin.categories.show', $category->slug)}}" title="View Category">{{$category->name}}</a> | <a class="btn btn-warning" href="{{route('admin.categories.edit', $category->slug)}}" title="Edit Category">EDIT</a> |
                <form action="{{route('admin.categories.destroy', $category->slug)}}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="delete-button btn btn-danger" data-item-title="{{$category->name}}">DELETE</button>
                </form>
            </li>
        @endforeach
    </ul>

    @include('partials.admin.modal-delete')
@endsection
