@extends('layouts.admin')

@section('content')
 <!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Create Admin</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Category List</a></li>
                    <li class="breadcrumb-item active">Admin list</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->


<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">

                     <h3 class="card-title">Create Admin</h3>
                    <a href="{{route('user.index')}}" class="btn btn-primary">Go Back To Category List</a>

                    </div>

                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                   
                    <div class="row">

                        <div class="col-12 col-lg-6 offset-lg-3 col-md-8 offset-md-2">

                            <form action="{{ route('user.store') }}" method="POST" >

                                @csrf

                                <div class="card-body">

                                  @include('includes.errors')

                                  <div class="form-group">
                                    <label for="name"> Name</label>
                                    <input type="name" name="name" class="form-control" id="name" placeholder="Enter Name">
                                  </div>

                                  <div class="form-group">
                                    <label for="name"> Email</label>
                                    <input type="email" name="email" class="form-control" id="name" placeholder="Enter Name">
                                  </div>

                                  <div class="form-group">
                                    <label for="name"> Mode Passe</label>
                                    <input type="password" name="password" class="form-control" id="name" placeholder="Enter Name">
                                  </div>

                                  <div class="form-group">
                                    <label for="name">  Confirme Mode Passe</label>
                                    <input type="password"  class="form-control" id="name" placeholder="Enter Name">
                                  </div>


                                
                                 
                                </div>
                                <!-- /.card-body -->
                
                                <div class="card-footer">
                                  <button type="submit" class="btn btn-lg btn-primary text-center">Submit</button>
                                </div>
                              </form>

                        </div>

                    </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        
                     
                </div>
                <!-- /.card-body -->
            </div>

            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

@endsection