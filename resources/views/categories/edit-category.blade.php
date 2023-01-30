@extends('layout')


@section('main')
        <main class="container" style="background-color:white;">
        <section id="contact us">
            <h1 style="padding-top:50px;">Edit  Category</h1>
            @include('includes.flash-message')

            <!-- contact form -->
            <div class="contacr form">
                <form action ="{{route('categories.update',$category)}}" method="Post"  enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <lable for="name"><span>Name</span></lable>
                    <input type="text" id="name" name="name" value="{{$category->name}}"/>
                    @error('name')
                    <p style="color:red;margin-bottom:25px;">{{$message}}
                    @enderror

                   
                    
                  
                    <input type="submit" value="submit" >
                </form>
            </div>
            <div class= "create-categorie">
                <a href="{{route('categories.index')}}">Categories list<span>&#8594;</span></a>
            </div>
            </section>
        </main>

@endsection