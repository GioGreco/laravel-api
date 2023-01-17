@extends('layouts.admin')

@section('content')

    <section id="createForm" class="d-flex justify-content-center align-items-center">
        <form action="{{ route('admin.projects.store') }}" method="POST" class="d-flex flex-column justify-content-around align-items-center text-black create_container mt-4 text-white" enctype="multipart/form-data">
            @csrf

            <h1>Create new Project</h1>

            <div class="form-field d-flex flex-column align-items-center">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="@error('title') is-invalid @enderror">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-field d-flex flex-column align-items-center mb-4">
                <label for="description">Description</label>
                <textarea id="description" name="description"></textarea>
            </div>

            <div class="mb-3">
                <div class="preview">
                    <img id="uploadPreview" width="100" src="" alt="">
                </div>
                <label for="project_image">Project Img</label>
                <input type="file" name="project_image" id="project_image" class="@error('project_image') is-invalid @enderror" >
                @error('project_image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-field">
                <label for="category_id">Select category:</label>
                <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
                    <option value="">Select category</option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
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
                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                    @empty
                        <option value="">No tag</option>
                    @endforelse
                </select>
              </div>

            <input type="submit" value="CREATE" class="btn btn-primary mt-3">
        </form>
    </section>
@endsection

