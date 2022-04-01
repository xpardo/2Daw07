@extends('layouts.app')
  
@section('content')
  
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <img class="img-fluid" src="{{ asset("storage/{$file->filepath}") }}" />
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>updated_at:</strong>
                {{ $file->updated_at }}
            </div>
        </div>

 
        <td><a class="btn btn-primary" href="{{ route('files.index') }}">Back</a></td>
        
    </div>
@endsection