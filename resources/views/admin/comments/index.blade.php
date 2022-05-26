@extends('layouts.app')

@section('content')

    <!-- Page Heading -->


<div class="container" style="margin-top: 100px">
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
                        <form method="GET" action="{{ route('comments.index') }}">
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
                            <th scope="col">User Id</th>
                            <th scope="col">Project Post Id</th>
                            <th scope="col">Parent Id</th>
                            <th scope="col">Body</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($commentss as $comment)
                            <tr>
                                <th scope="row">{{ $comment->id }}</th>
                                <td>{{ $comment->user_id }}</td>
                                <td>{{ $comment->project_post_id }}</td>
                                <td>{{ $comment->parent_id }}</td>
                                <td>{{ $comment->body }}</td>
                                {{-- <td>
                                    <a class="btn btn-success">Edit</a>
                                </td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection