
  @extends('layouts.app')

  @section('title')
    {{$video->title}} - {{$video->description}} : Zonet Tv
  @endsection

  @section('content')

  <div class="container-fluid" id="video">
    @if($sub == null)
      <div class="">
        <div class="alert alert-primary w-100" style="text-decoration:none;color:white; min-width:100%; background-color:#2196f3; border-radius: 4px;" role="alert">
            <i class="fa fa-info-circle" aria-hidden="true"> </i>
                Please check your subscription. You need to have an active subscription to view this video
        </div>
      </div>
    @endif
    

    <div class="card" style="padding:30px;background-color:@if($sub != null) '' @else rgb(33, 33, 33);opacity:1;@endif">
          
        @if($sub == null)
            
            <img src= "{{ url($video->image) }}" class="card-img-top mx-auto" style="width: 80%;opacity:0.8" alt="...">

        @elseif ($sub->status == 'expired')
                <div class="alert alert-primary" style="text-decoration:none;color:white;background-color:#2196f3; border-radius: 4px;" role="alert">
                    <i class="fa fa-info-circle" aria-hidden="true"> </i>
                        Your subscription is expired
                </div>
                <img src= "{{ url($video->image) }}" class="card-img-top mx-auto" alt="...">
        @else   

            <div class="mt-4">
                <video width="100%"  controls>
                    <source src="{{ url($video->video) }}" alt="" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        @endif

       
        
            
        
    </div>

    <div class="card-body">
        <h3 class="card-title"> {{$video->title}} </h3>
            <p class="card-text">{{$video->description}}</p>

    </div>

  </div>
  


    

    
    

  @endsection


    






