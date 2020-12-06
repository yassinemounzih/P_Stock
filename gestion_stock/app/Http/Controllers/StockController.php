<?php

namespace App\Http\Controllers;
use Exception;
use App\Models\Stock;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class StockController extends Controller
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


      
        $stocks = DB::table('stocks')->join('demandes', 'demandes.id', '=', 'stocks.demande_id')
        ->join('users', 'users.id', '=', 'demandes.user_id')
        ->select('stocks.*', 'demandes.*', 'users.*')
        ->where('users.is_admin', '=', 0)
        ->orderBy('stocks.created_at', 'DESC')
        
        ->get();

            
            return view('admin.stock.index2', compact('stocks'));
           

        }else {

            $stocks = Stock::where('user_id',Auth::user()->id)->orderBy('created_at', 'DESC')->paginate(20);
            return view('vendeur.stock.index', compact('stocks'));

        }
    }

    public function getStocksDemandes($demande_id){

        $user = Auth::user();
        if($user->is_admin){

        $stocks = DB::table('stocks')->join('demandes', 'demandes.id', '=', 'stocks.demande_id')
        ->select( 'demandes.*', 'stocks.*')
        ->where('stocks.demande_id','=', $demande_id)->orderBy('stocks.created_at', 'DESC')->get();
        
        return view('admin.user.stocks', compact('stocks'));

    }else {

        $stocks = DB::table('stocks')->join('demandes', 'demandes.id', '=', 'stocks.demande_id')
        ->select( 'demandes.*', 'stocks.*')
        ->where('stocks.demande_id','=', $demande_id)
        ->where('user_id',Auth::user()->id )
        ->orderBy('stocks.created_at', 'DESC')->get();
        
        return view('vendeur.stock.index', compact('stocks'));
    }
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function show(Stock $stock)
    {
        return view('admin.stock.show', compact('stock'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function edit(Stock $stock)
    {
        $user = Auth::user();
        
        if($user->is_admin){

             return view('admin/stock/edit',compact('stock'));
        }

        else{
            return view('vendeur/stock/create',compact('stock'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stock $stock)
    {
        if(($request->reste_colis)==0){
            $request->session()->flash('error', 'Error He dont have Stock  ');
        return redirect()->back();
     
    }
         if(($request->reste_colis)<($request->sortant)){
            $request->session()->flash('error', 'Error He have in stock Just '. $request->reste_colis .' Colis');
        return redirect()->back();
     
    }
        else{ 

        try {

            DB::beginTransaction();
            $stock->type_colis = $request->type;
            $stock->is_last = 0;
            $stock->save();
            


            $stocks = Stock::create([
                
                'demande_id' => $request->demande_id,
                'type_colis' => $request->type,
                'nbr_colis' => $request->nbr,
                'reference' => $request->ref,
                'emballage' => $request->emb,
                'total_colis' => ($request->total_colis)+($request->sortant),
                'reste_colis' => ($request->reste_colis) - ($request->sortant), 
                'sortant_colis' => $request->sortant, 
                'retour' =>0, 

               
            ]);

     
          
   

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors([
                $e->getMessage()
            ]);

        }
        $request->session()->flash('success', 'Stock created successfully');
          return redirect()->route('last_StockUser' );
        }

       
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Stock $stock)
    {
        if($stock){
            $stock->delete();
            
            $request->session()->flash('success', 'One Stock deleted successfully');
            return redirect()->back();
        }
    }


    public function stockDay(Request $request,Stock $stock)
    {
        $user = Auth::user();
        if($user->is_admin){


      
        $stocks = DB::table('stocks')->join('demandes', 'demandes.id', '=', 'stocks.demande_id')
        ->join('users', 'users.id', '=', 'demandes.user_id')
        ->select('stocks.*',  'demandes.id', 'users.name')
        ->where('users.is_admin', '=', 0)
        ->whereDate('stocks.updated_at', '=',  Carbon::today())
        ->orderBy('stocks.created_at', 'DESC')->get();
      
    
            return view('admin.stock.stockDay', compact('stocks'));
           

        }else {

            $stocks = DB::table('stocks')->join('demandes', 'demandes.id', '=', 'stocks.demande_id')
            ->select('stocks.*', 'demandes.*', 'stocks.*')
            
            ->where('user_id',Auth::user()->id )
            ->whereDate('stocks.created_at', '=',  Carbon::today())
            
            ->orderBy('stocks.created_at', 'DESC')->get();
            
            return view('vendeur.stock.index', compact('stocks'));
            

        }
    }

    public function getLastStock($user_id){

        $user = Auth::user();
        if($user->is_admin){

        $stocks = DB::table('stocks')->join('demandes', 'demandes.id', '=', 'stocks.demande_id')
        ->join('users', 'users.id', '=', 'demandes.user_id')
        ->select( 'demandes.id', 'stocks.*', 'users.name')
        ->where('demandes.user_id','=', $user_id)
        ->where('stocks.is_last','=',1)
       
        ->orderBy('stocks.created_at', 'DESC')->get();
        
        return view('admin.stock.getLastStock', compact('stocks'));

    }else {

     
        
       
    }
    }

    public function edit_retour($id)
    {
        $user = Auth::user();

        
        if($user->is_admin){
            $stock = Stock::find($id);

             return view('admin/stock/retour',compact('stock'));
        }

        
    }


    public function stock_update(Request $request, $id)
    {
<<<<<<< HEAD
        if(($request->sortant_colis)==0){
            $request->session()->flash('error', 'Error He dont have at opiration in Stock  ');
=======
        if(($request->reste_colis)==($request->nbr)){
            $request->session()->flash('error', 'Error He dont have in opiration at Stock  ');
>>>>>>> 4e59abd... complet my project
        return redirect()->back();
     
    }
    $total=($request->reste_colis) + ($request->retour);
<<<<<<< HEAD
         if(($request->total_colis)<$total){
            $request->session()->flash('error', 'Error Pleas Verify Stock  Colis');
=======
         if(($request->nbr)<$total){
            $request->session()->flash('error', 'Error Please Verify Stock');
>>>>>>> 4e59abd... complet my project
        return redirect()->back();
     
    }

        $stock = Stock::find($id);
        if($stock){

        try {

            DB::beginTransaction();
            $stock->type_colis = $request->type;
            $stock->is_last = 0;
            $stock->save();
            

           

            $stocks = Stock::create([
                
                'demande_id' => $request->demande_id,
                'type_colis' => $request->type,
                'nbr_colis' => $request->nbr,
                'reference' => $request->ref,
<<<<<<< HEAD
            
                'total_colis' => $request->total_colis,
                'reste_colis' => ($request->reste_colis) + ($request->retour), 
                'sortant_colis' => ($request->sortant_colis)-($request->retour), 
=======
                'retour' => $request->retour,
            
                'total_colis' => ($request->total_colis)-($request->retour),
                'reste_colis' => ($request->reste_colis) + ($request->retour), 
                'sortant_colis' =>  0 ,

>>>>>>> 4e59abd... complet my project

               
            ]);

     
          
   

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors([
                $e->getMessage()
            ]);

        }
        $request->session()->flash('success', 'Stock created successfully');
          return redirect()->route('last_StockUser' );
        

       
   
    }
}


}
