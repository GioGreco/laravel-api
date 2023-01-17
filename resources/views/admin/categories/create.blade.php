@extends('layouts.admin')

@section('content')

    <section id="createForm" class="d-flex justify-content-center align-items-center">
        <form action="{{ route('admin.categories.store') }}" method="POST" class="d-flex flex-column justify-content-around align-items-center text-black create_container mt-4" enctype="multipart/form-data">
            @csrf

            <h1>Create new Category</h1>

            <div class="form-field d-flex flex-column align-items-center">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="@error('name') is-invalid @enderror">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <input type="submit" value="CREATE" class="btn btn-primary mt-3">
        </form>
    </section>
@endsection
