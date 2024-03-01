@extends('layouts.base')
@section('content')

<section class="heading">
    <h1>Блог</h1>
    <p><a href="/"> Главная</a> > Блог </p>
</section>
<section>
    <div class="blogs">
        @foreach($blogs as $blog)
        <div class="box">
            <div class="image">
                <img src="{{asset('/storage/'.$blog->picture)}}" alt="">
            </div>
            <div class="content">
                <h3>{{$blog->name}}</h3>
                <p class="normal-case">{!!$blog->description!!}</p>
                <a href="{{asset('blog/'.$blog->id)}}" class="btn btn mt-4 text-2xl border-2 border-gray-400 hover:border-green-400">Подробней</a>
                <div class="icons">
                    <a href="#"><i class="fas fa-clock"></i>Date {{optional ($blog->created_at)->diffForHumans()}}</a>
                    <a href="#"><i class="fas fa-user"></i>By {{$blog->user->name}}</a>
                </div>
            </div>
        </div>
        @endforeach

    </div>
    <div align="center">
        {!!$blogs->links()!!}
    </div>
</section>
@endsection