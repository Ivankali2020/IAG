@extends('Dashboard.layouts.app')
@section('style')
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/deselect.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/js/image-uploader/image-uploader.min.css') }}">
    <script src="{{ asset('vendor/jsvalidation/js/jsvalidation.min.js') }}"></script>

@endsection
@section('search')
    <!-- App Search-->
    <form class="app-search d-none " action="./" method="get">
        <div class="position-relative">
            <input type="text" name="keyword" class="form-control" placeholder="Search..." autocomplete="off"
                   id="search-options" value="{{ request()->keyword ?? '' }}">
            <span class="mdi mdi-magnify search-widget-icon"></span>
            <span class="mdi mdi-close-circle search-widget-icon search-widget-icon-close d-none"
                  id="search-close-options"></span>
        </div>
    </form>
@endsection
@section('main_content')

    <div class="page-content">
        <div class="container-fluid">

            <div class="card">
                <div class="card-header bg-soft-primary ">
                    <h4 class="mb-0 ">Product Information</h4>
                </div>
                <div class="card-body" >

                    <form action="{{ route('product.store') }}" id="storeProduct"  method="post"  enctype="multipart/form-data" >
                        @csrf
                        <div class="row">
                            <div class="col-md-6 ">

                                    <div class="row ">

                                        <div class="mb-3 col-6">
                                            <label for="basiInput" class="form-label">Code</label>
                                            <input type="text" class="form-control" name="code" value="{{ old('code') }}">
                                            @error('code')
                                            <span class="text-danger small">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3 col-6">
                                            <label for="basiInput" class="form-label">Name</label>
                                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                            @error('name')
                                            <span class="text-danger small">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="mb-3 col-6 ">
                                            <label for="basiInput" class="form-label">Category</label>
                                            <select name="category_id" id="" class="form-select">
                                                <option value="" selected disabled>choose  product category</option>
                                                @forelse(\App\Models\Category::all() as $c)
                                                    <option value="{{ $c->id }}" {{ old('category_id') == $c->id ? 'selected' : '' }} > {{ $c->name }}</option>
                                                @empty
                                                    <option value="">NO DATA FOUND</option>
                                                @endforelse
                                            </select>
                                            @error('category_id')
                                            <span class="text-danger small">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3 col-6 ">
                                            <label for="basiInput" class="form-label">SubCategory</label>
                                            <select name="subCategory_id" id="" class="form-select">
                                                <option value="" selected disabled>choose  product subCat</option>
                                                @forelse(\App\Models\SubCategory::all() as $b)
                                                    <option value="{{ $b->id }}" {{ old('subCategory_id') == $b->id ? 'selected' : '' }} > {{ $b->name }}</option>
                                                @empty
                                                    <option value="" class="disabled">NO DATA FOUND</option>
                                                @endforelse
                                            </select>
                                            @error('brand_id')
                                            <span class="text-danger small">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">

                                        <div class="mb-3 col-12 ">
                                            <label for="basiInput" class="form-label">Search Tag/Keyword</label>
                                            <input type="text" class="form-control" name="tags" value="{{ old('tags') }}">

                                            @error('tags')
                                            <span class="text-danger small">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3 col-6">
                                            <label for="basiInput" class="form-label">Price</label>
                                            <input type="number" class="form-control" name="price" value="{{ old('price') }}">
                                            @error('price')
                                            <span class="text-danger small">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3 col-6 ">
                                            <label for="basiInput" class="form-label">Add-on</label>
                                            <select name="add_on" id="select_box" class="form-select">
                                                <option  selected disabled>Select Add-on</option>
                                                @forelse(\App\Models\Category::all() as $c)
                                                    <option value="{{ $c->id }}" {{ old('category_id') == $c->id ? 'selected' : '' }} > {{ $c->name }}</option>
                                                @empty
                                                    <option value="">NO DATA FOUND</option>
                                                @endforelse
                                            </select>

                                            <div class="col-md-3">&nbsp;</div>
                                            @error('add_on')
                                            <span class="text-danger small">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3 col-12">
                                            <label for="basiInput" class="form-label">Ordering</label>
                                            <input type="text" class="form-control" name="ordering" value="{{ old('ordering') }}">
                                            @error('ordering')
                                            <span class="text-danger small">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3 col-12">
                                            <label for="basiInput" class="form-label">Ingredient</label>
                                            <textarea name="ingredient" class="form-control" id="" cols="30" rows="3">{{ old('ingredient') }}</textarea>
                                            @error('ingredient')
                                            <span class="text-danger small">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3 col-12">
                                            <label for="basiInput" class="form-label">Nutrient</label>
                                            <input type="text" class="form-control" name="nutrient" value="{{ old('nutrient') }}">
                                            @error('nutrient')
                                            <span class="text-danger small">{{ $message }}</span>
                                            @enderror
                                        </div>
                                     </div>


                                <div class="row">
                                    <h4 class="my-3 ">Product Specification</h4>
                                    <div class="mb-3 col-12 ">
                                        <label for="basiInput" class="form-label">Title : 1</label>
                                        <input type="text" class="form-control" name="stitle[]" value="{{ old('s_title') }}">
                                    </div>

                                    <div class="mb-3 col-12 ">
                                        <label for="basiInput" class="form-label">Description : 1</label>
                                        <textarea name="sdescription[]" class="form-control " id="" cols="10" rows="2" placeholder="product specification description"> {{ old('s_description') }} </textarea>
                                    </div>

                                    <div class="next-box" id="next-box"></div>
                                </div>

                                <div class="text-end mb-3 mb-md-0 ">
                                    <button type="button" onclick="addSpecs()" class="btn btn-primary "> + Add Specification</button>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="row ">

                                    <div class="mb-3 col-6">
                                        <label for="basiInput" class="form-label">Minimum Order</label>
                                        <input type="number" class="form-control" name="min_order" value="{{ old('min_order') }}">
                                        @error('min_order')
                                        <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-6">
                                        <label for="basiInput" class="form-label">Maximum Order</label>
                                        <input type="text" class="form-control" name="max_order" value="{{ old('max_order') }}">
                                        @error('max_order')
                                        <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row ">

                                    <div class="mb-3 col-6">
                                        <label for="basiInput" class="form-label">Unit value</label>
                                        <input type="number" class="form-control" name="unit_value" value="{{ old('unit_value') }}">
                                        @error('unit_value')
                                        <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-6">
                                        <label for="basiInput" class="form-label">Unit</label>
                                        <input type="text" class="form-control" name="unit" value="{{ old('unit') }}">
                                        @error('unit')
                                        <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3 ">
                                    <label for="basiInput" class="form-label">Highlight Text</label>
                                    <textarea name="highlight" class="form-control" id="" cols="30" rows="5">{{ old('highlight') }}</textarea>
                                    @error('highlight')
                                    <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 ">
                                    <label for="basiInput" class="form-label">Description</label>
                                    <textarea name="description" class="form-control" id="" cols="30" rows="10">{{ old('description') }}</textarea>
                                    @error('description')
                                    <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group" >
                                    <label for="images"> Product Photos
                                        @error('images')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </label>
                                    <div class="input-images" id="images"></div>
                                </div>


                                <div class="text-end mt-4 ">
                                    <button class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    @if($errors)
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        <!-- container-fluid -->
    </div>
    @include('Dashboard.Alert.imageModal')

@endsection


@section('script')
    {!! JsValidator::formRequest('App\Http\Requests\StoreProductRequest', '#storeProduct'); !!}

    <script src="{{ asset('assets/js/image-uploader/image-uploader.min.js') }}"></script>
{{--    <script src="{{ asset('assets/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>--}}

    <script>
        // $("#summernote").summernote({
        //     toolbar: [
        //         // [groupName, [list of button]]
        //         ["style", ["bold", "italic", "underline", "clear"]],
        //         ["font", ["strikethrough", "superscript", "subscript"]],
        //         ["fontsize", ["fontsize"]],
        //         ["color", ["color"]],
        //         ["para", ["ul", "ol", "paragraph"]],
        //         ["height", ["height"]],
        //     ],
        //     height: 200,
        // });

        $(".input-images").imageUploader({
            maxSize: 2 * 1024 * 1024,
            maxFiles: 10,
        });


        let id = 2;
        function addSpecs()
        {
            document.getElementById('next-box').innerHTML +=
                `
                                   <div id="addBox${id}">
                                   <div class="mb-3 col-12 " >
                                        <div class=" d-flex justify-content-between align-items-center">
                                          <label for="basiInput" class="form-label">Title : ${id}</label>
                                          <button class="btn btn-danger btn-sm mb-2 " onclick="deleteBox(${id})">X</button>

                                        </div>
                                        <input type="text" class="form-control" name="stitle[]" value="{{ old('s_title') }}">
                                    </div>

                                    <div class="mb-3 col-12 ">
                                        <label for="basiInput" class="form-label">Description : ${id}</label>
                                        <textarea name="sdescription[]" class="form-control " id="" cols="10" rows="2" placeholder="product specification description">{{ old('s_description') }} </textarea>
                                    </div>
                                    </div>
                `;

                                        id++;
        }

        var select_box_element = document.querySelector('#select_box');

        dselect(select_box_element, {
            search: true
        });

        function deleteBox(id)
        {
            document.getElementById('addBox'+id).remove();
        }

        // document.querySelector("#ckeditor-classic") &&
        // ClassicEditor.create(document.querySelector("#ckeditor-classic"))
        //     .then(function (e) {
        //         e.ui.view.editable.element.style.height = "200px";
        //     })
        //     .catch(function (e) {
        //         console.error(e);
        //     });
    </script>
@endsection
