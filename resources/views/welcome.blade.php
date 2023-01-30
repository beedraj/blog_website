@extends('layout')

@section('header')
      <!-- header -->
      <header class="header"style=" background-image: url({{("images/slider-32.jpg")}});">
        <div class="header-text">
          <h2>Ramagrama Relic Stupa ( Buddha )</h2>
          <h4>Lumbini, the birthplace of Lord Buddha</h4>
        </div>
        <div class="overlay"></div>
      </header>
      @endsection

      @section('main')

      <!-- main -->
      <main class="container">
        <h2 class="header-title">Latest Blog Posts</h2>
        <section class="cards-blog latest-blog">
        @foreach ($posts as $post)
        <div class="card-blog-content">
          <img src="{{asset($post->imagePath)}}" alt="" />
          <p>
            
            {{$post->created_at->diffForHumans()}}
            <span>Written By {{$post->user->name}}</span>
          </p>
          <h4>
            <a href="{{route('blog.show',$post)}}">{{$post->title}}</a>
          </h4>
        </div>
        @endforeach

        </section>
      </main>
      @endsection

      
