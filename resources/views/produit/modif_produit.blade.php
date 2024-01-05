<!DOCTYPE html>
<html >
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>modification produit</title>

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
          
    <div class="row  top-100 ">
        <div class="col-md-2"> 
            <div id="list-example" class="list-group">
                <a class="list-group-item list-group-item-action" href="/list_produit">Liste des produits</a>
                <a class="list-group-item list-group-item-action" href="/ajout_produit">Ajouter un nouveau produit</a>
                <a class="list-group-item list-group-item-action" href="/approvissionnement">Approvisionnement produits</a>               
            </div>
    </div>
        <div class="col-md-10">
           
                <h1 class="display-3"> modification produit </h1>
              <form action="/update" method="POST" class="w-50"> 
                
                @csrf
                @method('PUT')
                <div class="form-group">
                    <input type="hidden" name="id" id="id" value="{{$produit ->id}}">
                     <label ><h4>Designation</h4> </label>
                     <input class="form-control" type="text" name="designation" value="{{$produit -> designation}}" id="designation"/>

                </div>

                <div class="form-group">
                        <label ><h4>Prix unitaire</h4></label>
                        <input class="form-control" type="text" name="prix_u" value="{{$produit -> prix_u}}" id="prix_u"/>

                   </div>
                   
                   <div class="form-group">
                        <label ><h4> categorie</h4></label>
                            <select class="form-select" name="id_cat" id="id_cat">
                                @foreach ($categories as $categorie)
                                    <option value="{{ $categorie->id }}">{{ $categorie->libelle }}</option>
                                @endforeach
                            </select>
                   </div>
                   <br/>
                   <div>
                       <button class="btn btn-success" type="submit"> terminer</button>
                       <button class="btn btn-light"  type="reset">Annuler</button>

                   </div>
            </form>
        </div>
    </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>