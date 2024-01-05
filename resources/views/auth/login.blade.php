<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>connexion</title>

        
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <style>
          h1{
            text-align: center;
          }
          
          .d1 {
        
        background-color: #f0f0f0; 
        color: #333; 
        padding: 10px; 
        border: 1px solid #ccc; 
        border-radius: 5px; 
        font-size: 30px; 
        text-align: center; 

        }
        .name{
                position: absolute;
                float: left;
                top: 30px;
                right: 155px;
                color: white;
            }
       .b{
        position: absolute;
        float: left;
        top: 40px;
        right: 20px;
       }  
        </style>
        
    </head>
    <body class="antialiased">
        <body class="antialiased">
          <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container-fluid">
              <a class="navbar-brand " href="/" ><h1 class="display-3"> HOME</h1></a>
              <div class="navbar-nav ms-auto mb-2 mb-lg-0">
                @auth
                <div class="name"><h3 class="display-6">{{Auth::user()->name}}</h3></div>
                <div class="b">
                    <form action="{{route('auth.logout')}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button  class="btn btn-danger">se deconnecter</button>
                    </form>
                </div>
                @endauth
                @guest
                    <a href="{{route('auth.login')}}">se connecter</a>
                @endguest
            </div>
            </div>
          </nav>
              <hr/>
              <br/>
              <br/>
              <br/>
              <br/>
            <div class="row">
                    <div class="col-md-4"> 
                          
                    </div>
                    
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="d1">
                                    <form action="/dologin" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                        <label for="email" class="form-label"><h4>Email </h4></label>
                                        <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}">
                                        <div id="emailHelp" class="form-text">
                                            @error('email')
                                            <h5>{{$message}}</h5> 
                                            @enderror
                                        </div>
                                        </div>
                                        <div class="mb-3">
                                        <label for="password" class="form-label"><h4>Mot de passe</h4></label>
                                        <input type="password" class="form-control" id="password" name="password">
                                        <div id="emailHelp" class="form-text">
                                        </div>
                                    </div>
                                       
                                        <button type="submit" class="btn btn-primary">se connecter</button>
                                        <a class="btn btn-primary" href="/ajout_user">s'inscrire  </a>
                                        
                                    </form>
                                </div>
                                </div>
                            </div>
                        </div>
                    
                    <div class="col-md-4"> 
                          
                    </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  
    </body>
</html>
