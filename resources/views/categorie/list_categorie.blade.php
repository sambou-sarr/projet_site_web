<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>liste des categorie</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <style>
            h1{
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
            <div class="row">
                    <div class="col-md-2"> 
                            <div id="list-example" class="list-group">
                                    <a class="list-group-item list-group-item-action" href="/list_categorie">Liste des categorie</a>
                                    <a class="list-group-item list-group-item-action" href="/ajout_categorie">Ajouter une nouvelle  categorie</a>                             
                                   </div>
                    </div>
                    <div class="col-md-10">
        
                        <h1 class="display-3">Gestion categorie</h1>
                        <br>
                            <table class="table table-striped">
                                    <thead>
                                      <tr>
                                        <th scope="col">id</th>
                                        <th scope="col">libelle</th>
                                        <th scope="col">Action</th>

                                      </tr>
                                    </thead>
                                    <tbody>
                                       @foreach ($categories as $categorie)
                                           
                                       
                                      <tr>                            
                                      <th scope="row">{{$categorie->id}}</th>
                                        <td>{{$categorie->libelle}}</td>                                      
                                          <td>
                                            <a class="btn btn-primary" href="/edite_c/{{$categorie->id}}">modifier</a>
                                            <a class="btn btn-danger" href="supprimer_c/{{$categorie->id}}">supprimer</a>
                                          </td>
                                        </tr> 
                                        @endforeach 
                                    </tbody>
                                  </table>
                    </div>
        
                </div>
      
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  
    </body>
</html>
