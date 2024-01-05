<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <title>tableau de bord</title>
    <style>
                /* body {
                    background-color: rgb(31, 29, 29);
                    color: white; 
                }
                h1 { 
                    color: white;
                }
                .col-md-3{
                    background-color: rgb(31, 29, 29);
                    color: white; 
                }*/
                .titre_1{
                    text-align: center;
                }
                a {
                    color: black; 
                    text-decoration: none; 
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
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
          <a class="navbar-brand " href="/" ><h1 class="display-3">HOME</h1></a>
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
    <div class="row">
    <div class="col-md-1">

    </div>
        <div class="col-md-3">
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  <h3><a href="/list_categorie">gestion des categories</a>  </h3>
                  <span class="badge bg-primary rounded-pill"></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                   <h3><a href="/list_produit"> gestion des produits</a> </h3> 
                  <span class="badge bg-primary rounded-pill"></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <h3><a href="/list_vente"> gestion des ventes </a> </h3> 
                  <span class="badge bg-primary rounded-pill"></span>
                </li>
     
              </ul>
        </div>
        <div class="col-md-7">
            <div class="titre_1" >
                <h2 class="display-3">TABLEAU DE BORD </h2>
            </div>
            <div class="d1">
                montant de vente du jour :  {{$table[0]}} 
            </div>
            <div class="d1">
                produit le plus vendu : {{$table[1]}}
            </div>
            <div class="d1">
                nombre de produit vendu : {{$table[2]}}
            </div>
        </div>

    </div>

</body>
</html>