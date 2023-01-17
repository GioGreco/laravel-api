@extends('layouts.clear')

@section('content')
<div class="welcome-admin position-absolute">
    <div class="d-flex justify-content-center">
        <div class="col-md-8">
            <div class="d-flex flex-column justify-content-center align-items-center p-4">
                <div class="welcome-admin-name">Welcome to The Matrix : <span class="text-danger">{{ Auth::user()->name }}</span></div>

                <div class="">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<div id="dashboard-sections" class="d-flex">
    <a class="left d-flex justify-content-center align-items-center" href="{{ route('admin.projects.index') }}">
        <div class="home-gift-list d-flex justify-content-center align-items-center">
            <div class="unset-div d-flex justify-content-center align-items-center">
                <img src="{{Vite::asset('resources/img/new_project_single_line.png')}}" alt="new project pic">
            </div>
            <div class="unset-div-2 d-flex flex-column justify-content-end align-items-center p-5">
                <h4>Tutti i progetti</h4>
            </div>
        </div>
    </a>
    <a class="right d-flex justify-content-center align-items-center" href="{{ route('admin.projects.create') }}">
        <div class="home-new-gift d-flex justify-content-center align-items-center">
            <div class="unset-div d-flex justify-content-center align-items-center">
                <img src="{{Vite::asset('resources/img/new_project_single_line.png')}}" alt="new project pic">
            </div>
            <div class="unset-div-2 d-flex flex-column justify-content-end align-items-center p-5">
                <h4>Aggiungi un nuovo progetto</h4>
            </div>
        </div>
    </a>
</div>
@endsection
