@extends('layouts.base')
@section('content')

<section class="products">
    <form class="p-2" action="{{asset('products')}}">
        <div class="grid grid-cols-2">
            <div class="">
                <div x-data="{ price: {{(request()->price_min)? request()->price_min:$min_price}} }" class="w-full">
                    <label for="price" class="font-bold text-gray-700" x-text="`от`  + price">{{$min_price}}</label>
                    <input type="range" min="{{$min_price}}" name="price_min" max="{{$avg_price}}" x-model="price" class="w-full h-2 bg-blue-100 appearance-none" />
                </div>
            </div>
            <div>
                <div x-data="{ price: {{(request()->price_max)? request()->price_max:$max_price}} }" class="w-full">
                    <label for="price" class="font-bold text-gray-700 block text-right" x-text="`до`  + price">{{$max_price}}</label>
                    <input type="range" min="{{$avg_price}}" name="price_max" max="{{$max_price}}" x-model="price" class="w-full h-2 bg-blue-100 appearance-none" />
                </div>
            </div>
        </div>
        <div class="tex-center" text-sm mt-2>
            <button type="submit" class="p-10 bg-#67e8f9 hover:shadow-2xl  hover:rounded-2xl"> Sort by price</button>
        </div>
    </form>

    <!-- <section class=''>
        <input type="range" min="23" name="price_min" max="483" x-model="price">
    </section> -->
    <section class="heading">
        <h1>products</h1>
        <p><a href="/">home</a>>><a href={{asset('products')}}>products</a> >> catalog </p>
    </section>
    <h1 class="title">featured products</h1>
    <div class="box-container">
        @foreach($products as $product)
        <div class="box">
            <h1>
                {{$product->name}}
            </h1>
            <div class="image">
                <div class="icons">
                    <a href="#" class="fas fa-shopping-cart"></a>
                    <a href="{{asset('product/' .$product->id.'/add_to_favorites')}}" class="fas fa-heart"></a>
                    <a href="{{asset('product/'.$product->id)}}" class="fas fa-eye"></a>
                </div>
                <img src="/storage/{{$product->picture}}" alt="">
            </div>
            <div class="content">
                <h3>{{$product->status}}</h3>
                <div class="price">{{$product->price}}<span>{{$product->discount}}</span></div>
            </div>
        </div>
        @endforeach

    </div>

</section>

@endsection