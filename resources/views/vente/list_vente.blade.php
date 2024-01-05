<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>liste des ventes</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
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
                                    <a class="list-group-item list-group-item-action" href="/list_vente">Liste des ventes</a>
                                    <a class="list-group-item list-group-item-action" href="/ajout_vente">Ajouter une vente</a>              
                                    <a class="list-group-item list-group-item-action" href="/ligne_de_vente">ligne de vente</a>
                                  </div>
                    </div>
                    <div class="col-md-10">
        
                        <h1 class="display-3">Gestion vente</h1>
                        <br>
                            <table class="table table-striped">
                                    <thead>
                                      <tr>
                                        <th scope="col">id</th>
                                        <th scope="col">montant</th>
                                        <th scope="col">date</th>
                                        <th scope="col">action</th>
                                      </tr>
                                    </thead>
                                    <tbody> 
                                      @foreach ($ventes as $vente)
                                          
                                     
                                      <tr>                            
                                      <th scope="row">{{$vente->id}}</th>
                                          <td>{{$vente->montant}} FCFA</td>   
                                          <td>{{$vente->created_at}}</td>                                     
                                          <td>
                                            <a class="btn btn-primary" href="edite_v/{{$vente->id}}">modifier</a>
                                            <a class="btn btn-danger" href="supprimer_v/{{$vente->id}}">supprimer</a>
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
