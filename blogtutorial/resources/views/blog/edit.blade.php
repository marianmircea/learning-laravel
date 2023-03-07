@extends('layouts')
@section('content')
    <div id="form-wrapper">
        <!-- la 'action': se acceseaza route-ul 'blog.update',
            trimitem ca parametru id-ul blogului la care facem
            pentru a fi executat, in momentul apasarii lui 'Submit'.
        -->
        <form action="{{route('blog.update', $blog->id)}}" method="POST" enctype="multipart/form-data">
            <!-- In form, se poate specifica doar una din metodele 'GET' si 'POST. -->
            @method('PATCH') <!-- helper function oferit de Laravel, care permite alegerea altei metode (decat GET sau POST). -->
            @csrf <!-- input hidden, oferit de Laravel; cu protectie pentru atacuri; e ceva default, care trebuie adaugat, pentru a merge form-ul. -->
            <div>
                <input type="text" id="title" name="title" placeholder="blog title" value="{{$blog->title}}">
            </div>
            <div>
                <input type="description" id="description" name="description" placeholder="blog description" value="{{$blog->description}}">
            </div>
            <div>
                <textarea name="blogBody" id="content" cols="30" rows="10" placeholder="Type something">{{$blog->content}}</textarea>
            </div>
            <div>
                <input type="file" id="file" name="image">
            </div>
            <button class="button" type="submit" id="button-form">Submit</button>
            <!-- La actionarea butonului 'Submit', form-ul acceseaza route-ul descris in 'action';  -->
        </form>
    </div>
@endsection
