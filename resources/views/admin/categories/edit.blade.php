@extends('layouts.admin')

@section('content')
    <section id="EditForm" class="d-flex justify-content-center align-items-center">
        <form action="{{ route('admin.categories.update', $category->slug) }}" method="POST" class="d-flex flex-column justify-content-around align-items-center text-black create_container mt-4" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <h1>Edit Category : {{$category->name}}</h1>

            <div class="form-field d-flex flex-column align-items-center">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="@error('name') is-invalid @enderror" value="{{old('name', $category->name)}}">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <input type="submit" value="EDIT" class="btn btn-primary mt-3">
            <input type="reset" value="RESET" class="btn btn-warning mt-3">

        </form>
    </section>
@endsection
