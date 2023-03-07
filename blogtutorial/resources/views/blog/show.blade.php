@extends('layouts')
@section('content')
    <div class="blog-wrapper">
        <div class="show-container">
            <div class="left-content"><img src="{{asset('images/'.$blog->image)}}" alt=""></div>
            <div class="right-content">
                <h1>{{$blog->title}}</h1>
                <h3>{{$blog->description}}</h3>
                <p>{{$blog->content}}</p>
                <a href="{{route('blog.index')}}"><div class="button">Go to blogs</div></a>
            </div>
        </div>
    </div>
@endsection