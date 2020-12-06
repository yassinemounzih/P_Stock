<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\Stock;
use App\Models\Demande;

use Illuminate\Http\Request;



use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DemandeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if($user->is_admin){

           
            $demandesA = DB::table('demandes')->join('users', 'users.id', '=', 'demandes.user_id')
    ->select( 'demandes.*',  'users.name')
    ->where('demandes.verification','=',0 )
    
    ->orderBy('demandes.created_at', 'DESC')
    ->get();
      
        return view('admin.demande.index', compact('demandesA'));
     
      
      
        }else {

            $demandes = DB::table('demandes')->join('users', 'users.id', '=', 'demandes.user_id')
            ->select( 'demandes.*',  'users.name')
            ->where('demandes.verification','=',0 )
            ->where('user_id',Auth::user()->id)
            ->orderBy('demandes.created_at', 'DESC')
            ->get();

           
            return view('vendeur.demande.index', compact('demandes'));

        }
       
    }


public function getDemandesUser($user_id){
    $demandes = DB::table('demandes')->join('users', 'users.id', '=', 'demandes.user_id')
    ->select( 'demandes.*', 'users.name')
    ->where('demandes.verification','=',1 )
    ->where('demandes.user_id','=',$user_id)
    ->orderBy('demandes.created_at', 'DESC')
   
    ->get();
    return view('admin.user.index2', compact('demandes'));
}

public function getDemande(){

    $demandes = DB::table('demandes')->join('users', 'users.id', '=', 'demandes.user_id')
    ->select( 'demandes.*', 'users.name')
    ->where('demandes.verification','=',1 )
    ->where('user_id',Auth::user()->id )
    ->orderBy('demandes.created_at', 'DESC')
    ->get();
    
    return view('vendeur.demande.index2', compact('demandes'));
}


public function verification(){

    $user = Auth::user();
    if($user->is_admin){

    $demandesA = DB::table('demandes')->join('users', 'users.id', '=', 'demandes.user_id')
    ->select( 'demandes.*',  'users.name')
    
    ->where('demandes.verification','=',1 )
    ->orderBy('demandes.created_at', 'DESC')

    ->get();

    return view('admin.demande.verification', compact('demandesA'));

}else {

    $demandes = DB::table('demandes')->join('users', 'users.id', '=', 'demandes.user_id')
    ->select( 'demandes.*',  'users.name')
    ->where('demandes.verification','=',1 )
    
    ->where('user_id',Auth::user()->id)
    ->orderBy('created_at', 'DESC')
    ->get();

    return view('vendeur.demande.verification', compact('demandes'));

}

      
      
}








    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        $user = Auth::user();
        
        if($user->is_admin){

           return view('admin/demande/create');
        }

        else{
            return view('vendeur/demande/create');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'type' => 'required',
            'nbr' => 'required',
            'ref' => 'required',
           
            'adress' => 'required',

        ]);
        
        $demande = Demande::create([
            'type_colis' => $request->type,
            'nbr_colis' => $request->nbr,
            'reference' => $request->ref,
        
            'adress' => $request->adress,
            'user_id'=>Auth::user()->id,

        ]);



        // $data =$request->only('name','description');
        // $data['slug']=Str::slug($data['name'],'-');
    
        // $demande=demande::create($data);

        
        $request->session()->flash('success', 'Demande created successfully');

        // Session::flash('success', 'demande created successfully');
        
        return redirect()->route('demandeV.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function show(Demande $demande)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function edit(Demande $demande)
    {
        $user = Auth::user();
        
        if($user->is_admin){

            return view('admin.demande.edit',compact('demande'));
        }

        else{
            return view('vendeur.demande.edit',compact('demande'));
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Stock $stock   , Demande $demande)
    {
        
        $user = Auth::user();
        
        if($user->is_admin){ 

        try {

            DB::beginTransaction();
            $demande->type_colis = $request->type;
            $demande->nbr_colis = $request->nbr;
            $demande->reference = $request->ref;
            
            $demande->verification = 1;
            
         
            $demande->save();
    
            $stocks = Stock::create([
                
                
                'demande_id'=>$demande->id,
                'type_colis' => $request->type,
                'nbr_colis' => $request->nbr,
                'reference' => $request->ref,
               
           


                'total_colis' => 0,
<<<<<<< HEAD
                'reste_colis' => ($request->nbr) - ($request->sortant), 
=======
                'reste_colis' => $request->nbr,
>>>>>>> 4e59abd... complet my project
                'sortant_colis' => 0, 

            ]);

          

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors([
                $e->getMessage()
            ]);
        }
   
        $request->session()->flash('success', 'Stock created successfully');
        return redirect()->route('AllUsers');
    
    
    } else{

        $demande->type_colis = $request->type;
        $demande->nbr_colis = $request->nbr;
        $demande->reference = $request->ref;
      
        $demande->adress = $request->adress;
     
        $demande->save();

        $request->session()->flash('success', 'demande Upadeteds successfully');
        return   redirect()->route('demandeV.index');
    }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Demande $demande)
    {
        if($demande){
            $demande->delete();
            
            $request->session()->flash('success', 'demande deleted successfully');
            return redirect()->back();

        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addStock(Request $request )
    {
        try {

            DB::beginTransaction();

            $this->validate($request, [
                'type' => 'required',
                'nbr' => 'required',
                'ref' => 'required',
               
                
    
            ]);
            
            $demande = Demande::create([
                'type_colis' => $request->type,
                'nbr_colis' => $request->nbr,
                'reference' => $request->ref,
             
                'verification' => 1,

                
                'user_id'=>$request->user,
    
            ]);
    
            $stocks = Stock::create([
                
                
                'demande_id'=>$demande->id,
                'type_colis' => $request->type,
                'nbr_colis' => $request->nbr,
                'reference' => $request->ref,
                
           


                'total_colis' => 0,
                'reste_colis' => $request->nbr, 
                

            ]);

          

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors([
                $e->getMessage()
            ]);
        }
   
        $request->session()->flash('success', 'Stock created successfully');
        return redirect()->back();
    }


}
