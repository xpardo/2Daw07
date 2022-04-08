
@extends('layouts.app')
 
@section('content')
    

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!

                    <a href="{{url('files')}}"><u>files</u></a>
                </div>
            </div>
        </div>
    </div>
   
    @endsection

