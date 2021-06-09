


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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    
<script>

  var loadFile = function(event) {
    var output = window.document.getElementById('output')
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
   
  };

  var loadFile2 = function(event) {
    var output = window.document.getElementById('output2')
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
   
  };

 
    
  

  </script>
  


  </head>
  <body>



<main class="container justify-content-center bg-light" style="min-width: 100%;min-height: 100vh;">




    <div class="navbar w-100 navbar-light bg-faded mb-4">
        

          <div class="toolbar"> 
            <a href="{{route('videos.index')}}">
                <img src="{{ url('zonet.png') }}" style="max-height:64px;" alt="">
            </a>
          </div>

        <div class="float-left col-8 text-truncate" style="font-size: 1.25rem;line-height: 1.5;overflow: hidden;white-space: nowrap;text-overflow: ellipsis; white-space: nowrap;">
           Admin Panel
        </div>

        <div style="flex-grow: 1!important;">
                            
        </div>

        

          <ul class="nav navbar-nav">

                @if(Auth::guard('admin')->check())

                  <!-- Default dropleft button -->
                  <div class="btn-group dropstart">
                      <a data-toggle="dropdown" dropdown-toggle aria-expanded="false">
                        <i style="color:#ccc;font-size:30px" class="fa fa-user" aria-hidden="true"></i>
                      </a>

                    

                        <div class="dropdown-menu">
                          <!-- Dropdown menu links -->
                          <a class="dropdown-item" id="drop" href="{{route('admin.account')}}">Account</a>
                          <a class="dropdown-item" id="drop" href="{{route('admin.account.settings')}}">Account Settings</a>
                          <a class="dropdown-item" id="drop" href="{{route('user.subscriptions')}}">All Subscriptions</a>
                          <form method="POST" action="{{route('adminLogoutAuth')}}">
                            @csrf
                            <button type="submit" name="submit" class="dropdown-item">Logout</button>
                          </form>
                        </div>
                    </div>

                @endif

            

          
          </ul>
      
    </div>
  



        {{-- tah hian style="padding-bottom: 600px;" --}}
          <div class="container-fluid mt-4" id="video" style="min-width:100%">

            @yield('content')
            
        
          </div>
    </main>

    

	
	
	
	

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


