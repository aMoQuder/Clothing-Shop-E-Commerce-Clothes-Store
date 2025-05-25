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
                                    <a href="mailbox-compose.html" class="btn btn-block">Compose</a>
                                </div>
                                <div class="email-menu-bar-inner">
                                    <ul>
                                        <li class="active"><a href="mailbox.html"><i class="fa fa-envelope-o"></i>Inbox
                                                <span class="badge badge-success">8</span></a></li>
                                        <li><a href="mailbox.html"><i class="fa fa-send-o"></i>Sent</a></li>

                                        <li><a href="{{ route('createProduct') }}"><i class="fa fa-trash-o"></i>Trash</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="mail-list-container ">
                                <form class="mail-compose" action="{{ route('saveProduct') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf


                                    <div class="row px-3">


                                        <div class="form-group col-md-6">
                                            <input class="form-control" type="text" value="{{ $product->name }}"
                                                name="name">

                                        </div>
                                        <div class="form-group  col-md-6">
                                            <input class="form-control" type="text" value="{{ $product->price }}"
                                                name="price">

                                        </div>

                                    </div>

                                    <div class="form-group row px-3">
                                        <label class="col-sm-2 col-form-label">category</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" style="color: #2aa6df" name="parent_id">


                                                @foreach ($category as $cat)
                                                    @if ($product->parent_id == $cat->id)
                                                        <option value="{{ $cat->id }}"> {{ $cat->name }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                                @foreach ($category as $cat)
                                                    @if ($product->parent_id == $cat->id)
                                                        @continue
                                                    @else
                                                        <option value="{{ $cat->id }}"> {{ $cat->name }}
                                                        </option>
                                                    @endif
                                                @endforeach

                                            </select>

                                        </div>
                                    </div>
                                    <div class="form-group  col-12">
                                        <label class="col-form-label">product description En</label>
                                        <div>
                                            <textarea class="form-control" name="description_en" placeholder="Enter Description En"> </textarea>
                                            <input type="hidden" name="old_description_en"
                                                value="{{ $product->description_en }}">

                                        </div>

                                    </div>
                                    <input type="hidden" value="{{ $product->id }}" name="old_id">

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
                                                                                            <div class="mail-list-info">
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
                                                                                            <div class="mail-list-info">
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
                                        <label class="col-form-label">product description Ar</label>
                                        <div>
                                            <textarea class="form-control" name="description_ar" placeholder="{{ $product->description_ar }}"> </textarea>
                                            <input type="hidden" name="old_description_ar"
                                                value="{{ $product->description_ar }}">
                                        </div>
                                    </div>
                                    <div class="form-group col-12">
                                        <div class="row">
                                            <div class="col-md-8">

                                        <input type="file" name="image" id="updateImage" onchange=" previewFile()"
                                        accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf"
                                        multiple>
                                    <input type="hidden" name="old_image" value="{{ $product->image }}">
                                            </div>
                                            <div class="col-md-4">
                                                <img src="{{ asset('product/image/' . $product->image) }}" id="image_preview"
                                                class="w-100 "
                                                style="height: 190px;"
                                                alt="">
                                            </div>
                                        </div>


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
