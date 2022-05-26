@extends('layouts.app')

@section('content')

<div class="container" style="margin-top: 100px;">
    Favorites
    @if (Auth::user()->favorite->count() )
        @foreach ($favorites as $favorite)
        {{$favorite->project->title}}
        @endforeach
    @endif
</div>

@endsection