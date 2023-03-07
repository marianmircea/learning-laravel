<!--
    Prin intermediul acestui fisier, este accesata portiunea dinamica din 'body'
    (vezi fisierul 'layouts.blade.php').
-->

@extends('layouts') <!-- Prin asta, ii spunem la file-ul blade ca extindem pe 'layouts' - fisierul principal, 'blade'. -->
@section('content') <!-- Contine tot ce este dinamic in file-ul 'blade' - fisierul principal. -->
    <!-- Aici punem tot ce dorim sa fie afisat in 'blade'. -->
    <div class="home-wrapper">
        <h1>Bine ai venit pe pagina Home!</h1>
    </div>
@endsection