@extends('layouts.app')
  
@section('content')

<center>
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Update Models</h2>
        </div>
    </div>
</center>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __(' Create Models') }}</div>
                    <div class="card-body">
                        <form action="{{ route('models.update', $categori) }}" method="POST" enctype="multipart/form-data">

                            @csrf
                            @method('PUT')
                        
                            
                            <div class="row">
                                
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="name">name:</label>
                                        <input type="text" name="name" class="form-control" placeholder="name "   {{ $categori->name }}>
                                    </div>
                                </div>
                              
                            
                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a class="btn btn-primary" href="{{ route('Models.index') }}">Back</a>
                                    
                                    <button type="reset" class="btn btn-secondary">Reset</button>
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