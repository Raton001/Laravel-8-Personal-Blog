@extends('layouts.master')

@section('content')

        <!-- Page Header-->
        <header class="masthead" style="background-image: url('{{asset('/assets/dist/assets/img/home-bg.jpg')}}')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="site-heading">
                            <h1>My Blog</h1>
                            <span class="subheading">My Personl Blog y Laravel </span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main Content-->
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <!-- Post preview-->
                    @foreach ($posts as $post )
                        
                   
                    <div class="post-preview">
                        <a href="{{route('singlePost',$post->id)}}">
                            <h2 class="post-title">{{$post->title}}</h2>
                        </a>
                        <p class="post-meta">
                            Posted by
                            <a href=#>{{$post->user->name}}</a>
                            on {{date_format($post->created_at, 'F d, Y')}} |
                           <i class="fa fa-comment" aria-hidden="true"></i>{{$post->comments->count()}}
                        </p>
                    </div>
                    <!-- Divider-->
                    <hr class="my-4" />
                  @endforeach
                 
                    {{-- <!-- Post preview-->
                    <div class="post-preview">
                        <a href="post.html"><h2 class="post-title">I believe every human has a finite number of heartbeats. I don't intend to waste any of mine.</h2></a>
                        <p class="post-meta">
                            Posted by
                            <a href="#!">Start Bootstrap</a>
                            on September 18, 2021
                        </p>
                    </div>
                    <!-- Divider-->
                    <hr class="my-4" />
                    <!-- Post preview-->
                    <div class="post-preview">
                        <a href="post.html">
                            <h2 class="post-title">Science has not yet mastered prophecy</h2>
                            <h3 class="post-subtitle">We predict too much for the next year and yet far too little for the next ten.</h3>
                        </a>
                        <p class="post-meta">
                            Posted by
                            <a href="#!">Start Bootstrap</a>
                            on August 24, 2021
                        </p>
                    </div>
                    <!-- Divider-->
                    <hr class="my-4" />
                    <!-- Post preview-->
                    <div class="post-preview">
                        <a href="post.html">
                            <h2 class="post-title">Failure is not an option</h2>
                            <h3 class="post-subtitle">Many say exploration is part of our destiny, but it’s actually our duty to future generations.</h3>
                        </a>
                        <p class="post-meta">
                            Posted by
                            <a href="#!">Start Bootstrap</a>
                            on July 8, 2021
                        </p>
                    </div> --}}
                    <!-- Divider-->
                    {{-- <hr class="my-4" /> --}}
                    <!-- Pager-->
                    {{$posts->links()}}
                </div>
            </div>
        </div>
@endsection