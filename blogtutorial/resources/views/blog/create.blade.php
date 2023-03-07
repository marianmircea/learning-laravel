@extends('layouts')
@section('content')
    <div id="form-wrapper">
        <!-- La 'action': este chemat route-ul cu numele 'blog.store',
            pentru a fi executat, in momentul apasarii lui 'Submit'.
        -->
        <form action="{{route('blog.store')}}" method="POST" enctype="multipart/form-data">
            @csrf <!-- input hidden, oferit de Laravel; cu protectie pentru atacuri; e ceva default, care trebuie adaugat, pentru a merge form-ul. -->
            <div>
                <input type="text" id="title" name="title" placeholder="blog title">
            </div>
            <div>
                <input type="description" id="description" name="description" placeholder="blog description">
            </div>
            <div>
                <textarea name="blogBody" id="content" cols="30" rows="10" placeholder="Type something"></textarea>
            </div>
            <div>
                <input type="file" id="file" name="image">
            </div>
            <button class="button" type="submit" id="button-form">Submit</button>
            <!-- La actionarea butonului 'Submit', form-ul acceseaza route-ul descris in 'action'. -->
        </form>
    </div>
@endsection
