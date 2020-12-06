@extends('layouts.admin')

@section('content')
 <!-- Content Header (Page header) -->

<!-- /.content-header -->


    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
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
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th style="width: 40px">#</th>
                    <th>Date</th>
                    <th>Number Colis</th>
                    <th>Details</th>
                    
                    <th>Colis</th>
                   
                    <th style="width: 40px">Action</th>
                  </tr>
                  </thead>
                  <tbody>

                    
                    <?php 
                    $i = 1;
                    ?>
                    @foreach ($stocks as $stock)

                  <tr>
                    <td>{{($i++)}}</td>
                    <td>{{($stock->created_at)}} </td>
                    <td>{{($stock->nbr_colis)}}</td>
                    
                    <td>
                      
                      <strong>Referance :</strong>{{($stock->reference)}} <br>
                      <strong>Type :</strong>{{($stock->type_colis)}} <br>
                      <strong>Emballage :</strong>{{($stock->emballage)}} <br>
                    
                    </td>


                    <td>
                      
                      <strong style="color: rgb(0, 4, 255)"> Réste : {{($stock->reste_colis)}} </strong> <br>
                     <strong style="color: rgb(58, 201, 29)">Sortant : {{($stock->sortant_colis)}} </strong> <br>
                     <strong style="color: red">Retour : {{($stock->retour)}} </strong><br>
                     <strong style="color: rgb(151, 153, 18)">Total sortant : {{($stock->total_colis)}} </strong><br>
                    
                    
                    </td>
                    <td class="d-flex">

                      <a href="{{ route('stock.edit', [$stock->id ]) }}" class="btn btn-sm btn-primary mr-1"> <i class="fas fa-edit"></i> </a>
                      <form action="{{ route('stock.destroy', [$stock->id]) }}" class="mr-1" method="POST">
                                  @method('DELETE')
                                     @csrf 
                              <button type="submit" class="btn btn-sm btn-danger"> <i class="fas fa-trash"></i> </button>
                         </form>
                          {{-- <a href="{{ route('stock.show', [$stock->id]) }}" class="btn btn-sm btn-success mr-1"> <i class="fas fa-eye"></i> </a> --}}
                         </td>
                  </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th style="width: 40px">#</th>
                    <th>Date</th>
                    <th>Number Colis</th>
                    <th>Details</th>
                    
                    <th>Colis</th>
                   
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