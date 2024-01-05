<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>gestion produit</title>

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
                                    <a class="list-group-item list-group-item-action" href="/list_produit">Liste des produits</a>
                                    <a class="list-group-item list-group-item-action" href="/ajout_produit">Ajouter un nouveau produit</a>
                                    <a class="list-group-item list-group-item-action" href="/approvissionnement">Approvisionnement produits</a>
                                    
                                   </div>
                    </div>
                    <div class="col-md-10">
        
                        <h1 class="display-3">Gestion produit</h1>
                        <br>
                            <table class="table table-striped">
                                    <thead>
                                      <tr>
                                        <th scope="col">id</th>
                                        <th scope="col">code </th>
                                        <th scope="col">designation</th>
                                        <th scope="col">prix unitaire</th>
                                        <th scope="col">quantite</th>
                                        <th scope="col">id categorie</th>
                                        <th scope="col">Action</th>

                                      </tr>
                                    </thead>
                                    <tbody>
                                       @foreach ($produits as $produit)
                                      <tr>                            
                                      <th scope="row">{{$produit->id}}</th>
                                          <td>{{$produit->code}}</td>
                                          <td>{{$produit->designation}}</td>
                                          <td>{{$produit->prix_u}} FCFA/Kg</td>
                                          <td>{{$produit->quantite}} Kg</td>
                                          <td>{{$produit->id_cat}}</td>                                       
                                          <td>
                                            <a class="btn btn-primary" href="edite_p/{{$produit->id}}">modifier</a>
                                            <a class="btn btn-danger" href="supprimer_p/{{$produit->id}}">supprimer</a>
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
