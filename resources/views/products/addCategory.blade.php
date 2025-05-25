@extends('layouts.dashboardApp')

@section('content')
    @include('temp.navbarDashboard')
    <!--Main container start -->

    <!--Main container start -->
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
                            <div class="email-menu-bar">
                                <div class="compose-mail">
                                    <a href="{{ route('createProduct') }}" class="btn btn-block">Go Back</a>
                                </div>
                                <div class="email-menu-bar-inner">
                                    <ul>
                                        <li class="active"><a href="mailbox.html"><i class="fa fa-envelope-o"></i>Inbox
                                                <span class="badge badge-success">8</span></a></li>
                                        <li><a href="mailbox.html"><i class="fa fa-send-o"></i>Sent</a></li>
                                        <li><a href="mailbox.html"><i class="fa fa-file-text-o"></i>Drafts <span
                                                    class="badge badge-warning">8</span></a></li>
                                        <li><a href="mailbox.html"><i class="fa fa-cloud-upload"></i>Outbox <span
                                                    class="badge badge-danger">8</span></a></li>
                                        <li><a href="mailbox.html"><i class="fa fa-trash-o"></i>Trash</a></li>
                                    </ul>
                                </div>
                            </div>


                                <div class="mail-list-container p-3">
                                    @if (session('massege'))
                                    <h3 class="alert alert-primary text-center">{{ session('massege') }} </h3>
                                @endif
                                    <div class="col-12 m-t20">
                                        <div class="ml-auto">
                                            <h6 class="m-form__section"> Add Category
                                            </h6>
                                        </div>
                                    </div>

                                    <form class="mail-compose" action="{{ route('createCategory') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                    <div class="col-12">
                                        <table id="item-add" style="width:100%;">
                                            <tr class="list-item">
                                                <td>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <label class="col-form-label">Category Name</label>
                                                            <div>

                                                                <input class="form-control" type="text" name="name" >
                                                                @error('name')
                                                                <div class="alert alert-danger my-2">{{ $message }}</div>
                                                            @enderror
                                                            </div>
                                                        </div>



                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group col-12">
                                            <input type="file" name="image"
                                                accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf"
                                                multiple>
                                            @error('image')
                                                <div class="alert alert-danger my-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="button" class="btn-secondry m-r5"><i
                                                class="fa fa-fw fa-plus-circle"></i>cancel</button>
                                        <button type="submit" class="btn">Save changes</button>
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
