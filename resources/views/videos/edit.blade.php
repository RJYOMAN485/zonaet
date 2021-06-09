@extends('admin.layouts.app')

@section('content')

@if (Session('success'))
<span class="bg-success">{{ session('success') }}</span>
@endif
<form method="POST" action="{{route('videos.update',$video->id)}}" enctype="multipart/form-data">

    @method('PATCH') 
    @csrf
    
    <div class="container-fluid">
        <div class="card justify-content-center align-items-center" style="padding-bottom:500px;">
            
            <div class="p-3 mb-2 bg-danger text-white col-md-4 col-sm-6" style="background-color: #d32f2f!important; border-top-left-radius: inherit;
            border-top-right-radius: inherit;margin-top:10px; font-size: 1.25rem;">
                Update a Video
            </div>

            <div class="card-body col-md-4 col-sm-6" style="box-shadow: 0 3px 1px -2px rgb(0 0 0 / 20%), 0 2px 2px 0 rgb(0 0 0 / 14%), 0 1px 5px 0 rgb(0 0 0 / 12%);">
               

                
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" id="title" placeholder="title" value="{{ $video->title }}">
                    @if ($errors->first('title'))
                        <small class="text-danger">{{ $errors->first('title') }}</small>
                    @endif
                </div>

                <div class="form-group">
                    <label class="form-label" for="video">image</label>
                    
                    <input type="file" onchange="loadFile2(event)" name="image" value="{{ $video->image }}" class="form-control form-control-lg" id="image">
                    @if ($errors->first('image'))
                        <small class="text-danger">{{ $errors->first('image') }}</small>
                    @endif

                    <img width="150" id="output2"/>
                </div>

                <div class="form-group">
                    <label class="form-label" for="video">video</label>
                    
                    <input type="file" name="video" value="{{ $video->video }}" class="form-control form-control-lg" id="video">
                    @if ($errors->first('video'))
                        <small class="text-danger">{{ $errors->first('video') }}</small>
                    @endif

                </div>

                <div class="form-group">
                  <label for="category">category</label>
                  <input type="text" name="category" value="{{ $video->category }}" class="form-control" id="category" placeholder="title" >
                  @if ($errors->first('category'))
                      <small class="text-danger">{{ $errors->first('category') }}</small>
                  @endif
              </div>

              <div class="form-group">
                <label for="description">description</label>
                <input type="text" name="description" class="form-control" value="{{ $video->description }}" id="description" placeholder="description" >
                @if ($errors->first('description'))
                    <small class="text-danger">{{ $errors->first('description') }}</small>
                @endif
            </div>
                
               <div style="display: flex;">

                <a href="{{route('videos.index')}}" style="border:thin solid;" class="btn btn-danger">Cancel</a>

                    <div style="flex-grow: 1!important;">
                    
                    </div>


                    <button type="submit" style="background-color: #d32f2f!important; border-radius:4px;" class="btn btn-raised btn-danger"><i class="fa fa-check" aria-hidden="true"></i>
                        Update</button>


               </div>
               

            </div>
        </div>
    </div>
</form>

@endsection



