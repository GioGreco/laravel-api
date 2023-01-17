@extends('layouts.admin')

@section('content')
    <section id="EditForm" class="d-flex justify-content-center align-items-center">
        <form action="{{ route('admin.projects.update', $project->slug) }}" method="POST" class="d-flex flex-column justify-content-around align-items-center text-black create_container mt-4 text-white" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <h1>Edit Project : {{$project->title}}</h1>

            <div class="form-field d-flex flex-column align-items-center">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="@error('title') is-invalid @enderror" value="{{old('title', $project->title)}}">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-field d-flex flex-column align-items-center mb-4">
                <label for="description">Description</label>
                <textarea id="description" name="description">{{old('description', $project->description)}}</textarea>
            </div>

            <div class="d-flex flex-column align-items-center">
                <div class="media mb-5">
                    <img class="shadow" width="150" src="{{asset('storage/' . $project->project_image)}}" alt="{{$project->title}}">
                </div>
                <div class="mb-3">
                    <label class="d-block text-center mb-2" for="project_image">Replace project img</label>
                    <input type="file" name="project_image" id="project_image" class="@error('project_image') is-invalid @enderror" >
                    @error('project_image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-field">
                <label for="category_id">Select category:</label>
                <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
                    <option value="">Select category</option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}" {{$category->id == old('category_id') ? 'selected' : ''}}>{{$category->name}}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="tags" class="form-label">Tags</label>
                <select multiple class="form-select" name="tags[]" id="tags">
                    <option value="">Seleziona tag</option>
                    @forelse ($tags as $tag)
                        @if($errors->any())
                            <option value="{{$tag->id}}" {{in_array($tag->id , old('tags[]')) ? 'selected': ''}}>{{$tag->name}}</option>
                        @else
                            <option value="{{$tag->id}}" {{$project->tags->contains($tag->id) ? 'selected': ''}}>{{$tag->name}}</option>
                        @endif
                    @empty
                        <option value="">No tag</option>
                    @endforelse
                </select>
            </div>

            <input type="submit" value="EDIT" class="btn btn-primary mt-3">
            <input type="reset" value="RESET" class="btn btn-warning mt-3">

        </form>
    </section>
@endsection
