@extends('layouts.admin')

@section('content')
 <!-- Content Header (Page header) -->

<!-- /.content-header -->


    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Demandes</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Demandes</a></li>
              <li class="breadcrumb-item active">Demandes</li>
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
                <h3 class="card-title">Demandes</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th style="width: 40px">#</th>
                    
                    <th>Name</th>
                    <th>Date</th>
                    <th>Type</th>
                    <th>Referance</th>
                  
                    <th>Number</th>
                    
                    <th style="width: 40px">Action</th>
                  </tr>
                  </thead>
                  <tbody>

                    
                    <?php 
                    $i = 1;
                    ?>
                    @foreach ($demandes as $demande)

                  <tr>
                    <td>{{($i++)}}</td>
                    <td>{{$demande->name}}</td>
                    <td>{{($demande->created_at)}} </td>
                    
                    <td>{{($demande->type_colis)}}</td>
                    <td>{{($demande->reference)}}</td>
                    
                    <td><strong>{{($demande->nbr_colis)}}</strong></td>
                    
                    <td class="d-flex">
                      <a href="{{ route('getStocksDemandes', [$demande->id ]) }}" class="btn btn-sm btn-success mr-1"> <i class="fas fa-eye"></i> </a>
                      <a href="{{ route('demande.edit', [$demande->id ]) }}" class="btn btn-sm btn-primary mr-1"> <i class="fas fa-edit"></i> </a>
                      <form action="{{ route('demande.destroy', [$demande->id]) }}" class="mr-1" method="POST">
                                  @method('DELETE')
                                     @csrf 
                              <button type="submit" class="btn btn-sm btn-danger"> <i class="fas fa-trash"></i> </button>
                         </form>
                          {{-- <a href="{{ route('demande.show', [$demande->id]) }}" class="btn btn-sm btn-success mr-1"> <i class="fas fa-eye"></i> </a> --}}
                         </td>
                  </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th style="width: 40px">#</th>
                    
                    <th>Name</th>
                    <th>Date</th>
                    <th>Type</th>
                    <th>Referance</th>
                    
                    <th>Number</th>
                   
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