@extends('layouts.admin')

@section('content')
 <!-- Content Header (Page header) -->

<!-- /.content-header -->


    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Vendeurs</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Vendeurs</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Vendeurs</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th style="width: 40px">#</th>
                    <th>Name</th>
                    <th>Phone</th>
                   
                    
                    <th style="width: 40px">Action</th>
                  </tr>
                  </thead>
                  <tbody>

                    
                    <?php 
                    $i = 1;
                    ?>
                    @foreach ($users as $user)

                  <tr>
                    <td>{{($i++)}}</td>
                    <td>{{($user->name)}} </td>
                    <td>{{($user->phone)}} </td>
                   
                    <td class="d-flex">

                      <a href="{{ route('getLastStock', [$user->id ]) }}" class="btn btn-sm btn-success mr-1"> <i class="fas fa-eye"></i> </a>
                  
                          {{-- <a href="{{ route('user.show', [$user->id]) }}" class="btn btn-sm btn-success mr-1"> <i class="fas fa-eye"></i> </a> --}}
                         </td>
                  </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th style="width: 40px">#</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th style="width: 40px">Action</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  
<!-- /.content-header -->

@endsection


@section('style')

@endsection