<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class RelationController extends Controller
{
/*    public function getOrders(){
       return  $orders = Customer::with('orders')->find(4);
    }*/

    public function getAll(){
         //$brand = Brand::get();
       // return $brand->products();
            $Allorders = Brand::with('products')->get();
        foreach ($Allorders as $item) {
            echo $item->products->name."<br>";

           }
/*       return  $Allorders=Customer::with(['orders'=>function ($q){
            $q->select('id','customer_id');
        }])->get();*/
    }

}
