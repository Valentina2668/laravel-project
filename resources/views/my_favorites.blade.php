@extends('layouts.base')
@section('content')
<section class="products">
    <section class="heading">
        <h1>Favorites</h1>
        <p><a href="/">home</a>>><a href={{asset('products')}}>products</a> >> favorites </p>

    </section>
    <h1 class="title">featured products</h1>
    <div class="box-container">
        @foreach($favorites as $favorite)
        <div class="box">
            {{$favorite->product->name}}
            <div class="image">
                <div class="icons">
                    <a href="#" class="fas fa-shopping-cart"></a>
                    <a href="{{asset('product/' .$favorite->product->id.'/remove_from_favorites')}}" class="fas fa-window-close"></a>
                    <a href="{{asset('product/'.$favorite->product->id)}}" class="fas fa-eye"></a>
                </div>
                <img src="/storage/{{$favorite->product->picture}}" alt="">
            </div>
            <div class="content">
                <h3>{{$favorite->product->status}}</h3>
                <div class="price">{{$favorite->product->price}}<span>{{$favorite->product->discount}}</span></div>
            </div>
        </div>
        @endforeach

    </div>

</section>
@endsection