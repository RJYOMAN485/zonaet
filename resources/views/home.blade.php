
    
@extends('layouts.app')

@section('title')
    Home: Zonet Tv
@endsection

@section('content')

    <div class="row">

        @foreach( $videos as $video )


        <div class="col-md-3 col-md-2 col-sm-4 col-xs-4 pb-4">

           <a href="{{route('show',$video->id)}}" class="card text-decoration-none" style="color:inherit;cursor: pointer; text-decoration:none;">
                <img src= "{{ url($video->image) }}" width="150" height="150"  class="card-img-top w-100 mx-auto" alt="...">
                
                <div class="card-body">
                    
                    <h5 class="card-title">{{$video->title}}</h5>
                    <p style="color: rgba(0,0,0,.6);" class="card-text">{{$video->description}}</p>
    
                </div>
            </a>
 
        
        </div>

        @endforeach
    

    @endsection
    
    