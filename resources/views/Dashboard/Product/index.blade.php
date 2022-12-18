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
@section('product_index','active')
@section('main_content')

    <div class="page-content" data-aos="fade-up ">
        <div class="container-fluid" >
            <div class="col-xxl-12">
                <div class="card">
                    <div class="card-header  d-flex justify-content-between " data-aos="fade-up">
                        <h4 class=" mb-0 "  >Product List</h4>

                       <div class="">
                           <a class="btn btn-primary " href="{{ route('product.create') }}" ><i class="ri-add-box-line  align-bottom me-2 text-muted"></i>
                               Create Product</a>
                       </div>
                    </div><!-- end card header -->

                    <div class="card-body" >
                        <div class="table-responsive table-card">
                            <table
                                class="table table-borderless table-centered align-middle table-nowrap mb-0">
                                <thead class="text-muted table-light">
                                <tr>
                                    <th scope="col"> ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Sub Category</th>
                                    <th scope="col">Unit Price</th>
                                    <th scope="col">Original Price</th>

                                    <th scope="col">Action</th>
                                    <th scope="col">Publish</th>
                                    <th scope="col">Created At</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($products as $key=>$product)
                                    <tr >
                                        <td>{{ $key+1 }}</td>
                                        <td>
                                            <span>{{ $product->name }}</span>
                                        </td>

                                        <td>{{ $product->Category->name ?? 'null'}}</td>
                                        <td>{{ $product->subCategory->name }}</td>
                                        <td>{{ number_format($product->unit_value,0) }}</td>
                                        <td>{{ number_format($product->price,0) }}</td>

                                        <td>

                                            <a href="{{ route('product.edit',$product->id) }}" class="btn btn-warning btn-sm " >
                                                <i class='bx bx-edit'></i>
                                            </a>
                                            <a href="{{ route('product.show',$product->id) }}" class="btn btn-success btn-sm " >
                                                <i class='bx bx-info-circle'></i>
                                            </a>
                                            @if($product->role == 0)
                                                <button class="btn btn-danger btn-sm " onclick="confirm('{{ $product->name }}','{{ $product->id }}')">
                                                    <i class='bx bx-trash'></i>
                                                </button>
                                                <form action="{{ route('product.destroy',$product->id) }}" id="ProductDel{{ $product->id }}" method="post">
                                                    @csrf @method("DELETE")
                                                </form>
                                            @endif
                                        </td>
                                        <td >
                                            <span id="isPublish{{ $product->id }}" type="button" onclick="publish({{ $product->id }})" class="{{ $product->is_publish == '0' ? 'btn badge badge-soft-danger' : 'btn badge badge-soft-success' }}">{{ $product->is_publish == '0' ? "NO" : "YES"}}</span>
                                        </td>
                                        <td>{{ $product->created_at->format('d M Y') }}</td>
                                    </tr>
                                @empty
                                    <tr class="text-center">
                                        <td colspan="9">
                                            <img src="{{ asset('assets/images/nodata.webp') }}" width="300" alt="">
                                        </td>
                                    </tr>
                                @endforelse
                                </tbody><!-- end tbody -->
                            </table><!-- end table -->

                            <div class="text-right mt-3 d-flex justify-content-end mx-4 ">
                                {{ $products->links() }}
                            </div>
                        </div>
                    </div>
                </div> <!-- .card-->
            </div>
        </div>
        <!-- container-fluid -->
    </div>

@endsection

@section('script')
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <script>

        async function publish(id){
            let data = await axios.get('/product/publish/'+id);

            if(data.data.data){
                let d = document.getElementById('isPublish'+id);

                if(data.data.status == '0'){
                    d.innerText = 'NO';
                    d.classList.add('badge-soft-danger')
                    d.classList.remove('badge-soft-success')
                }else{
                    d.innerText = 'YES';
                    d.classList.remove('badge-soft-danger')
                    d.classList.add('badge-soft-success')
                }
            }
        }

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
