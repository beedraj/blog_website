@extends('layout')


@section('main')
        <main class="container" style="background-color:white;">
        <section id="contact us">
            <h1 style="padding-top:50px;">Edit New post</h1>
            @include('includes.flash-message')

            <!-- contact form -->
            <div class="contacr form">
                <form action ="{{route('blog.update',$post)}}" method="Post"  enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div>
                    <lable for="title"><span>Title</span></lable>
                    <input type="text" id="title" name="title" value="{{$post->title}}"/>
                    @error('title')
                    <p style="color:red;margin-bottom:25px;">{{$message}}
                    @enderror

                    </div>
                    
                    <div>
                    <lable for="image"><span>Image</span></lable>
                    <input type="file" id="image" name="image"/>
                    @error('image')
                    <p style="color:red;margin-bottom:25px;">{{$message}}
                    @enderror

                    </div>
                    <div><lable for="body"><span>Body</span></lable>
                    <textarea id="body" name="body">{{$post->body}}</textarea>
                    @error('body')
                    <p style="color:red;margin-bottom:25px;">{{$message}}
                    @enderror
                    </div>
                    <input type="submit" value="submit">
                </form>
            </div>
            </section>
        </main>

@endsection