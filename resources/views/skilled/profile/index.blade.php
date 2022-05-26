@extends('layouts.app')

@section('content')

{{ $exist = "exist" }}
    <div class="containerr" style="margin-top: 100px; margin-botom: 40px;">
            @foreach ($skilled_profiles as $profile)
                @if (Auth::user()->id == $profile->user_id)
                    {{-- <img src="{{ asset('/storage/avatars/founders/'.$profile->founder_avatar) }}" alt="ahh"> --}}
                    {{ $exist = "" }}
                        <div class="whole-form">
            <div class="top">
                <p style="color: white;">{{ Auth::user()->role }}</p>
                <div class="profile-img">
                    <img src="{{ asset('/storage/avatars/skilled/'.$profile->skilled_avatar )}}" alt="avatar" style="width: 150px; height:150px; border-radius: 50%;display:inline-block; cursor: none; margin-top: 10px; border: 2px solid orange;">
                    <div class="overlay-icon">
                        {{-- <a href="#"><i class='bx bxs-camera' style="text-align: center; margin-top: 150px; margin-left: 70px; font-size: 40px; color: orange;"></i></a> --}}
                    </div>
                </div>
                <div class="data-container">
                    <div class="account-info">
                        <h2 class="general-h2">Account Information</h2>
                        <div class="account-details" style="display: flex; position: relative; margin-bottom: 60px;">
                            <div class="name" style="display: block; position: absolute; left: 40px; max-width: 100px;">
                                <h4 class="general-h4">Username:</h4>
                                <p style="font-size: 13px;">{{ Auth::user()->name }}</p>
                            </div>
                            <div class="email" style="display: block; position: absolute; right: 40px; max-width: 200px;">
                                <h4 class="general-h4">Email:</h4>
                            <p style="font-size: 13px;">{{ Auth::user()->email }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="profile-info">
                        <h2 class="general-h2">Profile Information</h2>
                        <div class="profile-details">
                            <div class="profile-heading-info" style="display: flex; position: relative; justify-content:center; margin-bottom: 70px;">
                                <div class="profile-name" style="display: block; position: absolute; left:20px;max-width: 100px;">
                                    <h4 class="general-h4">Name:</h4>
                                    <p>{{ $profile->skilled_name }}</p>
                                </div>
                                <div class="profile-surname" style="display: block; position: absolute; left: 40%; max-width: 120px;">
                                    <h4 class="general-h4">Surname:</h4>
                                    <p>{{ $profile->skilled_surname }}</p>
                                </div>
                                {{-- <div class="profile-location" style="display: block; position: absolute; right: 20px; max-width: 150px;">
                                    <h4 class="general-h4">Location:</h4>
                                    <p>Baku, Azerbaijan</p>
                                </div> --}}
                            </div>
                            
                            {{-- <div class="profile-second-info" style="display: flex; justify-content:center; position: relative; margin-bottom: 80px;">
                                <div class="profile-organization" style="display:block; position: absolute; left:40px; max-widht: 150px;">
                                    <h4 class="general-h4">Organization:</h4>
                                    <p>{{ $profile->founder_organization }}</p>
                                </div>
                                <div class="profile-position" style="display:block; position: absolute; right: 40px; max-width: 150px;">
                                    <h4 class="general-h4">Position:</h4>
                                    <p>{{ $profile->founder_position }}</p>
                                </div>
                            </div> --}}

                            <div class="telephone-info" style="display:block; position: relative; margin-bottom: 10px;">
                                <div class="telephone" style="display: flex; position: absolute; left: 40px;">
                                    <h4 class="general-h4"; style="margin-right: 30px;">Telephone number:</h4>
                                    <p>{{ $profile->skilled_telephone }}</p>
                                </div>
                                <div class="btnnnn" style="padding-top: 50px; padding-bottom: 20px;">
                                    <a style="text-decoration:none;  border: 1px solid orange; padding: 5px 8px; transition: 0.3s;" href="#">View More and Update Your Information</a>
                                </div>
                            </div>

                            {{-- <div class="btnn">
                                <a href="#">View more and edit information</a>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
                    @break
                @endif
            @endforeach
    </div>

    <style>

        .containerr {
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            /* margin-bottom: 50px; */
        }

        .whole-form {
            display: block;
            width: 500px;
            max-height: 1000px;
            box-shadow: 0 5px 10px rgba(0,0,0,0.5);
            /* border: 1px black solid; */
        }

        .top {
            width: 500px;
            height: 250px;
            background: #3a3b3c;
            /* border-radius: 10px; */
        }

        

        .bottom {
            width: 500px;
            /* position: absolute; */
            background: white;
            height: 700px;
            border-radius: 10px;
        }

        .profile-img{
            position: relative;
        }

        .overlay-icon {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            opacity: 0;
            transition: 0.3s ease;
            
        }

        .profile-img:hover .overlay-icon {
            opacity: 1;
        }

        .data-container {
            /* position: relative; */
            width: 440px;
            background: white;
            color: black;
            border-radius: 10px;
            margin: auto;
            margin-top: 30px;
            max-height: 600px;
            border-radius: 10px;
            box-shadow: 0 5px 10px rgba(0,0,0,0.5);
            
        }

        .account-info {
            padding-top: 10px;
        }

        .account-details {
            display: flex;
            /* justify-content: center;
            text-align: center;
            align-items: center; */
        }

        .general-h4 {
            font-size: 15px;
            font-style: italic;
            color: grey;
        }

        .general-h2 {
            font-size: 22px;
            font-weight: 600;
        }

        .profile-info {
            padding-top: 10px;
        }

        .profile-details {
            display: block;
            /* justify-content: center;
            text-align: center;
            align-items: center; */
        }

        .data h2{
            background: #ccc;
        }

        .btnnnn a {
            color: black;
        }

        .btnnnn a:hover {
            background: orange;
            color: whitesmoke;
            border-radius: 20px;
        }

        @media screen and (max-width: 525px) {
            .top {
                width: 440px;
            }
            .whole-form {
                width: 440px;
            }
        }
    </style>
@endsection