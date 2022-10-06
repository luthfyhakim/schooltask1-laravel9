@extends('layouts.main2')
@section('container')
    <div class="text-center">
        <h1>Halaman Profil</h1>
    </div>

    <article class="mb-5">
        <h2>{{ $name }}</h2>
        <h5>{{ $email }}</h5>
        <img class="rounded-circle mt-2" src="https://avatars.githubusercontent.com/u/86990795?s=400&u=d85f2f19b0323f0c63612276e980badba7d2c28c&v=4" alt="myphoto">
    </article>
@endsection
