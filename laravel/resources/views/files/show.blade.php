@extends('layouts.app')
  
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('files.index') }}">Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <img class="img-fluid" src="{{ asset("storage/{$file->filepath}") }}" />
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>created_at:</strong>
                {{ $file->created_at }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>updated_at:</strong>
                {{ $file->updated_at }}
            </div>
        </div>

        <td><a class="btn btn-warning"  href="{{ route("files.edit", $file) }}">edit </a></td>
        <td><a class="btn btn-danger" href="{{ route("files.destroy", $file->id) }}">delete </a></td>
        
    </div>
@endsection