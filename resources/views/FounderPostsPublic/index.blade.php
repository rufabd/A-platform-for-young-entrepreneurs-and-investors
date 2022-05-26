@extends('layouts.app')
@section('content')


{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> --}}
    <div class="container" style="margin-top: 100px;" >
    <div>
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
            </div>
    <div class="row" style="margin-bottom: 30px;">
                    <div class="col">
                        <form method="GET" action="{{ route('project-post-public') }}">
                            <div class="form-row align-items-center">
                                <div class="col" style="width: 400px;">
                                    <input type="search" name="search" class="form-control mb-2" id="inlineFormInput"
                                        placeholder="Search projects by title">
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-primary mb-2">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    {{-- <div>
                        <a href="{{ route('founder-project-posts-create') }}" class="btn btn-primary mb-2">Create</a>
                    </div> --}}
        </div>

    
    @forelse ($posts as $post)
        <div class="total">
            <div class="columnn">
                <div class="containerr">
                    <div class="left">
                        <div class="profile-img" >
                            <img src="{{asset('/storage/avatars/founders/'.$post->founder_profile->founder_avatar)}}" alt="avatar" style="width: 80px; height:80px;">
                        </div>
                        <div class="username" >
                            <h4>{{ $post->founder_profile->founder_name }}  {{ $post->founder_profile->founder_surname }}</h4>
                        </div>
                        <div class="contact" >
                            <a href="/chatify">Chat</a>
                        </div>
                        <div class="social-left">
                            <div class="instagram">
                                <a href="{{ $post->founder_profile->founder_insta_link }}"><i class='bx bxl-instagram instagram-eff'></i></a>
                            </div>
                            <div class="facebook">
                                <a href="{{ $post->founder_profile->founder_face_link }}"><i class='bx bxl-facebook-circle facebook-eff'></i></a>
                            </div>
                            <div class="linkedin">
                                <a href="{{ $post->founder_profile->founder_linked_link }}"><i class='bx bxl-linkedin-square linkedin-eff'></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="right">
                        <div class="top1">
                            <div class="tag1">
                                <h4> {{ $post->hiring_tag->name }} </h4>
                            </div>
                            <div class="tag2">
                                <h4> {{ $post->industry_tag->name }} </h4>
                            </div>
                            <div class="date">
                                <h4>29/04/2022</h4>
                            </div>
                            <div class="place">
                                <h4>{{ $post->country }}, {{ $post->city }} </h4>
                            </div>
                        </div>
                        <div class="top2">
                            <div class="title-post">
                                <h4><strong>{{ $post->title }}</strong></h4>
                            </div>
                        </div>
                        <div class="mid">
                            <div class="post-description">
                                <p>{{ $post->post_description }}</p>
                            </div>
                        </div>
                        <div class="bottom">
                            <div class="funded">
                                <div class="funded-content">
                                    <h4>Total Funded</h4>
                                    <p>$ {{ $post->investment }}</p>
                                </div>
                            
                            </div>
                            <div class="stage">
                                <div class="stage-content">
                                    <h4>Project Stage</h4>
                                    <p>{{ $post->project_stage }}</p>
                                </div>
                            </div>
                            <div class="else">
                                <a href="{{ route('auth-founder-posts-show', $post->id), }}">Read more about details</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="favorite" style="margin-top: 10px;">
                    @if(Auth::user()->role == "investor")
                        @if(Auth::user()->paid == true)
                            <form method="POST" action="{{ route('add-to-favorite') }}">
                                @csrf
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Add to favorites') }}
                                    </button>
                            </form>
                        @endif
                    @endif
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
    


    {{-- @endforeach --}}
    {{--  --}}
    
    {{-- <a href="{{ $post->country }}" class="btn btn-primary">Read More</a> --}}
</div>

    <div style="text-align: center; ">
        {{ $posts->links() }}
    </div>

<style>

    .columnn {
        float: left;
        width: 50%;
        padding: 0 10px;
        margin-bottom: 30px;
    }

    /* .total {margin: 0 -5px;} */

    /* .total:after {
        content: "";
        display: table;
        clear: both;
    } */

    @media screen and (max-width: 1200px) {
        .columnn {
            width: 100%;
            display: block;
            margin-bottom: 20px;
            /* margin-left: 25%; */
            margin-left: 220px;
        }

        .total:after {
            display: table;
        }
    }

    @media screen and (max-width: 990px) {
        .columnn {
            margin-left: 70px;
        }
    }

    @media screen and (max-width: 770px) {
        .columnn {
            margin-left: -20px;
        }
    }

    .containerr {
        display: flex;
        width: 530px;
        padding: 10px 10px;
        background: white;
        border-radius: 15px;
        box-shadow: 0 5px 10px rgba(0,0,0,0.5);
    }

    .left {
        margin-right: 20px;
        text-align: center;
    }

    .profile-img img {
        border-radius: 50%;
        /* border: 2px solid orange; */
    }

    .username {
        margin-top: 7px;
    }

    .username h4 {
        font-size: 15px;
        text-align: center;
    }
    

    .contact a {
        text-decoration: none;
        border: 1px solid orange;
        color: black;
        font-size: 15px;
        padding: 3px 25px;
        transition: 0.3s all ease;
        border-radius: 10px;
    }

    .contact a:hover {
        color: white;
        background: orange;
    }

    .social-left {
        margin-top: 15px;
    }

    .social-left i {
        font-size: 30px;
        cursor: pointer;
        margin-bottom: 10px;
        transition: 0.5s all ease;
        color: black;
    }

    .social-left i:hover {
        /* font-size: 35px; */
    }

    .instagram-eff:hover {
        color: #fff;
        background: #d6249f;
        background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%,#d6249f 60%,#285AEB 90%);
        border-radius: 30px;
    }
    .facebook-eff:hover {
        color: #3b5998;
    }
    .linkedin-eff:hover {
        color: #0072b1;
    }

    .top1 {
        display: flex;
        margin-bottom: 10px;
    }

    .tag1 {
        margin-right: 12px;
    }

    .top1 .tag1 h4 {
        font-size: 15px;
        background: orangered;
        border-radius: 10px;
        color: white;
        padding: 5px;
    }

    .tag2 {
        margin-right: 12px;
    }

    .top1 .tag2 h4 {
        font-size: 15px;
        background: orangered;
        border-radius: 10px;
        color: white;
        padding: 5px;
    }

    .date {
        margin-right: 12px;
    }

    .date h4 {
        font-size: 15px;
        color: #565656;
        padding-top: 5px;
    }

    .top1 .place h4 {
        font-size: 15px;
        color: #565656;
        padding-top: 5px;
    }

    .top2 .title-post {
        width: 380px;
    }

    .top2 .title-post h4 {
        font-size: 20px;
    }

    .top2 {
        display: flex;
    }

    .mid .post-description p {
        color: grey;
    }

    .mid .post-description {
        /* margin-right: 15px; */
        width: 380px;
    }

    .bottom {
        display: flex;
    }

    .bottom .funded {
        margin-right: 10px;
    }

    .bottom .funded h4 {
        font-size: 15px;
        background: brown;
        color: white;
        border-radius: 5px;
        padding: 3px;
    }
    
    .bottom .stage {
        margin-right: 10px;
    }
    .bottom .stage h4{
        font-size: 15px;
        background: #d6249f;
        color: white;
        border-radius: 5px;
        padding: 3px;
    }

    .bottom .else a {
        text-decoration: none;
        transition: 0.2s all ease;
    }

    .bottom .else a:hover {
        color: orange;
        text-decoration: underline;
    }
</style>

@endsection