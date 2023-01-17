@extends('layouts.admin')

@section('content')
    <h1>Tags</h1>
    {{-- <a class="btn btn-success" href="{{route('admin.tags.create')}}">Crea nuovo Tag</a> --}}
    @if(session()->has('message'))
        <div class="alert alert-success mb-3 mt-3">
            {{ session()->get('message') }}
        </div>
    @endif
    <form action="{{route('admin.tags.store')}}" method="POST" class="d-flex flex-column align-items-center">
        @csrf
            <input type="text" name="name" id="name" class="form-control" placeholder="Add a tag name here">
            <input type="color" name="tag_color" id="tag_color" value="#45f3ff">
            {{-- <input type="hidden" name='tag_color' id="tag_color"> --}}
            <button class="btn btn-outline-secondary" type="submit">Add</button>
    </form>
    <ul>
        @foreach ($tags as $tag)
            <li>
                {{-- <a class="btn btn-primary text-white btn-sm" href="{{route('admin.tags.show', $tag->slug)}}" title="View Tag">{{$tag->name}}</a> | --}}
                {{-- <a class="btn btn-warning" href="{{route('admin.tags.edit', $tag->slug)}}" title="Edit Tag">EDIT</a> | --}}
                <a href="#" class="btn" style="background-color: {{ $tag->tag_color }}">{{ $tag->name }}</a>
                <form action="{{route('admin.categories.destroy', $tag->slug)}}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="delete-button btn btn-danger" data-item-title="{{$tag->name}}">DELETE</button>
                </form>
            </li>
        @endforeach
    </ul>

    @include('partials.admin.modal-delete')
@endsection
