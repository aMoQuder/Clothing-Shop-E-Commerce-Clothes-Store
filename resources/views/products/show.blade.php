@extends('layouts.dashboardApp')

@section('content')
    @include('temp.navbarDashboard')
    <!--Main container start -->
    <!--Main container start -->
    <main class="ttr-wrapper">
        <div class="container-fluid">
            <div class="db-breadcrumb">
                <h4 class="breadcrumb-title">product</h4>
                <ul class="db-breadcrumb-list">
                    <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
                    <li>product</li>
                </ul>
            </div>
            <div class="row">
                <!-- Your Profile Views Chart -->
                <div class="col-lg-12 m-b30">
                    <div class="widget-box">
                        <div class="wc-title">
                            <h4>Your product</h4>
                        </div>
                        <div class="widget-inner">
                            <div class="card-courses-list admin-courses">
                                <div class="card-courses-media">
                                    <img src="{{ asset('/product/image/' . $product->image) }}" alt="" />
                                </div>
                                <div class="card-courses-full-dec">
                                    <div class="card-courses-title">
                                        <h4>{{ $product->name }}</h4>
                                    </div>
                                    <div class="card-courses-list-bx">
                                        <ul class="card-courses-view">
                                            <li class="card-courses-user">

                                                <div class="card-courses-user-info">
                                                    <h5>Teacher</h5>
                                                    <h4>Keny White</h4>
                                                </div>
                                            </li>
                                            <li class="card-courses-categories">
                                                <h5> Categories</h5>
                                                @foreach ($category as $item)
                                                    @if ($item->id == $product->parent_id)
                                                        <h4>{{ $item->name }}</h4>
                                                    @endif
                                                @endforeach
                                            </li>
                                            <li class="card-courses-review">
                                                <h5>4 Review</h5>
                                                <ul class="cours-star">
                                                    <li class="active"><i class="fa fa-star"></i></li>
                                                    <li class="active"><i class="fa fa-star"></i></li>
                                                    <li class="active"><i class="fa fa-star"></i></li>
                                                    <li class="active"><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                </ul>
                                            </li>

                                            <li class="card-courses-price">
                                                <h5 class="text-primary">{{ $product->price }}</h5>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="row card-courses-dec">

                                        <div class="col-md-12">
                                            <h6 class="mb-1">product Description</h6>
                                            <p>{{$product->description}} </p>
                                        </div>

                                        <div class="col-md-6 mt-1">
                                            <h6 class="mb-1" style="    border-bottom: 1px solid #000;
                                            padding-bottom: 11px;">color product:-</h6>
                                            @foreach ($color as $colores)
                                                @foreach ($product->color_id as $col_id)
                                                    @if ($colores->id == $col_id)
                                                        <a
                                                            class="  p-1 {{ $colores->name }} outline">{{ $colores->name }}</a>
                                                    @endif
                                                @endforeach
                                                @endforeach
                                        </div>

                                        <div class="col-md-6 mt-1">
                                            <h6 class="mb-1" style="    border-bottom: 1px solid #000;
                                            padding-bottom: 11px;">size product :-</h6>
                                            @foreach ($size as $sizees)
                                                @foreach ($product->size_id as $siz_id)
                                                    @if ($sizees->id == $siz_id)
                                                        <a
                                                            class="  p-1 {{ $sizees->name }} outline">{{ $sizees->name }}</a>
                                                    @endif
                                                @endforeach
                                                @endforeach
                                        </div>


                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- Your Profile Views Chart END-->
            </div>
        </div>
    </main>
    <div class="ttr-overlay"></div>
@endsection
