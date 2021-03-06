@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">stock De Stock</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="">Home</a></li>
                    <li class="breadcrumb-item"><a href="">stock list</a></li>
                    <li class="breadcrumb-item active">stock De Stock</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="card-title">stock De Stock</h3>
                            <a href="" class="btn btn-primary">Go Back </a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-12 col-lg-6 offset-lg-3 col-md-8 offset-md-2">
                               
                            <form action="{{ route('stock_update' , [$stock->id]) }}" method="POST" >

                                @csrf
                                @method('GET')
                                    <div class="card-body">
                                        @include('includes.errors')

                                         <input type="hidden"  name="demande_id" class="form-control" id="name" value="{{$stock->demande_id}}"  >
                                         <input type="hidden"  name="nbr" class="form-control" id="name" value="{{$stock->nbr_colis}}"  >
<<<<<<< HEAD
=======
                                         <input type="hidden"  name="get_retour" class="form-control" id="name" value="{{$stock->retour}}"  >
>>>>>>> 4e59abd... complet my project
                                         <input type="hidden"  name="total_colis" class="form-control" id="name" value="{{$stock->total_colis}}"  >
                                         <input type="hidden"  name="emb" class="form-control" id="name" value="{{$stock->emballage}}"  >
                                         <input type="hidden"  name="reste_colis" class="form-control" id="name" value="{{$stock->reste_colis}}"  >
                                         <input type="hidden"  name="sortant_colis" class="form-control" id="name" value="{{$stock->sortant_colis}}"  >
                                        <div class="form-group">
                                            <label for="name">Reference De Colis Exemple(1-10)</label>
                                            <input type="text" name="ref" class="form-control" id="name" value="{{$stock->reference}}" placeholder="Reference De Colis Exemple(1-10)">
                                        </div>

                                        <div class="form-group">
                                            <label for="name">Type De Colis</label>
                                            <input type="text" name="type" class="form-control" id="name" value="{{$stock->type_colis}}" placeholder="Type De Colis">
                                        </div>

                                        <div class="form-group">
                                            <label for="name">les colis Retour</label>
                                            <input type="number" name="retour" class="form-control" id="name" value="0" placeholder="Number De Colis">
                                        </div>


                                  
                                       
                                     

                                     
                                    </div>

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-lg btn-primary text-center">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
