
@extends('layouts.app')
 
@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Categoria') }}</div>
                    <div class="card-body">
<!------------categoria--------------->
                        <table class="table">
                            <thead>
                                <td><a  class="btn btn-primary" href="{{url("createCate")}}">Crear categoria </a></td>
                                <tr>
                                    <td scope="col">ID</td>
                                    <td scope="col">name</td>
                                 
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach ($categori as $categori)
                                        <tr>
                                    
                                            <td>{{ $categori->id }}</td>
                                            <td>{{ $categori->name }}</td>
                                        
                                        
                                          {{--   <td><a class="btn btn-warning"  href="{{ route("models.editCate", $categori) }}">edit </a></td> --}}

                                            <td> 
                                                <form action="{{ route('models.destroy',$categori) }}" method="POST">   
                                                
                                                    @csrf
                                                    @method('DELETE')      
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                
                                                </form>
                                            
                                            </td>
                                                
                                          
                                            
                                        </tr>
                            
                                @endforeach


                            </tbody>
                         
                        </table>
                    </div>
<!------------model--------------->
                        <br>
                        <div class="card-header">{{ __('Model') }}</div>
                        <div class="card-body">
                        <table class="table">
                            <thead>
                                <td><a class="btn btn-primary" href="{{url("createMod")}}">Crear model </a></td>
                                <tr>
                                    <td scope="col">ID</td>
                                    <td scope="col">manufacturer</td>
                                    <td scope="col">model</td>
                                    <td scope="col">photo_id</td> 
                                    <td scope="col">category_id</td> 
                                    <td scope="col">price</td>              
                                    <td scope="col">Created</td>
                                    <td scope="col">Updated</td>
                                </tr>
                            </thead>
                            <tbody>
        

                                @foreach ($modelo as $modelo)
                                    <tr>
                                    
                                        <td>{{ $modelo->id }}</td>
                                        <td>{{ $modelo->manufacturer }}</td>
                                        <td>{{ $modelo->model }}</td>
                                        <td>{{ $modelo->photo_id }}</td>
                                        <td>{{ $modelo->category_id }}</td>
                                        <td>{{ $modelo->price }}</td>
                                        <td>{{ $modelo->created_at }}</td>
                                        <td>{{ $modelo->updated_at }}</td>
                                        <td><a class="btn btn-warning"  href="{{ route("models.edit", $modelo) }}">edit </a></td>
                                        <td> 
                                            <form action="{{ route('models.destroy',$categori) }}" method="POST">   
                                            
                                                @csrf
                                                @method('DELETE')      
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            
                                            </form>
                                        
                                        </td>
                                    

                                    </tr>
                            
                                @endforeach
                            </tbody>
                        </table> 

                        

                    </div>
               </div>
           </div>
       </div>
   </div>
</div>
@include('footer') 
@endsection




