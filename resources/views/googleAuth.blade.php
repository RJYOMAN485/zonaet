@extends('layouts.app')

@section('section')

  <div class="col-md-12 row-block">
    <a href="{{ url('auth/google') }}" class="btn btn-lg btn-primary btn-block">
    <strong>Login With Google</strong>
    </a> 
  </div>

@endsection