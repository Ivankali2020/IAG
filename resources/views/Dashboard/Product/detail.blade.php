@extends('Dashboard.layouts.app')
@section('search')
    <!-- App Search-->
    <form class="app-search d-none d-md-block" action="{{ route('product.index') }}" method="get">
        <div class="position-relative">
            <input type="text" name="keyword" class="form-control" placeholder="Search..." autocomplete="off"
                   id="search-options" value="{{ request()->keyword ?? '' }}">
            <span class="mdi mdi-magnify search-widget-icon"></span>
            <span class="mdi mdi-close-circle search-widget-icon search-widget-icon-close d-none"
                  id="search-close-options"></span>
        </div>
    </form>
@endsection
@section('style')
    <!--Swiper slider css-->
    <link href="{{ asset('assets/libs/swiper/swiper-bundle.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('product_index','active')

@section('main_content')

    <div class="page-content">
        <div class="container-fluid">

            <!-- end page title -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row gx-lg-5">
                                <div class="col-xl-4 col-md-8 mx-auto">
                                    <div class="product-img-slider sticky-side-div">
                                        <div class="swiper product-thumbnail-slider p-2 rounded bg-light">
                                            <div class="swiper-wrapper">
                                                   @foreach($product->Photos as $p)
                                                    <div class="swiper-slide">

                                                        @if($product->Photos != null)
                                                            <img src="{{ $p->name }}" alt=""
                                                                 class="img-fluid d-block" />
                                                            @else

                                                            <img src="{{ $p->name }}" alt=""
                                                                 class="img-fluid d-block" />
                                                            @endif
                                                    </div>

                                                    @endforeach
                                            </div>
                                            <div class="swiper-button-next"></div>
                                            <div class="swiper-button-prev"></div>
                                        </div>
                                        <!-- end swiper thumbnail slide -->
                                        <div class="swiper product-nav-slider mt-2">
                                            <div class="swiper-wrapper">



                                                    @foreach($product->Photos as $p)
                                                        <div class="swiper-slide">
                                                            <div class="nav-slide-item ">
                                                                @if($product->Photos != null)
                                                                    <img src="{{ $p->name }}" alt=""
                                                                         class="img-fluid d-block" />
                                                                @else

                                                                    <img src="{{ $p->name }}" alt=""
                                                                         class="img-fluid d-block" />
                                                                @endif
                                                            </div>

                                                        </div>

                                                    @endforeach


                                            </div>
                                        </div>
                                        <!-- end swiper nav slide -->
                                    </div>
                                </div>
                                <!-- end col -->

                                <div class="col-xl-8">
                                    <div class="mt-xl-0 mt-5">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <h4>{{ $product->name }}</h4>
                                                <div class="hstack gap-3 flex-wrap">
                                                    <div><a href="#" class="text-primary d-block">{{ \Illuminate\Support\Facades\Auth::user()->name }}</a></div>
                                                    <div class="vr"></div>
                                                    <div class="text-muted">Published : <span
                                                            class="text-body fw-medium">{{ $product->created_at->format('d M Y') }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex-shrink-0">
                                                <div>
                                                    <a href="{{ route('product.edit',$product->id) }}"
                                                       class="btn btn-light" data-bs-toggle="tooltip"
                                                       data-bs-placement="top" title="Edit"><i
                                                            class="ri-pencil-fill align-bottom"></i></a>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="row mt-4">
                                            <div class="col-md-4   mb-3 ">
                                                <div class="p-2 border border-dashed rounded">
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar-sm me-2">
                                                            <div
                                                                class="avatar-title rounded bg-transparent text-success fs-24">
                                                                <i class="ri-money-dollar-circle-fill"></i>
                                                            </div>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <p class="text-muted mb-1">Price :</p>
                                                            <h5 class="mb-0">{{ $product->price  }}</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <!-- end col -->

                                            <div class="col-md-4   mb-3 ">
                                                <div class="p-2 border border-dashed rounded">
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar-sm me-2">
                                                            <div
                                                                class="avatar-title rounded bg-transparent text-success fs-24">
                                                                <i class=" ri-pencil-ruler-fill"></i>
                                                            </div>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <p class="text-muted mb-1">Category :</p>
                                                            <h5 class="mb-0">{{ $product->Category->name }}</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end col -->
                                            <div class="col-md-4   mb-3 ">
                                                <div class="p-2 border border-dashed rounded">
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar-sm me-2">
                                                            <div
                                                                class="avatar-title rounded bg-transparent text-success fs-24">
                                                                <i class="ri-centos-fill"></i>
                                                            </div>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <p class="text-muted mb-1">SubCategory :</p>
                                                            <h5 class="mb-0">{{ $product->subCategory->name }}</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end col -->
                                            <div class="col-md-4   mb-3 ">
                                                <div class="p-2 border border-dashed rounded">
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar-sm me-2">
                                                            <div
                                                                class="avatar-title rounded bg-transparent text-success fs-24">
                                                                <i class="ri-inbox-archive-fill"></i>
                                                            </div>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <p class="text-muted mb-1">Maximum Order :</p>
                                                            <h5 class="mb-0">
                                                                {{ $product->max_order }}
                                                            </h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4   mb-3 ">
                                                <div class="p-2 border border-dashed rounded">
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar-sm me-2">
                                                            <div
                                                                class="avatar-title rounded bg-transparent text-success fs-24">
                                                                <i class="ri-stack-fill"></i>
                                                            </div>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <p class="text-muted mb-1">Minimum Order :</p>
                                                            <h5 class="mb-0">{{ $product->min_order }}</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end col -->
                                            <!-- end col -->
                                            <div class="col-md-4   mb-3 ">
                                                <div class="p-2 border border-dashed rounded">
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar-sm me-2">
                                                            <div
                                                                class="avatar-title rounded bg-transparent text-success fs-24">
                                                                <i class="ri-file-copy-2-fill"></i>
                                                            </div>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <p class="text-muted mb-1">Unit Value :</p>
                                                            <h5 class="mb-0">  {{ $product->unit_value }} </h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end col -->
                                        </div>




                                        <div class="product-content mt-5">
                                            <h5 class="fs-15 mb-3">Product Description :</h5>
                                            <nav>
                                                <ul class="nav nav-tabs nav-tabs-custom nav-success"
                                                    id="nav-tab" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" id="nav-speci-tab"
                                                           data-bs-toggle="tab" href="#nav-speci" role="tab"
                                                           aria-controls="nav-speci"
                                                           aria-selected="true">Specification</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="nav-detail-tab"
                                                           data-bs-toggle="tab" href="#nav-detail" role="tab"
                                                           aria-controls="nav-detail"
                                                           aria-selected="false">Description</a>
                                                    </li>
                                                </ul>
                                            </nav>
                                            <div class="tab-content border border-top-0 p-4"
                                                 id="nav-tabContent">
                                                <div class="tab-pane fade show active" id="nav-speci"
                                                     role="tabpanel" aria-labelledby="nav-speci-tab">
                                                    <div class="table-responsive">
                                                        <table class="table mb-0">
                                                            <tbody>
                                                            <tr>
                                                                <th scope="row" style="width: 200px;">
                                                                    Code</th>
                                                                <td>{{ $product->code }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Add_on</th>
                                                                <td>{{ $product->add_on }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Publish</th>
                                                                <td>
                                                                    <span class="{{ $product->is_publish == 0 ? 'badge badge-soft-danger' : 'badge badge-soft-success' }}">{{ $product->is_publish == 0 ? "NO" : "YES" }}</span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Keyword</th>
                                                                <td>{{ $product->tags }}</td>
                                                            </tr>
                                                            </tbody>
                                                        </table>

                                                        <h4 class="mt-4 ">Product Specifications</h4>
                                                        @forelse($product->specs as $spec)
                                                            <div class="card mb-3">
                                                                <div class="card-body">
                                                                    <h5>{{ $spec->title }}</h5>
                                                                    {{ $spec->description }}
                                                                </div>
                                                            </div>
                                                            @empty

                                                            <div class="card card-body">
                                                                NO DATA FOUND
                                                            </div>

                                                        @endforelse
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="nav-detail" role="tabpanel"
                                                     aria-labelledby="nav-detail-tab">
                                                    <div class="mb-3">
                                                        <h4>Detail</h4>
                                                       {{ $product->description }}
                                                    </div>
                                                    <div class="mb-3">
                                                        <h4>Ordering</h4>
                                                        {{ $product->ordering }}
                                                    </div>
                                                    <div class="mb-3">
                                                        <h4>Ingredient</h4>
                                                        {{ $product->ingredient }}
                                                    </div>
                                                    <div class="mb-3">
                                                        <h4>Nutrient</h4>
                                                        {{ $product->nutrient }}
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- product-content -->


                                    </div>
                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end row -->
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->

        </div>
        <!-- container-fluid -->
    </div>

@endsection

@section('script')
    <script src="{{ asset('assets/libs/swiper/swiper-bundle.min.js') }}"></script>

    <script>
        var productNavSlider = new Swiper(".product-nav-slider", {
                // loop: !1,
                spaceBetween: 10,
                slidesPerView: 4,
                freeMode: !0,
                watchSlidesProgress: !0,

            }),
            productThubnailSlider = new Swiper(".product-thumbnail-slider", {
                loop: !1,
                spaceBetween: 24,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                thumbs: { swiper: productNavSlider },
            });

        function confirm(value,id){
            Swal.fire({
                title: "Are you sure?",
                text: ` ${value} product will be delete!`,
                icon: "warning",
                showCancelButton: !0,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!",
                confirmButtonClass: "btn btn-primary w-xs me-2 mt-2",
                cancelButtonClass: "btn btn-danger w-xs mt-2",
                buttonsStyling: !1,
                showCloseButton: !0,
            }).then(function (t) {
                t.value
                    ?
                    document.getElementById('ProductDel'+id).submit()

                    : t.dismiss === Swal.DismissReason.cancel &&
                    Swal.fire({
                        title: "Cancelled",
                        text: "Your imaginary file is safe",
                        icon: "error",
                        confirmButtonClass: "btn btn-primary mt-2",
                        buttonsStyling: !1,
                    });
            });
        }

    </script>

@endsection
