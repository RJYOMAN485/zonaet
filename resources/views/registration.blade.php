


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Material Design for Bootstrap fonts and icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">

    <!-- Material Design for Bootstrap CSS -->
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    
    

  </head>
  <body>

            @if (Session('success'))
            <span class="bg-success">{{ session('success') }}</span>
            @endif
            <form method="POST" action="/registerUser">
                @csrf
                <div class="toolbar"> 
                    <a href="{{route('zonet.index')}}">
                        <img src="{{ url('zonet.png') }}" style="max-height:64px;" alt="">
                    </a>
                </div>
                <div class="container-fluid">
                    <div class="card justify-content-center align-items-center" style="padding-bottom:500px;">
                        
                        <div class="p-3 mb-2 bg-danger text-white col-md-4 col-sm-6" style="background-color: #d32f2f!important; border-top-left-radius: inherit;
                        border-top-right-radius: inherit;margin-top:10px; font-size: 1.25rem;">
                            Register your Zonet Account
                        </div>

                        <div class="card-body col-md-4 col-sm-6" style="box-shadow: 0 3px 1px -2px rgb(0 0 0 / 20%), 0 2px 2px 0 rgb(0 0 0 / 14%), 0 1px 5px 0 rgb(0 0 0 / 12%);">
                           
    			


                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" placeholder="Enter name" class="form-control" id="name" value="{{ old('name') }}">
                        @if ($errors->first('name'))
                            <small class="text-danger">{{ $errors->first('name') }}</small>
                        @endif
                    </div>
        
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="email" value="{{ old('email') }}">
                        @if ($errors->first('email'))
                            <small class="text-danger">{{ $errors->first('email') }}</small>
                        @endif
                    </div>
        
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="password">
                        @if ($errors->first('password'))
                            <small class="text-danger">{{ $errors->first('password') }}</small>
                        @endif
                    </div>
        
                    <div class="form-group">
                        <label for="password_confirmation">password Confirmation</label>
                        <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="password_confirmation">
                        @if ($errors->first('password_confirmation'))
                            <small class="text-danger">{{ $errors->first('password_confirmation') }}</small>
                        @endif
                    </div>

                    <div style=display:flex>

                        <a href="{{route('auth.login')}}" style="border:thin solid;" class="btn btn-danger">BACK TO LOGIN</a>

                        <div style="flex-grow: 1!important;">
                                
                        </div>
                    

                    <button type="submit"  class="btn btn-raised btn-danger">Register</button>
                    
                    </div>
                    
                            
            
                          
                            
                          
                           </div>
                           
    
                        </div>
                    </div>
                </div>
            </form>


	
	
	
	

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"></script>
    <script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>
    @yield('footer_scripts')
  </body> 
</html>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>


