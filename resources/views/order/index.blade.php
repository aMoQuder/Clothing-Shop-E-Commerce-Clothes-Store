@extends('layouts.dashboardApp')

@section('content')
@include('temp.navbarDashboard')


    <main class="ttr-wrapper">
        <div class="container-fluid">
            <div class="db-breadcrumb">
                <h4 class="breadcrumb-title">Mailbox</h4>
                <ul class="db-breadcrumb-list">
                    <li><a href="#"><i class="fa fa-home"></i>Home</a></li>
                    <li>Mailbox</li>
                </ul>
            </div>
            <div class="row">
                <!-- Your Profile Views Chart -->
                <div class="col-lg-12 m-b30">
                    <div class="widget-box">
                        <div class="email-wrapper">

                            <div class="mail-list-container">
                                @if (session('massege') == 'Deleted Successfully For User')
                                    @if (session('massege'))
                                        <h3 class="alert alert-danger text-center">{{ session('massege') }} </h3>
                                    @endif
                                @else
                                    @if (session('massege'))
                                        <h3 class="alert alert-primary text-center">{{ session('massege') }} </h3>
                                    @endif
                                @endif
                                <div class="mail-toolbar">
                                    <div class="check-all">
                                        <div class="custom-control custom-checkbox checkbox-st1">
                                            <input type="checkbox" class="custom-control-input" id="check1">
                                            <label class="custom-control-label" for="check1"></label>
                                        </div>
                                    </div>
                                    <div class="mail-search-bar">
                                        <input type="text" class="form-control" placeholder="Search" />
                                    </div>
                                    <div class="dropdown all-msg-toolbar">
                                        <span class="btn btn-info-icon" data-toggle="dropdown"><i
                                                class="fa fa-ellipsis-v"></i></span>
                                        <ul class="dropdown-menu">
                                            <li><a href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
                                            <li><a href="#"><i class="fa fa-arrow-down"></i> Archive</a></li>

                                        </ul>
                                    </div>
                                    <div class="next-prev-btn">
                                        <a href="#"><i class="fa fa-angle-left"></i></a>
                                        <a href="#"><i class="fa fa-angle-right"></i></a>
                                    </div>
                                </div>
                                <div class="mail-box-list">


                                    <div class="card-block table-border-style">
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead class="">
                                                    <tr class="mail-list-info">
                                                        <th>

                                                            <div class="mail-rateing mb-2">
                                                                <span><i class="fa fa-star-o"></i></span>
                                                            </div>
                                                        </th>
                                                        <th>
                                                            <div class="mail-list-title">
                                                                <h6 style="    margin-top: 3px;" >
                                                                    name</h6>
                                                            </div>
                                                        </th>
                                                        <th>
                                                            <div class="mail-list-title ">
                                                                <h6 class="mt-1">
                                                                    Total price</h6>
                                                            </div>
                                                        </th>
                                                        <th>
                                                            <div class="mail-list-title mr-3">
                                                                <h6 class="mt-1">
                                                                    Status</h6>
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
                                                    @foreach($orders as $order)
                                                    <tr class="mail-list-info">
                                                            <th scope="row" mail-list-info>

                                                                <div class="mail-rateing " id="demo">
                                                                    <span><i class="fa fa-star-o"></i></span>
                                                                </div>
                                                            </th>
                                                            <td>
                                                                <div class="mail-list-title " id="demo">
                                                                    <h6> {{ $order->user->name }}</h6>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="mail-list-title " id="demo">
                                                                    <h6>$${{ number_format($order->total_price, 2) }}</h6>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="mail-list-title " id="demo">
                                                                    <h6>{{ ucfirst($order->status) }}</h6>
                                                                </div>
                                                            </td>

                                                            <td>
                                                                <div class="mail-list-in d-flex">

                                                                    <div class="mail-list-time ml-auto" id="demo">
                                                                        <span>{{ rand(1, 12) }}:{{ rand(10, 60) }}
                                                                            AM</span>
                                                                    </div>
                                                                    <ul class="mailbox-toolbar d-flex ">
                                                                        <li data-toggle="tooltip" title="Delete"><a class="text-center"
                                                                                href="{{ route('orders.show', $order->id) }}"><i
                                                                                class="fa fa-eye-slash"></i></a></li>


                                                                    </ul>
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
                    </div>
                </div>
                <!-- Your Profile Views Chart END-->
            </div>
        </div>
    </main>
    <div class="ttr-overlay"></div>


@endsection



