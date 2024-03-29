@extends('layouts.base')
@section('content')

<section class="heading">
    <h1>Товары</h1>
    <p><a href="/">Главная</a> > <a href={{asset('products')}}>Каталог</a> > Товар</p>
</section>
<section class="text-gray-600 body-font overflow-hidden">
    <form action="{{asset('add_cart/'.$product->id)}}">
        <div class="container px-5 pt-1 mx-auto">
            <div class="product-one">
                <div class="w-[400px] m-auto md:flex-1">
                    <img src="/storage/{{$product->picture}}" alt="ecommerce">
                </div>
                <div class="content md:flex-1">
                    <h1>{{$product->name}}</h1>
                    <p>{!!$product->body!!}</p>
                    <div class="flex mt-6 items-center pb-5 border-b-2 border-gray-100 mb-5">
                        <div class="flex ml-6 items-center">
                            <span class="mr-3">Размер</span>
                            <div class="relative">
                                <select name="size" class="rounded border appearance-none border-gray-300 py-2 focus:outline-none focus:ring-2 focus:ring-green-200 focus:border-green-500 text-base pl-3 pr-10">
                                    @foreach($sizes as $one)
                                    <option value="{{$one}}">{{$one}}</option>
                                    @endforeach
                                </select>
                                <span class="absolute right-0 top-0 h-full w-10 text-center text-gray-600 pointer-events-none flex items-center justify-center">
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4" viewBox="0 0 24 24">
                                        <path d="M6 9l6 6 6-6"></path>
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-center items-center">
                        <span class="title-font font-medium text-3xl text-green-600">{{$product->discount}} <span> BYN</span> </span> <span class="title-font font-medium text-xl ml-8">{{$product->price}} <span> BYN</span> </span>
                        <button type="submit" class="flex ml-auto text-white font-medium bg-green-500 border-0 m-5 py-4 px-12 focus:outline-none hover:bg-green-600 rounded">В корзину</button>
                        @if ($favorite) <a href="{{asset('product/' .$favorite->product->id.'/remove_from_favorites')}}" class="rounded-full w-10 h-10 bg-gray-200 p-0 border-0 inline-flex items-center justify-center text-red-500 ml-4">
                            <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                <path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"></path>
                            </svg></a>
                        @else
                        <a href="{{asset('product/' .$product->id.'/add_to_favorites')}}" class="rounded-full w-10 h-10 bg-gray-200 p-0 border-0 inline-flex items-center justify-center text-gray-500 ml-4">
                            <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                <path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"></path>
                            </svg></a>
                        @endif
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </form>
    @csrf
</section>
@if($errors->any())
@foreach($errors->all() as $error)
<div class="fixed top-0 right-0 bg-green-500 text-white p-2 mt-4 mr-4 rounded z-20" x-show="showHardware" x-data="{showHardware : true}">
    <div @click="showHardware = false">
        {{$error}}
    </div>
</div>
@endforeach
@endif
@endsection