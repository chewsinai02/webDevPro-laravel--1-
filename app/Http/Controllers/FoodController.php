<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use DB;

class FoodController extends Controller
{
    public function add(){
        $r=request();
        if($r->file('foodImage')!=''){
            $image=$r->file('foodImage');
            $image->move('images',$image->getClientOriginalName()); 
            $foodImage=$image->getClientOriginalName();
                }
                else{
                    $foodImage = 'empty.jpg';
                }
        $add=Food::create([
            'foodName' => $r -> foodName,
            'description' => $r -> description,
            'foodPrice' => $r -> foodPrice,
            'quantity' => $r -> quantity,
            'categoryName' => $r ->categoryName,
            'foodImage' => $foodImage,
        ]);
        return back();
    }

    public function view(){
        $viewFood=Food::all();
        return view('shopNow')->with('foods',$viewFood);
    }

    public function drinks() {
        $viewAll = Food::all()->where('categoryName',value("1"));
        return view('drinks')->with('foods',$viewAll);
    }

    public function snacks() {
        $viewAll = Food::all()->where('categoryName',value("2"));
        return view('snacks')->with('foods',$viewAll);
    }

    public function chocolate() {
        $viewAll = Food::all()->where('categoryName',value("3"));
        return view('chocolate')->with('foods',$viewAll);
    }

    public function noodle() {
        $viewAll = Food::all()->where('categoryName',value("4"));
        return view('noodle')->with('foods',$viewAll);
    }

    public function search(){
        $r=request();
        $keyword=$r->keyword;
        $food=DB::table('food')->where('foodName','like','%'.$keyword.'%')->get();
        return view('shopNow')->with('foods',$food);
    }
}
