@extends('layouts.base')
@section('content')

<section class="h-100" style="background-color: #eee;">
    <div class="container h-100 py-5">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-10">

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="fw-normal mb-0 text-black">Shopping Cart</h3>
                    <div>
                        <p class="mb-0"><span class="text-muted">Sort by:</span> <a href="#!" class="text-body">price <i class="fas fa-angle-down mt-1"></i></a></p>
                    </div>
                </div>


                <div x-data="{'itogo':{{$itogo}},
            async itogo_func(){}
            }">

                    @foreach ($products as $product)

                    <div class="card rounded-3 mb-4" x-data="{
                        async change_count_{{$product->id}}(){
                            this.summa{{$product->id}} = {{($product->discount != '') ? (float) $product->discount:(float)$product->price}} * this.count{{$product->id}}
                            console.log(this.summa{{$product->id}})
                    },
                    'summa{{$product->id}}':
                    '{{($product->discount != '') ? (float) $product->discount:(float)$product->price}}',
                        <!-- {{(float)$product->price}}, -->
                    'count{{$product->id}}':1

                }">



                        <div class="card-body p-4">
                            <div class="row d-flex justify-content-between align-items-center">
                                <div class="col-md-2 col-lg-2 col-xl-2">
                                    <img src="/storage/{{$product->picture}}" class="img-fluid rounded-3" alt="Cotton T-shirt">
                                </div>
                                <div class="col-md-3 col-lg-3 col-xl-3">
                                    <p class="lead fw-normal mb-2">{{$product->name}}</p>
                                    <p><span class="text-muted">Size: </span>{{$product->size_id}} <span class="text-muted">Color: </span>Grey</p>
                                </div>
                                <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                    <button class="btn btn-link px-2" onclick="this.parentNode.querySelector('input[type=number]').stepDown();
                                    let sums = document.getElementById('product{{$product->id}}');
                                    sums.dispatchEvent(new Event('input'));
                                    // change_count{{$product->id}}();

                                    ">
                                        <i class="fas fa-minus"></i>
                                    </button>

                                    <input type="number" min="1" max="1000" id="product{{$product->id}}" @change="change_count_{{$product->id}}(); itogo_func()" x-model="count{{$product->id}}" name="product{{$product->id}} " class="form-control form-control-sm" />

                                    <button class="btn btn-link px-2" onclick="this.parentNode.querySelector('input[type=number]').stepUp();
                                    let sum = document.getElementById('product{{$product->id}}');
                                    sum.dispatchEvent(new Event('input'));
                                    ">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                                <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                    <h5 class="mb-0" x-text="summa{{$product->id}}"></h5>
                                </div>
                                <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                    <a href="{{asset('cart/delete/' .$product->id)}}" class="text-danger"><i class="fas fa-trash fa-lg"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    @endforeach

                    Итого <div x-text="itogo"></div>
                </div>
                <div class="card mb-4">
                    <div class="card-body p-4 d-flex flex-row">
                        <div class="form-outline flex-fill">
                            <input type="text" id="form1" class="form-control form-control-lg" />
                            <label class="form-label" for="form1">Discound code</label>
                        </div>
                        <button type="button" class="btn btn-outline-warning btn-lg ms-3">Apply</button>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <button type="button" class="btn btn-warning btn-block btn-lg">Proceed to Pay</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>


@endsection
@push('styles')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
@endpush
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
@endpush