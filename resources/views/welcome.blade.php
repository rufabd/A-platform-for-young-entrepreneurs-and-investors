<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>eXStartup</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
        
    </head>

    @extends('layouts.app')
    @section('content')
        <body style="background-color: white">
        {{-- <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        </div> --}}
            <div class="container-fluid col-10" style="padding: 0 80px;">
                <section id="home">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12 order-1 pt-5" style="margin-top: 100px">
                            <h1 class="display-4">Welcome To<br><span>Our Platform</span></h1>
                            <p class="my-lg-2 my-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo nihil non ipsum sint ea architecto delectus ratione eligendi asperiores officiis odio, voluptatem         laboriosam eum aut!</p>
                            {{-- <button class="btn btn-primary my-lg-3 my-3">Get Started</button> --}}
                            <a class="btn btn-primary my-lg-3 my-3" href="{{ url('/login') }}">Get Started</a>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 py-lg-0 py-3 order-sm-2" style="margin-top: 40px;">
                            <img src="/images/business.jpg" alt="image" class="img-fluid">
                        </div>
                    </div>
                </section>
            </div>
        </body>
    @endsection

    
    
        

        <style>
            @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

            /* Landing Part Design */

            html{
                scroll-behavior: smooth;
            }

            body {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                width: 100%;
                font-family: 'poppins', sans-serif;
            }

            section {
                min-height: 75vh;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            span {
                color: orange;
                font-weight: bold;
            }

            p {
                font-size: 18px;
            }

            

        </style>
</html>
