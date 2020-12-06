<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Demande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Session;


class UserController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');

        
    }
      /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       

        $users = DB::table('demandes')->join('users', 'users.id', '=', 'demandes.user_id')
        
        
        ->select('demandes.*', 'users.*')
        ->where('demandes.verification', '=', 1 )
        ->where('users.is_admin', '=', 0 )->groupBy('users.id')

        ->get();

            
            return view('admin.user.index', compact('users'));

       
 
    }
    public function AllUsers()
    {
        $users = User::select()
        ->whereRaw('is_admin = 0')->orderBy('created_at', 'DESC')->paginate(20);
            return view('admin.user.allUsers', compact('users'));

       
 
    }

       /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
       

            return view('admin.user.create' , compact('user'));
  
        
        
    }

/**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,User $user)
    {
        if($user){
            $user->delete();

            $request->session()->flash('success', 'Stock created successfully');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function addAdmin(Request $request,User $user)
    {
        $users = User::select()
        ->whereRaw('is_admin = 1')->orderBy('created_at', 'DESC')->paginate(20);
            return view('admin.user.addAdmin', compact('users'));
    }
/**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/user/register');
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
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        
        $category = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'is_admin' => 1,
            
            'password' =>Hash::make( $request->password),
        ]);



        // $data =$request->only('name','description');
        // $data['slug']=Str::slug($data['name'],'-');
    
        // $category=Category::create($data);

        
        $request->session()->flash('success', 'Admin created successfully');

        // Session::flash('success', 'Category created successfully');
        
        return redirect()->back();
    }

    

    public function last_StockUser()
    {
       

        $users = DB::table('demandes')->join('users', 'users.id', '=', 'demandes.user_id')
        
        
        ->select('demandes.*', 'users.*')
        ->where('demandes.verification', '=', 1 )
        ->where('users.is_admin', '=', 0 )->groupBy('users.id')

        ->get();

            
            return view('admin.user.last_StockUser', compact('users'));

       
 
    }
}
