<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pizza;
use App\Customer;
use App\Order;
use Illuminate\Support\Facades\DB;


class PizzaHomeController extends Controller
{
    public function index()
    {
        return Pizza::all();
    }

    public function store(Request $request)
    {
        return Pizza::create($request->all());
    }

    public function PlaceOrder(Request $request)
    {
        DB::beginTransaction(); 

       try{
            $customer = new Customer([
            'fname' => $request->input('fname'),
            'lname' => $request->input('lname'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'address1' => $request->input('address1'),
            'city' => $request->input('city'),
            'state' => $request->input('state'),
            'zip' => $request->input('zip')
            ]);

            $customer->save();

            $order = new Order([
                'customer_id' => $customer->id
            ]);

            $order->save();

            $pizza = $request->input('pizza');
            
            foreach($pizza as $item) { 
                //Save extra columns in Pivot table
                $order->Pizza()->attach((int)$item['pizza_id'],['quantity' => $item['quantity'], 'total_price' => $item['total_price']]);            
            }
            DB::commit();
        }
        catch(Exception $e)
        {
            DB::rollback();
            throw $e;
        }
        

        return response('The resource is created successfully!',200)->header('Content-Type', 'text/html');
    }

    public function GetOrderHistory()
    { 
        //Return all data from many to many relational table       
        $order = Order::with('Customer','Pizza')->get();

        return $order;        
    }


}
