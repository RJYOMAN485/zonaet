@extends('layouts.app')

@section('content')
   
  <div class="card">
    <div class="card-body">
      @if (Session('success'))
        <span class="text-success">{{ session('success') }}</span>
      @endif
      <h5 class="card-title">Edit your account information</h5>
      <form action="{{route('auth.update.user')}}" method="post">
        @csrf
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text"  value="{{$user->name}}" class="form-control" name="name" id="name">
          @if ($errors->first('name'))
            <small class="bg-danger text-white">{{ $errors->first('name') }}</small>
          @endif
        </div>

        <div class="form-group">
          <label for="name">email</label>
          <input type="text" value="{{$user->email}}" class="form-control" name="email" id="email">
          @if ($errors->first('email'))
            <small class="bg-danger text-white">{{ $errors->first('email') }}</small>
          @endif
        </div>

        <div class="form-group">
          <label for="name">Phone</label>
          <input type="text"  class="form-control" name="phone" id="phone">
          @if ($errors->first('phone'))
            <small class="bg-danger text-white">{{ $errors->first('phone') }}</small>
          @endif
        </div>

        <div class="form-group">
          <input type="password" placeholder="password" class="form-control" name="password" id="password">
          @if ($errors->first('password'))
            <small class="bg-danger text-white">{{ $errors->first('password') }}</small>
          @endif
        </div>

        <div class="form-group">
          <input type="password" placeholder="confirm password" class="form-control" name="password_confirmation" id="password_confirmation">
          @if ($errors->first('password_confirmation'))
                    <small class="bg-danger text-white">{{ $errors->first('password_confirmation') }}</small>
          @endif
        </div>

        <button type="submit" class="btn btn-danger" name="submit">Save</button>
      </form>


    </div>
  </div>

@endsection