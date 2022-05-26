@extends('layouts.app')
@section('content')

<div class="container" style="margin-top: 100px;">
    <div>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div>
    

    <div class="total" style="margin-top: 20px;">
        <div class="row">
        <div class="col">
            <form method="GET" action="{{ route('skilled-post-public') }}">
                <div class="form-row align-items-center">
                    <div class="col" style="width: 400px;">
                        <input type="search" name="search" class="form-control mb-2" id="inlineFormInput"
                        placeholder="Search posts of skilled people by title">
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-primary mb-2">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @forelse ($posts as $post)
        
            <div class="columnn">
                <div class="all">
                    <div class="all-top">
                        <div class="left">
                            <div class="profile-img" >
                                <img src="/images/default.jpg" alt="avatar" style="width: 80px; height:80px;">
                            </div>
                            <div class="post-owner">
                                <p>{{ $post->skilled_profile->user->name }}</p>
                                {{-- <p>{{ $post->skilled_profile->skilled_name }} {{ $post->skilled_profile->skilled_surname }}</p> --}}
                            </div>
                            <div class="social-icons">
                                <div class="linkedin-link">
                                    <i class='bx bxl-linkedin' ></i>
                                </div>
                                <div class="instagram-link">
                                    <i class='bx bxl-instagram' ></i>
                                </div>
                                <div class="facebook-link">
                                    <i class='bx bxl-facebook' ></i>
                                </div>
                            </div>
                        </div>
                        <div class="right">
                            <div class="right-top">
                                <div class="hiring-tag">
                                    <p class="tagss">{{ $post->hiring_tag->name }}</p>
                                </div>
                                <div class="industry-tag">
                                    <p class="tagss">{{ $post->industry_tag->name }}</p>
                                </div>
                                <div class="location">
                                    <p>Baku, Azerbaijan</p>
                                </div>
                            </div>
                            <div class="right-mid">
                                <div class="title">
                                    <h4>{{ $post->title }}</h4>
                                </div>
                            </div>
                            <div class="right-bottom">
                                <div class="description">
                                    <p>{{ $post->post_desciption }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="all-bottom">
                        <div class="chat-btn">
                            <a href="/chatify">Chat with {{ $post->skilled_profile->user->name }}</a>
                        </div>
                        <div class="read-btn">
                            <a href="#">Read more about {{ $post->skilled_profile->user->name }}</a>
                        </div>
                        <div class="date">
                            <p>{{ $post->created_at }}</p>
                        </div>
                    </div>
                </div>
            </div>
        

    @empty
        <div class="container">
            <div class="justify-content-center">
                <h1 style="text-align: center;">
                    No posts yet
                </h1>
            </div>
        </div>

    @endforelse
</div>
</div>


<style>
    /* * {
        box-sizing: border-box;
    } */

    .columnn {
        float: left;
        width: 50%;
        margin-bottom: 30px;
    }

    /* .total {margin: 0 -5px;} */

    /* .total::after{
        content: "";
        display: table;
        clear: both;
    } */

    

    .all {
        display: block;
        width: 580px;
        max-height: 400px;
        background-color:white;
        border-radius: 10px;
        padding: 10px 20px;
        box-shadow: 0 5px 10px rgba(0,0,0,0.5);
    }

    .all .all-top {
        display: flex;
        margin-bottom: 20px;
    }

    .all-top .left {
        display: block;
        margin-right: 20px;
        text-align: center;
    }

    .all-top .left i {
        font-size: 25px;
    }

    .all-top .right {
        display: block;
    }

    .all-top .right .right-top {
        display: flex;
    }

    .all .all-bottom {
        display: flex;
    }

    .profile-img {
        margin-bottom: 10px;
    }

    .profile-img img {
        border-radius: 50%;
        /* border: 1px orange solid; */
    }

    .linkedin-link {
        margin-top: 5px;
    }

    .instagram-link {
        margin-top: 5px;
    }

    .facebook-link {
        margin-top: 5px;
    }

    .social-icons i {
        cursor: pointer;
        transition: 0.5s ease all;
    }

    .instagram-link i:hover {
        color: #fff;
        padding: 0px 2px;
        background: #d6249f;
        background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%,#d6249f 60%,#285AEB 90%);
        border-top-left-radius: 10px;
        border-bottom-right-radius: 10px;
    }

    .linkedin-link i:hover {
        color: #fff;
        padding: 0px 2px;
        background: #0072b1;
        background: radial-gradient(circle at 30% 107%, #0072b1 0%, #0072b1 5%, #0072b1 45%,#0072b1 60%,#285AEB 90%);
        border-top-left-radius: 10px;
        border-bottom-right-radius: 10px;
    }

    .facebook-link i:hover {
        color: #fff;
        padding: 0px 2px;
        background: #3b5998;
        background: radial-gradient(circle at 30% 107%, #3b5998 0%, #3b5998 5%, #3b5998 45%,#3b5998 60%,#3b5998 90%);
        border-top-left-radius: 10px;
        border-bottom-right-radius: 10px;
    }

    .right-top .hiring-tag {
        margin-right: 10px;
    }

    .tagss {
        background: orangered;
        padding: 0 5px;
        border-radius: 10px;
        font-weight: 500;
        color:white;
        /* cursor: pointer; */
    }

    .right-top .industry-tag {
        margin-right: 10px;
    }

    .all-bottom {
        justify-content: center;
    }

    .chat-btn {
        margin-right: 10px;
    }

    .all-bottom a {
        text-decoration: none;
        color: black;
        padding: 5px 5px;
        border: 1px solid orange;
        transition: 0.3s ease all;
        font-size: 15px;
        border-radius: 5px;
    }

    .all-bottom a:hover {
        color: white;
        background: orange;
    }

    .read-btn {
        margin-right: 10px;
    }

    .date p {
        color: #9e9e9e;
    }

    @media screen and (max-width: 1400px) {
        .all {
            width: 550px;
        }
    }

    @media screen and (max-width: 1200px) {
        .columnn {
            width: 100%;
            display: block;
            margin-bottom: 20px;
            margin-left: 200px;
        }

        .total:after {
            display: table;
        }
        .all {
            width: 580px;
        }
    }

    @media screen and (max-width: 991px) {
        .columnn {
            margin-left: 0px;
        }
    }

    @media screen and (max-width: 767px) {
        .all {
            width: 500px;
        }

        .all-bottom a {
            font-size: 13px;
        }

        .date p {
            font-size: 13px;
        }
    }

    @media screen and (max-width: 530px) {
        .all {
            width: 450px;
        }

        .all-bottom a {
            font-size: 12px;
        }

        .date p {
            font-size: 13px;
        }
    }

</style>

@endsection