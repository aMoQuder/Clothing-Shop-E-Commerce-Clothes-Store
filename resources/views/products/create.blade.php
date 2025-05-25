@extends('layouts.dashboardApp')

@section('content')
    @include('temp.navbarDashboard')
    <!--Main container start -->
    <main class="ttr-wrapper">
        <div class="container-fluid">
            <div class="db-breadcrumb">
                <h4 class="breadcrumb-title">Compose</h4>
                <ul class="db-breadcrumb-list">
                    <li><a href="#"><i class="fa fa-home"></i>Home</a></li>
                    <li>Compose</li>
                </ul>
            </div>
            <div class="row">
                <!-- Your Profile Views Chart -->
                <div class="col-lg-12 m-b30">
                    <div class="widget-box">
                        <div class="email-wrapper">
                            <div class="email-menu-bar">
                                <div class="compose-mail">
                                    <a href="{{route("addcategory")}}" class="btn btn-block">add Category</a>
                                </div>
                                <div class="email-menu-bar-inner">
                                    <ul>
                                        <li class="active"><a href="{{ route('allproduct') }}"><i class="ti-home"></i></i>all poduct
                                                <span class="badge badge-success">{{$product->count()}}</span></a></li>

                                        <li><a href="{{ route('home') }}"><i class="fa fa-trash-o"></i>Trash</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="mail-list-container ">
                                @if (session('massege'))
                                <h3 class="alert alert-primary text-center">{{ session('massege') }} </h3>
                            @endif
                                <form class="mail-compose" action="{{ route('storeProduct') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf


                                    <div class="row px-3">


                                        <div class="form-group col-md-6">
                                            <input class="form-control" type="text" placeholder="name" name="name">
                                            @error('name')
                                                <div class="alert alert-danger my-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group  col-md-6">
                                            <input class="form-control" type="text" placeholder="price" name="price">
                                            @error('price')
                                                <div class="alert alert-danger my-2">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="form-group row px-3">
                                        <label class="col-sm-2 col-form-label">category</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" style="color: #2aa6df" name="parent_id">



                                                @foreach ($category as $cat)
                                                    <option style="color: #2aa6df" value="{{$cat->id}}">{{$cat->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('parent_id')
                                                <div class="alert alert-danger my-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>



                                    <div class=" col-12 mt-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="accordion mt-5" id="accordionExample" style=" width: 100%;">
                                                    <div class="card">
                                                        <div class="card-header" id="headingOne">
                                                            <h2 class="mb-0">
                                                                <button class="btn  btn-lin text-left" type="button"
                                                                    data-toggle="collapse" data-target="#collapseOne"
                                                                    aria-expanded="true" aria-controls="collapseOne">
                                                                    add color </button>

                                                            </h2>
                                                        </div>

                                                        <div id="collapseOne" class="collapse show"
                                                            aria-labelledby="headingOne" data-parent="#accordionExample">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <!-- Your Profile Views Chart -->
                                                                    <div class="col-lg-12 m-b30">
                                                                        <div class="widget-box">
                                                                            <div class="email-wrapper">

                                                                                <div class="mail-list-container">

                                                                                    <div class="mail-box-list">


                                                                                        @foreach ($colors as $color)
                                                                                            <div class="mail-list-info d-flex">
                                                                                                <div class="checkbox-list">
                                                                                                    <div
                                                                                                        class="custom-control custom-checkbox checkbox-st1">
                                                                                                        <input
                                                                                                            type="checkbox"
                                                                                                            class="custom-control-input"
                                                                                                            name="color_id[]"
                                                                                                            value="{{ $color->id }}"
                                                                                                            id="check{{ $count }}">
                                                                                                        <label
                                                                                                            class="custom-control-label"
                                                                                                            for="check{{ $count++ }}"></label>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="mail-rateing ">
                                                                                                    <span><i
                                                                                                            class="fa fa-star-o"></i></span>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="mail-list-title">
                                                                                                    <h6>{{ $color->name }}
                                                                                                    </h6>
                                                                                                </div>



                                                                                            </div>
                                                                                        @endforeach
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <!-- Your Profile Views Chart END-->
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 m-t20">
                                                                    <div class="ml-auto">
                                                                        <h6 class="m-form__section">3. Add Item
                                                                        </h6>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <table id="item-add" style="width:100%;">
                                                                        <tr class="list-item">
                                                                            <td>
                                                                                <div class="row">
                                                                                    <div class="col-10">
                                                                                        <label class="col-form-label">new
                                                                                            color</label>
                                                                                        <div>
                                                                                            <input class="form-control"
                                                                                                type="text"
                                                                                                name="colors[]">
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-2">
                                                                                        <label
                                                                                            class="col-form-label">Close</label>
                                                                                        <div class="form-group">
                                                                                            <a class="delete"
                                                                                                href="#"><i
                                                                                                    class="fa fa-close"></i></a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                                <div class="col-12">
                                                                    <button type="button"
                                                                        class="btn-secondry add-item m-r5"><i
                                                                            class="fa fa-fw fa-plus-circle"></i>Add
                                                                        Item</button>
                                                                </div>
                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="accordion mt-5" id="accordionExample" style=" width: 100%;">
                                                    <div class="card">
                                                        <div class="card-header" id="headingOne">
                                                            <h2 class="mb-0">
                                                                <button class="btn  btn-lin text-left" type="button"
                                                                    data-toggle="collapse" data-target="#collapseOne1"
                                                                    aria-expanded="true" aria-controls="collapseOne">
                                                                    add size </button>

                                                            </h2>
                                                        </div>

                                                        <div id="collapseOne1" class="collapse show"
                                                            aria-labelledby="headingOne" data-parent="#accordionExample">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <!-- Your Profile Views Chart -->
                                                                    <div class="col-lg-12 m-b30">
                                                                        <div class="widget-box">
                                                                            <div class="email-wrapper">

                                                                                <div class="mail-list-container">

                                                                                    <div class="mail-box-list">


                                                                                        @foreach ($sizes as $size)
                                                                                            <div class="mail-list-info d-flex">
                                                                                                <div class="checkbox-list">
                                                                                                    <div
                                                                                                        class="custom-control custom-checkbox checkbox-st1">
                                                                                                        <input
                                                                                                            type="checkbox"
                                                                                                            class="custom-control-input"
                                                                                                            name="size_id[]"
                                                                                                            value="{{ $size->id }}"
                                                                                                            id="check{{ $count }}">
                                                                                                        <label
                                                                                                            class="custom-control-label"
                                                                                                            for="check{{ $count++ }}"></label>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="mail-rateing ">
                                                                                                    <span><i
                                                                                                            class="fa fa-star-o"></i></span>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="mail-list-title">
                                                                                                    <h6>{{ $size->name }}
                                                                                                    </h6>
                                                                                                </div>



                                                                                            </div>
                                                                                        @endforeach
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <!-- Your Profile Views Chart END-->
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 m-t20">
                                                                    <div class="ml-auto">
                                                                        <h6 class="m-form__section"> Add Item
                                                                        </h6>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <table id="item-addd"
                                                                        style="   width: 100%;
                                                                    margin-bottom: 9px;
                                                                    margin-left: -11px;
                                                                    margin-top: -15px;">
                                                                        <tr class="list-itemd">
                                                                            <td>
                                                                                <div class="row">
                                                                                    <div class="col-10">
                                                                                        <label class="col-form-label">new
                                                                                            size</label>
                                                                                        <div>
                                                                                            <input class="form-control"
                                                                                                type="text"
                                                                                                name="sizes[]">
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-2">
                                                                                        <label
                                                                                            class="col-form-label">Close</label>
                                                                                        <div class="form-group">
                                                                                            <button class="delete"
                                                                                                onclick="this.parentNode.parentNode.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode.parentNode.parentNode)"><i
                                                                                                    class="fa fa-close"></i></button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </div>

                                                                <div class="col-12">
                                                                    <button type="button" class="btn-secondry  m-r5"
                                                                        id="add-color-button"><i
                                                                            class="fa fa-fw fa-plus-circle"></i>Add
                                                                        Item</button>
                                                                </div>
                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group  col-12 mt-5">
                                        <label class="col-form-label">product description </label>
                                        <div>
                                            <textarea class="form-control" name="description" placeholder="Enter Description Ar"> </textarea>
                                        </div>
                                        @error('description')
                                            <div class="alert alert-danger my-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-12">
                                        <input type="file" name="image"
                                            accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf"
                                            multiple>
                                        @error('image')
                                            <div class="alert alert-danger my-2">{{ $message }}</div>
                                        @enderror
                                    </div>



                                    <div class="form-group col-12 mt-3">
                                        <input type="submit" class="btn btn-lg w-100 btn-block" value="Send">
                                    </div>
                                </form>
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
