<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Vente;
use App\Models\Ligne_de_vente;
use App\Models\Produit;
class VenteController extends Controller
{
    //
    public function listing_V(){
   
        $ventes = Vente::all();
        

        return view('vente.list_vente',compact('ventes'));
        }
    public function edite($id){
            $vente = Vente::find($id);
            $ps = Produit::all();
            
            return view ('/vente.modif_vente',compact('vente','ps'));
    }
    public function ajout_v(Request $request){

        $request->validate([
            'quantite' => ['required','integer','min:1',]

                    
        ]);
        $produit = Produit::find($request->produit);
        if ( ($produit -> quantite - $request->quantite) >= 0) {
            $vente = new Vente();
            
            $vente -> produit =$produit->designation;
            $vente -> montant =$request->quantite * $produit-> prix_u ;
            $vente -> quantite =$request->quantite;
            $vente -> id_prod = $produit ->id;
            $vente->save();
            $produit -> quantite = $produit -> quantite - $request->quantite;
            $produit -> update();
        
            $ligne_de_vente = new Ligne_de_vente();
            $ligne_de_vente -> montant =$vente -> montant;
            $ligne_de_vente -> produit =$produit->designation;
            $ligne_de_vente -> prix_u = $produit->prix_u;
            $ligne_de_vente -> quantite =$request->quantite;
            $ligne_de_vente -> id_vente = $vente ->id;
            $ligne_de_vente -> id_prod = $request->produit;
            $ligne_de_vente -> save();
        }else{

            return to_route('ajout_vente')->withErrors([
                'quantite' => "erreur ! votre stock est insuffisant "
            ])->onlyInput('quantite');
        }
       
       
      

        return redirect()->route('listing_v');
    }
    public function listing_ligne(){
        $ligne_de_ventes = Ligne_de_vente::all();

        return view('/ligne_de_vente.ligne_de_vente',compact('ligne_de_ventes'));

    }
    public function supprimer_v($id){
        $vente = Vente::find($id);
        $vente->delete();
        return redirect()->route ('listing_v');

    }
    public function update_v(Request $request){
        
        $vente = Vente::find($request->id);
        $produit =Produit::find($vente->id_prod);
        if($request->produit != null){
            $vente -> produit =$request->produit;
        }
        $vente -> montant =$request->quantite * $produit-> prix_u ;
        $vente -> quantite =$request->quantite;
        $vente -> produit = $produit->designation;
        $vente->update();
        $produit -> quantite = $produit -> quantite -( $request->quantite - $request-> quantiteold);
        $produit -> update();
        return redirect()->route('listing_v');
    }
    public function ajout_ven(){
      $produits = Produit::all();
    return view ('/vente.ajout_vente',compact('produits'));
    }
    public function donne_du_jour(){
        
         $today = new \DateTime();
         $today = $today->format('Y-m-d');
         
        
        $r1 = DB::table('ventes')->where('created_at', 'like', "$today%")->sum('montant');
        $r0 = DB::table('ventes')->selectRaw('produit, COUNT(produit) ')->groupBy('produit')->orderByDesc('COUNT(produit)')->first();
        $r3 = DB::table('ventes')->selectRaw('produit, DISTINCT ')->COUNT('produit');
       
            if($r1)
            {
                $table[0]=$r1." FCFA";
            }else{
                $table[0]="0 FCFA";
            }

            if($r0)
            {
                $r2 = $r0 ->produit;

                $table[1]=$r2;
            }else{
                $table[1]=" Aucun ";
            }

            if($r3)
            {
                $table[2]=$r3;
            }else{
                $table[2]=" 0 ";
            }

         return view('/welcome', compact('table'));
         
       }
}
