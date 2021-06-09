@extends('admin.layouts.app')

@section('content')

      <div class="container-fluid mt-4" id="video" style="min-width:100%">

        <a class="btn btn-lg btn-raised btn-danger" href="{{route('videos.create')}}"><i class="fa fa-plus" aria-hidden="true"></i>
          Add new</a>

          
        <div class="row">



          @foreach( $videos as $video )

          



              <div class="col-md-3 col-md-2 col-sm-4 col-xs-4 pb-4">

                <div  class="card" style="color:inherit;cursor: pointer; text-decoration:none;">
                      <img src= "{{ url($video->image) }}" width="150" height="150" class="card-img-top w-100 mx-auto" alt="...">
                      
                      <div class="card-body">
                          
                          <h5 class="card-title">{{$video->title}}</h5>
                          <p style="color: rgba(0,0,0,.6);" class="card-text">{{$video->description}}</p>
          
                      </div>


                      <div style="display: flex; font-size:32px;">
                          <a href="{{route('videos.edit',$video->id)}}">
                            <i style="color:grey" class="fa fa-edit"></i>
                          </a>
                          
                         
                        
                            <form action="{{ route('videos.destroy', $video->id) }}" method="POST">

                                @csrf

                                @method('DELETE')

                                
                                  <button style="border: none; background:none;" type="submit"><i style="color: red" class="fa fa-trash" aria-hidden="true"></i></button>
                                
                            </form>

                      </div>
                      
                    </div>

              
              </div>
          

          @endforeach
        </div>
          
            
            
        



      </div>


@endsection
  

        
          
      

    

	
	
	
	

   
