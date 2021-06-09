


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

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>


    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

    
<style>

  

  .list-group-item {
    line-height: 1.2;
    font-size: 16px;
  }

  a:hover{
    opacity: 0.4;
  }

  body,html{
    height: 100%;
  }

  #video {
  padding-right: 0;
  padding-left: 0;
  margin-right: 0;
  margin-left: 0;
  }



</style>


    

  </head>
  <body>

    
    <div class="container-fluid align-items-center justify-content-center bmd-layout-container bmd-drawer-f-l">
      
      <header class="bmd-layout-header">

        <div class="navbar w-100 navbar-light bg-faded mb-4">
            <button class="navbar-toggler" type="button" data-toggle="drawer" data-target="#dw-s1">
              <span class="sr-only">Toggle drawer</span>
              <i class="material-icons">menu</i>
            </button>
           
            <div class="float-left text-truncate" style="font-size: 1.25rem;line-height: 1.5;overflow: hidden;white-space: nowrap;text-overflow: ellipsis; white-space: nowrap;">
               @yield('title')
            </div>

            <div style="flex-grow: 1!important;">
                                
            </div>

            <ul class="nav navbar-nav">

                    @if(Auth::user())

                    <!-- Default dropleft button -->
                    <div class="btn-group dropstart">
                        <a data-toggle="dropdown" dropdown-toggle aria-expanded="false">
                          <i style="color:#ccc;font-size:30px" class="fa fa-user" aria-hidden="true"></i>
                        </a>

                       

                          <div class="dropdown-menu">
                            <!-- Dropdown menu links -->
                            <a class="dropdown-item" id="drop" href="{{ route('auth.account')}}">Account</a>
                            <a class="dropdown-item" id="drop" href="{{route('auth.account.settings')}}">Account Settings</a>
                            <a class="dropdown-item" id="drop" href="{{route('auth.account.subscriptions')}}">Subscriptions</a>
                            <form method="POST" action="{{route('logoutAuth')}}">
                              @csrf
                              <button type="submit" name="submit" class="dropdown-item">Logout</button>
                            </form>
                          </div>
                      </div>

                
                    

                    @else

                      <a style='text-decoration:none;color:inherit' href="{{route('auth.login')}}">

                        <i style="font-size: 30px" class="fa fa-key nav-item"></i>
                
                      </a> 


                      @endif

              

            
            </ul>
        </div>
      </header>

      <div id="dw-s1" class="bmd-layout-drawer bg-faded collapse" style="background-color: #b71c1c!important; flex: 1 0 auto;height: calc(100vh - 50px);white-space: nowrap;text-overflow: ellipsis;  white-space: nowrap;">
          <a href="{{route('zonet.index')}}">
            <img src="{{ url('zonet.png') }}" style="max-height:64px;width:100%;" alt="">
          </a>

          <ul class="text-white" class="list-group">

            <div style="position: absolute;left: 0;">
              <a style="color: inherit" href=" {{route('zonet.index')}} " class="list-group-item"><i style="font-size:24px;" class="fa fa-home"></i>Home</a>
              <a  style="color: inherit" href="{{route('zonet.index')}}" class="list-group-item"><i style="font-size:24px;" class="fa fa-exclamation-circle" aria-hidden="true"></i>Chanchinthar</a>
              <a style="color: inherit" href="{{route('zonet.index')}}" class="list-group-item"><i style="font-size:24px;" class="fa fa-television" aria-hidden="true"></i>Zonet Originals</a>
              <a style="color: inherit" href="{{route('zonet.index')}}" class="list-group-item"><i style="font-size:24px;" class="fa fa-home" aria-hidden="true"></i>Zonet Exclusive</a>
              <a style="color: inherit" href="{{route('zonet.index')}}" class="list-group-item"><i style="font-size:24px;" class="fa fa-star" aria-hidden="true"></i>Hmaichhan</a>
              <a style="color: inherit" href="{{route('zonet.index')}}" class="list-group-item"><i style="font-size:24px;" class="fa fa-television" aria-hidden="true"></i>Zoram Kalsiam</a>
              <a style="color: inherit" href="{{route('zonet.index')}}" class="list-group-item"><i style="font-size:24px;" class="fa fa-television" aria-hidden="true"></i>Zonuni nen Thingpui</a>
              <a style="color: inherit" href="{{route('zonet.index')}}" class="list-group-item"><i style="font-size:24px;" class="fa fa-television" aria-hidden="true"></i>Lam kal</a>
              <a style="color: inherit" href="{{route('zonet.index')}}" class="list-group-item"><i style="font-size:24px;" class="fa fa-television" aria-hidden="true"></i>Miss Mizoram</a>
              <a style="color: inherit" href="{{route('zonet.index')}}" class="list-group-item"><i style="font-size:24px;" class="fa fa-television" aria-hidden="true"></i>Zonet Exclusive</a>
              <a style="color: inherit" href="{{route('zonet.index')}}" class="list-group-item"><i style="font-size:24px;" class="fa fa-television" aria-hidden="true"></i>Infotainment</a>
              <a style="color: inherit" href="{{route('zonet.index')}}" class="list-group-item"><i style="font-size:24px;" class="fa fa-television" aria-hidden="true"></i>Latest Videos</a>
              <a style="color: inherit" href="{{route('zonet.index')}}" class="list-group-item"><i style="font-size:24px;" class="fa fa-television" aria-hidden="true"></i>All Shows</a>








            </div>

          </ul>

      </div>

    
    

      <main class="container justify-content-center w-100 bmd-layout-content" style="min-width: 100%">
        {{-- tah hian style="padding-bottom: 600px;" --}}
          <div class="container-fluid" id="video" style="min-width:100%">


              

              
                @yield('content')
                
            


        
            </div>
      </main>
    </div>


	
	
	
	

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>
    @yield('footer_scripts')
  </body> 
</html>
    


