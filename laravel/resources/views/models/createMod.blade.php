@extends('layouts.app')
  
@section('content')

<center>
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>New Model</h2>
        </div>
    </div>
</center>


<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __(' Create Model') }}</div>
                    <div class="card-body">
                        

                        <form action="{{ route('models.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                        
                            <div class="row">
                                
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="manufacturer">manufacturer:</label>
                                        <input type="text" name="manufacturer" class="form-control" placeholder="manufacturer ">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="model">model:</label>
                                        <input type="text" name="model" class="form-control" placeholder="model">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="file">photo_id:</label>
                                        <input type="file" name="file" class="form-control" placeholder="img ">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="category">category_id:</label>
                                        <input type="text" name="category" class="form-control" placeholder="category ">
                                    </div>
                                </div>
                                
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="price">price:</label>
                                        <input type="text" name="price" class="form-control" placeholder="price ">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">Create</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                    <a class="btn btn-primary" href="{{ route('models.index') }}">Back</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('footer') 
 
@endsection


 