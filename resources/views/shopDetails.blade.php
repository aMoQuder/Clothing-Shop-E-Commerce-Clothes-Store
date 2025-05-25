@extends('layouts.app')
@section('content')
    <div class="container-fluid p-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 mb-30">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner bg-light">
                        <div class="carousel-item active">
                            <img class="w-100 h-100" src="{{ asset('/product/image/' . $product->image) }}" alt="Image">
                        </div>
                        <div class="carousel-item">
                            <img class="w-100 h-100" src="{{ asset('/product/image/' . $product->image) }}" alt="Image">
                        </div>
                        <div class="carousel-item">
                            <img class="w-100 h-100" src="{{ asset('/product/image/' . $product->image) }}" alt="Image">
                        </div>
                        <div class="carousel-item">
                            <img class="w-100 h-100" src="{{ asset('/product/image/' . $product->image) }}" alt="Image">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                        <i class="fa fa-2x fa-angle-left text-dark"></i>
                    </a>
                    <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                        <i class="fa fa-2x fa-angle-right text-dark"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-7 h-auto mb-30">
                <div class="h-100 bg-light p-30">

                        <h3>{{ $product->name }}</h3>
                        <div class="d-flex mb-3">
                            <div class="text-primary  mr-2">
                                <small class="fas fa-star"></small>
                                <small class="fas fa-star"></small>
                                <small class="fas fa-star"></small>
                                <small class="fas fa-star-half-alt"></small>
                                <small class="far fa-star"></small>
                            </div>
                            <small class="pt-1">(99 Reviews)</small>
                        </div>
                        <h3 class="font-weight-semi-bold mb-4">${{ $product->price }}</h3>
                        <p class="mb-4">{{ $product->description }}</p>
                        <form action="{{route('cart.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <!-- Hidden field for cart_id -->
                            <input type="hidden" name="price" value="{{ $product->price }}">
                            <!-- Hidden field for cart_id -->
                            <input type="hidden" name="cart_id" value="{{ session('cart_id') }}">

                            <!-- Hidden field for product image -->
                            <input type="hidden" name="image" value="{{ $product->image }}">

                            <!-- Hidden field for product_id -->
                            <input type="hidden" name="name" value="{{ $product->name }}">
                            <!-- Hidden field for product_id -->
                            <input type="hidden" name="id" value="{{ $product->id }}">

                            <div class="d-flex mb-3">
                                <strong class="text-dark mr-3">Sizes:</strong>
                                @foreach ($size as $sizees)
                                    @foreach ($product->size_id as $siz_id)
                                        @if ($sizees->id == $siz_id)
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" class="custom-control-input"
                                                    id="size-{{ $count }}" name="size"
                                                    value="{{ $sizees->name }}">
                                                <label class="custom-control-label"
                                                    for="size-{{ $count }}">{{ $sizees->name }}</label>
                                            </div>
                                        @endif
                                        <input type="hidden" value="{{ $count++ }}">
                                    @endforeach
                                @endforeach
                            </div>

                            <div class="d-flex mb-4">
                                <strong class="text-dark mr-3">Colors:</strong>
                                @foreach ($color as $colores)
                                    @foreach ($product->color_id as $col_id)
                                        @if ($colores->id == $col_id)
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" class="custom-control-input"
                                                    id="color-{{ $count }}" name="color"
                                                    value="{{ $colores->name }}">
                                                <label class="custom-control-label"
                                                    for="color-{{ $count }}">{{ $colores->name }}</label>
                                            </div>
                                        @endif
                                        <input type="hidden" value="{{ $count++ }}">
                                    @endforeach
                                @endforeach
                            </div>

                            <div class="d-flex align-items-center mb-4 pt-2">
                                <div class="input-group quantity mr-3" style="width: 130px;">
                                    <div class="input-group-btn">
                                        <a class="btn btn-primary btn-minus">
                                            <i class="fa fa-minus"></i>
                                        </a>
                                    </div>
                                    <input type="text" class="form-control bg-secondary border-0 text-center"
                                        name="quantity" value="1" min="1">
                                    <div class="input-group-btn">
                                        <a class="btn btn-primary btn-plus">
                                            <i class="fa fa-plus"></i>
                                        </a>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i>
                                Add To Cart</button>
                            </div>
                        </form>
                        <div class="d-flex pt-2">
                            <strong class="text-dark mr-2">Share on:</strong>
                            <div class="d-inline-flex">
                                <a class="text-dark px-2" href="">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a class="text-dark px-2" href="">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a class="text-dark px-2" href="">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                                <a class="text-dark px-2" href="">
                                    <i class="fab fa-pinterest"></i>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    @include('temp.footer')
@endsection
