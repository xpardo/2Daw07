@extends('layouts.app')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Update Files</h2>
        </div>
    </div>
</div>

<form action="{{ route('files.update', $file) }}" method="POST" enctype="multipart/form-data">
    @csrf
  
     <div class="row">
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="upload">File:</label>
                <input type="file" name="upload" class="form-control" placeholder="Enter filepath" value="{{ $file->upload }}"  >
                <img class="img-fluid" src="{{ asset("storage/{$file->filepath}") }}" />
                
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>update_at:</strong>
                <input type="date"   id="data" name="data" value="{{ $file->created_at }}"><br><br>
            </div>
        </div>
       
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Update</button>
           
            <a class="btn btn-primary" href="{{ route('files.index') }}">Back</a>
            
            <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
    </div>

   
</form>
@endsection