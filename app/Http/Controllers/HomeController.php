<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        $product = Products::latest()->get();
        return datatables()->of($product)->make(true);
    }

    public function home(){
        return view('home');    
    }
    
    public function create(){
        return view('create');
    }

    public function store(Request $request){
        $localStudent = new Products();
        $localStudent->product_name = $request->product_name;
        $localStudent->price = $request->price;
        $localStudent->quantity = $request->quantity;
        $localStudent->save();

        return redirect()->route('home');
    }
}