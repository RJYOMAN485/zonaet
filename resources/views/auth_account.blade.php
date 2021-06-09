@extends('layouts.app')

@section('content')
   
  <div class="card">
    <div class="card-body">
      <div style="display: flex;">
        <h5 class="card-title" style="left: 0;">Rajendra</h5>
        <a  href="{{route('auth.account.settings')}}" style="position:absolute;right:0;">
          <i style="font-size:30px" class="fa fa-edit"></i>
        </a>
      </div>
      <p class="card-text">8258865517</p>
      <p class="card-text">rjxtri485@gmail.com</p>
    </div>
  </div>

@endsection