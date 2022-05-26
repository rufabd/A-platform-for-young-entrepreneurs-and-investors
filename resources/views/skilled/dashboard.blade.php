{{-- @extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 100px;">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @forelse ($skilled_profiles as $profile)
                    @if (Auth::user()->id != $profile->user_id)
                        <div style="font-size: 20px; align-items:center; text-align: center; justify-content:center; margin-top: 100px;">Welcome to your Dashboard. For having access to all the rights as Skilled Person, you need to create your profile information from <a href="{{ route('create-profile-skilled') }}">here</a></div>
                    @endif
                    @empty
                        <div style="font-size: 20px; align-items:center; text-align: center; justify-content:center; margin-top: 100px;">Welcome to your Dashboard. For having access to all the rights as Skilled Person, you need to create your profile information from <a href="{{ route('create-profile-skilled') }}">here</a></div>
            @endforelse
        </div>
    </div>
</div>
@endsection --}}

@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 70px">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            {{ $exist = "" }}
            @foreach ($skilled_profiles as $profile)
                    {{-- @if (Auth::user()->id != $profile->user_id)
                    No profile
                    @continue
                    @endif --}}
                    @if (Auth::user()->id == $profile->user_id)
                    {{ $exist = "Welcome User" }}
                    @break
                    @endif
            @endforeach
            
            @if ($exist == "")
                {{ $exist = "No profile found" }}
                <div style="font-size: 20px; align-items:center; text-align: center; justify-content:center; margin-top: 100px;">Welcome to your Dashboard. For having access to all the rights as Skilled Person, you need to create your profile information from <a href="{{ route('create-profile-skilled') }}">here</a></div>
            @endif
            
        </div>
    </div>
</div>
@endsection