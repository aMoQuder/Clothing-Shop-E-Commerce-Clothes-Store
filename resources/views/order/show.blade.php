@extends('layouts.dashboardApp')

@section('content')
@include('temp.navbarDashboard')
	<!--Main container start -->
	<main class="ttr-wrapper">
		<div class="container-fluid">
			<div class="db-breadcrumb">
				<h4 class="breadcrumb-title">Review</h4>
				<ul class="db-breadcrumb-list">
					<li><a href="#"><i class="fa fa-home"></i>Home</a></li>
					<li>Review</li>
				</ul>
			</div>
			<div class="row">
				<!-- Your Profile Views Chart -->
				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>Review</h4>
						</div>
						<div class="widget-inner">

							<div class=" admin-review " style="    border-bottom: 1px solid rgba(0, 0, 0, 0.1);
                            padding-bottom: 30px;
                            margin-bottom: 30px;">
								<div class="card-courses-full-dec">
									<div class="card-courses-title">
										<h4>Product of {{ $order->user->name }} </h4>
									</div>
									<div class="card-courses-list-bx">
										<ul class="card-courses-view">
											<li class="card-courses-user">
												<div class="card-courses-user-pic">
													<img src="asset/images/testimonials/pic1.jpg" alt=""/>
												</div>
												<div class="card-courses-user-info">
													<h5>Reviewer</h5>
													<h4> {{ $order->user->name }} </h4>
												</div>
											</li>
											<li class="card-courses-review">
												<h5>3 Review</h5>
												<ul class="cours-star">
													<li class="active"><i class="fa fa-star"></i></li>
													<li class="active"><i class="fa fa-star"></i></li>
													<li class="active"><i class="fa fa-star"></i></li>
													<li><i class="fa fa-star"></i></li>
													<li><i class="fa fa-star"></i></li>
												</ul>
											</li>
                                            <li class="card-courses-categories">
												<h5>Total price</h5>
												<h4>${{ number_format($order->total_price, 2) }}</h4>
											</li>
                                            <li class="card-courses-categories">
												<h5>status</h5>
												<h4>{{ ucfirst($order->status) }}</h4>
											</li>

										</ul>
									</div>
									<div class="row card-courses-dec order" >
										<div class="col-md-12 w-100">
											<h6 class="m-b10">Best Quality Product</h6>
                                            <div class="card-block table-border-style">
                                                <div class="mail-box-list w-100">


                                                    <div class="card-block table-border-style w-100">
                                                        <div class="table-responsive ">
                                                            <table class="table table-hover">
                                                                <thead class="">
                                                                    <tr class="mail-list-info">

                                                                        <th>
                                                                            <div class="mail-list-title">
                                                                                <h6 style="    margin-top: 3px;" >
                                                                                    image</h6>
                                                                            </div>
                                                                        </th>
                                                                        <th>
                                                                            <div class="mail-list-title">
                                                                                <h6 style="    margin-top: 3px;" >
                                                                                    product</h6>
                                                                            </div>
                                                                        </th>
                                                                        <th>
                                                                            <div class="mail-list-title ">
                                                                                <h6 class="mt-1">
                                                                                    Quantity</h6>
                                                                            </div>
                                                                        </th>
                                                                        <th>
                                                                            <div class="mail-list-title mr-2">
                                                                                <h6 class="mt-1">
                                                                                    price </h6>
                                                                            </div>
                                                                        </th>
                                                                        <th>
                                                                            <div class="mail-list-title mr-2">
                                                                                <h6 class="mt-1">
                                                                                    color</h6>
                                                                            </div>
                                                                        </th>
                                                                        <th>
                                                                            <div class="mail-list-title mr-2">
                                                                                <h6 class="mt-1">
                                                                                    size</h6>
                                                                            </div>
                                                                        </th>
                                                                        <th class="">
                                                                            <div class="mail-list-time ml-auto float-right">
                                                                                <h6 class="mb-1">
                                                                                    action</h6>
                                                                            </div>
                                                                        </th>
                                                                    </tr>

                                                                </thead>
                                                                <tbody>
                                                                    @foreach($order->items as $item)
                                                                    <tr class="mail-list-info">

                                                                            <td>
                                                                                <div class="mail-list-title mr-2" id="demo">
                                                                                    <img src="{{ asset('/product/image/' . $item->product->image) }}" style="height: 40px; margin-top:-7px;" class="img-fluid" alt="">

                                                                              </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="mail-list-title mr-2" id="demo">
                                                                                    <h6>{{ $item->product->name }}</h6>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="mail-list-title mr-2" id="demo">
                                                                                    <h6> {{ $item->quantity }}</h6>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="mail-list-title " id="demo">
                                                                                    <h6>${{ number_format($item->price, 2) }} </h6>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="mail-list-title" id="demo">
                                                                                    <h6> @if($item->color) (Color: {{ $item->color }})
                                                                                        @else
                                                                                        No color chosen
                                                                                        @endif</h6>
                                                                                </div>
                                                                            </td>
                                                                            <td>

                                                                                <div class="mail-list-title" id="demo">
                                                                                    <h6> @if($item->size) (Size: {{ $item->size }})
                                                                                        @else
                                                                                        No Size chosen
                                                                                        @endif</h6>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="mail-list-in d-flex">

                                                                                    <div class="mail-list-time ml-auto" id="demo">
                                                                                        <span>{{ rand(1, 12) }}:{{ rand(10, 60) }}
                                                                                            AM</span>
                                                                                    </div>
                                                                                    
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
										</div>
										<div class="col-md-12">
											<a href="" class="btn" data-toggle="modal" data-target="#exampleModal">go back</a>
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
