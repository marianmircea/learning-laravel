<!--
    Prin intermediul acestui fisier, este accesata portiunea dinamica din 'body'
    (vezi fisierul 'layouts.blade.php').
-->

@extends('layouts') <!-- Prin asta, ii spunem acestui fisier blade ca il extindem pe 'layouts' - fisierul 'blade' principal. -->
@section('content') <!-- Contine tot ce este dinamic in fisierul 'blade' principal. -->
    <!-- Aici punem tot ce dorim: -->
    <h1 id="blog-page-title">Bine ai venit pe pagina Blogs!</h1>
    <div class="blog-wrapper">
        @foreach ($blogs as $blog)
            <div class="blog-card">
                <img src="{{asset('images/'.$blog->image)}}" alt="">
                <div class="blog-content">
                    <div class="title">{{$blog->title}}</div>
                    <div class="description">{{$blog->description}}</div>
                    <div class="date">{{$blog->created_at}}</div>
                </div>
                <div class="button-wrapper">
                    <!-- Redirect spre pagina 'blog.show',
                        cum a fost denumit in route,
                        si trimitem ca parametru 'id'-ul inregistrarii din BD.
                    -->
                    <a href="{{route('blog.show', $blog->id)}}"><div class="button">Read more</div></a>
                </div>
                <div class="button-wrapper">
                    <!-- Redirect spre pagina 'blog.edit',
                        cum a fost denumit in route,
                        si trimitem ca parametru 'id'-ul inregistrarii.
                    -->
                    <a href="{{route('blog.edit', $blog->id)}}">
                        <div class="button" style="margin-top: 20px; background-color: #ffc107;">Edit</div>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
