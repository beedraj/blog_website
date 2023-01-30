@extends('layout')

@section('main')
    <!-- main -->
    <main class="container">
      <h2 class="header-title">All Blog Posts</h2>
      @include('includes.flash-message')
      <div class="searchbar">
        <form action="">
          <input type="text" placeholder="Search..." name="search" />
          <button type="submit">
            <i class="fa fa-search"></i>
          </button>
        </form>
      </div>
      <div class="categories">
        <ul>
          
          @foreach($categories as $category)
          <li><a href="{{route('blog.index',['category'=>$category->name])}}">{{$category->name}}</a></li>
          @endforeach
        </ul>
      </div>

      <section class="cards-blog latest-blog">
        
        @forelse ($posts as $post)
        <div class="card-blog-content">
        <img src="{{asset($post->imagePath)}}" alt="" />
          @auth
          @if(auth()->user()->id===$post->user->id)

          <div class="post-buttons">
            <a href="{{route('blog.edit',$post)}}">Edit</a>
            
           
            <form action="{{route('blog-delete',$post)}}" method="Post">
              @csrf
              @method('delete')
              <input type="submit" value="Delete">
            </form>
          @endif
          @endauth
          
          <p>
            
            {{$post->created_at->diffForHumans()}}
            <span>Written By {{$post->user->name}}</span>
          </p>
          <h4>
            <a href="{{route('blog.show',$post)}}">{{$post->title}}</a>
          </h4>
        </div>
        @empty
        <p>Sorry, currently there is no blog post related to your search!</p>
        
        @endforelse

        

        
      </section>

      
      
    </main>

    <!-- pagination -->
    <!-- <div class="pagination" id="pagination">
          <a href="">&laquo;</a>
          <a class="active" href="">1</a>
          <a href="">2</a>
          <a href="">3</a>
          <a href="">4</a>
          <a href="">5</a>
          <a href="">&raquo;</a>
        </div>
        <br> -->
        {{$posts->links('pagination::default')}}
        <br>
  @endsection