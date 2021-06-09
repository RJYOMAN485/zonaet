@extends('admin.layouts.app')

@section('content')
   
  <div class="card">
    <div class="card-body">
      <div style="display: flex;">
        <h5 class="card-title" style="left: 0;">Rajendra</h5>
        <a  href="{{route('admin.account.settings')}}" style="position:absolute;right:0;">
          <i style="font-size:30px" class="fa fa-edit"></i>
        </a>
      </div>
      <p class="card-text">{{ $admin->name }}</p>
      <p class="card-text">{{ $admin->email }}</p>
    </div>
  </div>

@endsection