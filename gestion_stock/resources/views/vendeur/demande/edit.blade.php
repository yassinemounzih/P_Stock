@extends('layouts.vendeur')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Demande De Stock</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="">Home</a></li>
                    <li class="breadcrumb-item"><a href="">Demande list</a></li>
                    <li class="breadcrumb-item active">Demande De Stock</li>
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
                            <h3 class="card-title">Demande De Stock</h3>
                            <a href="" class="btn btn-primary">Go Back </a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-12 col-lg-6 offset-lg-3 col-md-8 offset-md-2">
                               
                            <form action="{{ route('demande.update' , [$demande->id]) }}" method="POST" >

                                @csrf
                                @method('PUT')
                                    <div class="card-body">
                                        @include('includes.errors')
                                        <div class="form-group">
                                            <label for="name">Type De Colis</label>
                                            <input type="text" name="type" class="form-control" id="name" value="{{$demande->type_colis}}" placeholder="Type De Colis">
                                        </div>

                                        <div class="form-group">
                                            <label for="name">Number De Colis</label>
                                            <input type="number" name="nbr" class="form-control" id="name" value="{{$demande->nbr_colis}}" placeholder="Number De Colis">
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Reference De Colis Exemple(1-10)</label>
                                            <input type="text" name="ref" class="form-control" id="name" value="{{$demande->reference}}" placeholder="Reference De Colis Exemple(1-10)">
                                        </div>

                                        <div class="form-group">
                                            <label for="description">Adress</label>
                                            <textarea name="adress" id="description" placeholder="Enter description" class="form-control" rows="4">{{$demande->adress}}</textarea>
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
