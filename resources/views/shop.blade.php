@extends('layouts.app')
@section('content')

    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <a class="breadcrumb-item text-dark" href="#">Shop</a>
                    <span class="breadcrumb-item active">Shop List</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Shop Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->
            <div class="col-lg-3 col-md-4">
                <!-- Category Start -->
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Filter by
                        Category</span></h5>
                <div class="bg-light p-4 mb-30">
                    <form>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input filter-category" checked id="category-all">
                            <label class="custom-control-label" for="category-all">All Categories</label>
                        </div>
                        @foreach ($category as $categoryitem)
                            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                                <input type="checkbox" class="custom-control-input filter-category"
                                    id="category-{{ $categoryitem->id }}">
                                <label class="custom-control-label"
                                    for="category-{{ $categoryitem->id }}">{{ $categoryitem->name }}</label>
                            </div>
                        @endforeach
                    </form>
                </div>
                <!-- Category End -->

                <!-- Color Start -->
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Filter by
                        color</span></h5>
                <div class="bg-light p-4 mb-30">
                    <form>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input filter-color" checked id="color-all">
                            <label class="custom-control-label" for="color-all">All Colors</label>
                        </div>
                        @foreach ($color as $coloritem)
                            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                                <input type="checkbox" class="custom-control-input filter-color"
                                    id="color-{{ $coloritem->id }}">
                                <label class="custom-control-label"
                                    for="color-{{ $coloritem->id }}">{{ $coloritem->name }}</label>
                            </div>
                        @endforeach
                    </form>
                </div>
                <!-- Color End -->

                <!-- Size Start -->
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Filter by
                        size</span></h5>
                <div class="bg-light p-4 mb-30">
                    <form>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input filter-size" checked id="size-all">
                            <label class="custom-control-label" for="size-all">All Sizes</label>


                        </div>
                        @foreach ($size as $sizeitem)
                            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                                <input type="checkbox" class="custom-control-input filter-size"
                                    id="size-{{ $sizeitem->id }}">
                                <label class="custom-control-label"
                                    for="size-{{ $sizeitem->id }}">{{ $sizeitem->name }}</label>
                            </div>
                        @endforeach
                    </form>
                </div>
                <!-- Size End -->
            </div>
            <!-- Shop Sidebar End -->

            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-8">
                <div class="row pb-3" id="product-list">
                    @foreach ($product as $item)
                        <div class="col-lg-3 col-md-4 col-6 p-3 product-item" data-parent="{{ $item->parent_id }}"
                            data-colors="{{ implode(',', $item->color_id) }}"
                            data-sizes="{{ implode(',', $item->size_id) }}">
                            <div class="product-item bg-light mb-4">
                                <div class="product-img position-relative overflow-hidden">
                                    <img class="img-fluid w-100 imgshop" src="{{ asset('/product/image/' . $item->image) }}"
                                        alt="">
                                    <div class="product-action">
                                        <a class="btn btn-outline-dark btn-square"
                                            href="{{ route('Detailsproduct', $item->id) }}"><i
                                                class="fa fa-shopping-cart"></i></a>
                                    </div>
                                </div>
                                <div class="text-center py-4">
                                    <a class="h6 text-decoration-none text-truncate" href="">{{ $item->name }}</a>
                                    <div class="d-flex align-items-center justify-content-center mt-2">
                                        <h5>{{ $item->price }}</h5>
                                        <h6 class="text-muted ml-2"><del>{{ $item->price }}</del></h6>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-center mb-1">
                                        <small class="fa fa-star text-primary mr-1"></small>
                                        <small class="fa fa-star text-primary mr-1"></small>
                                        <small class="fa fa-star text-primary mr-1"></small>
                                        <small class="far fa-star text-primary mr-1"></small>
                                        <small class="far fa-star text-primary mr-1"></small>
                                        <small>(99)</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                    <div class="col-12">
                        <nav>
                            <ul class="pagination justify-content-center">
                                <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                            </ul>
                        </nav>
                    </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get data from blade to JavaScript
            const products = @json($product);
            const categories = @json($category);
            const colors = @json($color);
            const sizes = @json($size);

            const categoryFilters = document.querySelectorAll('.filter-category');
            const colorFilters = document.querySelectorAll('.filter-color');
            const sizeFilters = document.querySelectorAll('.filter-size');
            const productList = document.getElementById('product-list');

            categoryFilters.forEach(checkbox => checkbox.addEventListener('change', filterProducts));
            colorFilters.forEach(checkbox => checkbox.addEventListener('change', filterProducts));
            sizeFilters.forEach(checkbox => checkbox.addEventListener('change', filterProducts));


            function filterProducts() {
                const selectedCategories = Array.from(categoryFilters)
                    .filter(checkbox => checkbox.checked && checkbox.id !== 'category-all')
                    .map(checkbox => parseInt(checkbox.id.split('-')[1]));
                const selectedColors = Array.from(colorFilters)
                    .filter(checkbox => checkbox.checked && checkbox.id !== 'color-all')
                    .map(checkbox => parseInt(checkbox.id.split('-')[1]));
                const selectedSizes = Array.from(sizeFilters)
                    .filter(checkbox => checkbox.checked && checkbox.id !== 'size-all')
                    .map(checkbox => parseInt(checkbox.id.split('-')[1]));

                const filteredProducts = products.filter(product => {
                    const productColors = product.color_id.map(id => parseInt(id));
                    const productSizes = product.size_id.map(id => parseInt(id));

                    let categoryMatch = selectedCategories.length === 0 || selectedCategories.includes(
                        product.parent_id);
                    let colorMatch = selectedColors.length === 0 || selectedColors.some(colorId =>
                        productColors.includes(colorId));
                    let sizeMatch = selectedSizes.length === 0 || selectedSizes.some(sizeId => productSizes
                        .includes(sizeId));

                    if (selectedCategories.length > 0 && selectedColors.length > 0 && selectedSizes.length >
                        0) {
                        categoryMatch = selectedCategories.includes(product.parent_id);
                        colorMatch = selectedColors.some(colorId => productColors.includes(colorId));
                        sizeMatch = selectedSizes.some(sizeId => productSizes.includes(sizeId));
                        return categoryMatch && colorMatch && sizeMatch;
                    }

                    return categoryMatch && colorMatch && sizeMatch;
                });

                renderProducts(filteredProducts);
            }

            function renderProducts(products) {
                productList.innerHTML = '';
                products.forEach(product => {
                    const productHtml = `
                <div class="col-lg-3 col-md-4 col-6  p-3 product-item"
                     data-parent="${product.parent_id}"
                     data-colors="${product.color_id.join(',')}"
                     data-sizes="${product.size_id.join(',')}">
                    <div class="product-item bg-light mb-4">
                        <div class="product-img position-relative overflow-hidden">
                            <img class="img-fluid w-100 imgshop" src="{{ asset('/product/image/') }}/${product.image}" alt="">
                            <div class="product-action">
                                <a class="btn btn-outline-dark btn-square"

                            href="{{ route('Detailsproduct', '') }}${product.id}"><i class="fa fa-shopping-cart"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <a class="h6 text-decoration-none text-truncate" href="{{ route('Detailsproduct', '') }}${product.id}">${product.name}</a>
                            <div class="d-flex align-items-center justify-content-center mt-2">
                                <h5>${product.price}</h5><h6 class="text-muted ml-2"><del>${product.price}</del></h6>
                            </div>
                            <div class="d-flex align-items-center justify-content-center mb-1">
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="far fa-star text-primary mr-1"></small>
                                <small class="far fa-star text-primary mr-1"></small>
                                <small>(99)</small>
                            </div>
                        </div>
                    </div>
                </div>
            `;
                    productList.insertAdjacentHTML('beforeend', productHtml);
                });
            }

            // Initial render
            renderProducts(products);
        });
    </script>
    @include("temp.footer")
@endsection
