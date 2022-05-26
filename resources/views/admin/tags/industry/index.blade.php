@extends('layouts.app')

@section('content')

    <!-- Page Heading -->

<div class="container" style="margin-top: 100px">
    <div class="d-sm-flex align-items-center justify-content-center" style="margin-bottom: 40px">
        <h1 class="h2 mb-0">Project Industry Tags</h1>
    </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Create New Project Industry Tag
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin-tags-projectindustry-store') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Tag Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0" style="margin-top: 10px">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Create Tag') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="container" style="margin-top: 70px">
    <div class="row">
        <div class="card  mx-auto" style="width: 53rem">
            <div>
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
            </div>


            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <form method="GET" action="{{ route('admin-tags-projectindustry') }}">
                            <div class="form-row align-items-center">
                                <div class="col">
                                    <input type="search" name="search" class="form-control mb-2" id="inlineFormInput"
                                        placeholder="Jane Doe">
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-primary mb-2">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div>
                        {{-- <a href="{{ route('countries.create') }}" class="btn btn-primary mb-2">Create</a> --}}
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#Id</th>
                            <th scope="col">Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pindustrytags as $pindustrytag)
                            <tr>
                                <th scope="row">{{ $pindustrytag->id }}</th>
                                <td>{{ $pindustrytag->name }}</td>
                                <td>
                                    <a class="btn btn-success">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection