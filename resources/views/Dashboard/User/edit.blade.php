@extends('Dashboard.layouts.app')
@section('style')


    <!-- dropzone css -->
    <link rel="stylesheet" href="{{ asset('assets/libs/dropzone/dropzone.css') }}" type="text/css" />
@endsection
@section('main_content')

    <div class="page-content">
        <div class="container-fluid">

           <div class="row">
               <div class="col-md-7 m-auto ">
                  <div class="card">

                      <div class="card-body">
                          <form action="{{ route('user.update',$user->id) }}" method="post" class="">
                              @csrf @method('PUT')
                              <h3 class="text-center ">Edit Profile</h3>

                              <div class="mb-3 ">
                                  <label for="basiInput" class="form-label">Name</label>
                                  <input type="text" class="form-control" name="name" id="name">
                              </div>
                              <div class="mb-3 ">
                                  <label for="basiInput" class="form-label">Email</label>
                                  <input type="email" class="form-control" name="name" id="email">
                              </div>
                              <div class="mb-3 ">
                                  <label for="basiInput" class="form-label">Password</label>
                                  <input type="password" class="form-control" name="name" id="password">
                              </div>

                              <button class="btn btn-danger ">SUBMIT</button>
                          </form>
                      </div>
                  </div>
               </div>
           </div>
        </div>
        <!-- container-fluid -->
    </div>

@endsection

@section('script')
    <!-- dropzone min -->
    <script src="{{ asset('assets/libs/dropzone/dropzone-min.js') }}"></script>
@endsection
