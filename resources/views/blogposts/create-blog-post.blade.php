@extends('layout')


@section('main')
        <main class="container" style="background-color:white;">
        <section id="contact us">
            <h1 style="padding-top:50px;">Create New post</h1>
            @include('includes.flash-message')

            <!-- contact form -->
            <div class="contacr form">
                <form action ="{{route('blog.store')}}" method="Post"  enctype="multipart/form-data">
                    @csrf
                    <div>
                    <lable for="title"><span>Title</span></lable>
                    <input type="text" id="title" name="title" value="{{old('title')}}"/>
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

                    <div>
                    <lable for="categories"><span>Categories</span></lable>
                    <select name="category_id" id="categories">
                        <option selected disable>Select option</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        <select>
                           
                    @error('category_id')
                    <p style="color:red;margin-bottom:25px;">{{$message}}
                    @enderror
                    </div>

                    
                    <div><lable for="body"><span>Body</span></lable>
                    <textarea id="body" name="body">{{old('body')}}</textarea>
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