<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\User;
use FontLib\Table\Type\name;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use Session;
use Stripe;

class HomeController extends Controller
{
    public function index ()
    {
        $clients =  User::where('usertype','user')->get()->count();

        $products = Product::all()->count();

        $orders = Order::all()->count();

        $delivered = Order::where('status', 'delivered')->get()->count();

        return view('admin.index', compact('clients', 'products', 'orders', 'delivered'));
    }
    public function home ()
    {
        $product = Product::all();

        if(Auth::id())
        {
                
            $user = Auth::user();

            $userid = $user->id;

            $count = Cart::where('user_id', $userid)->count();
        }
        else
        {
            $count = '';
        }

        return view('home.index', compact('product', 'count'));
    }

    public function login_home ()
    {
        $product = Product::all();

        if(Auth::id())
        {
                
            $user = Auth::user();
 
            $userid = $user->id;
 
            $count = Cart::where('user_id', $userid)->count();
        }
        else
        {
            $count = '';
        } 

        return view('home.index', compact('product', 'count'));

    }

    public function product_details ($id)  
    {
       $product_data = Product::findOrFail($id);

       if(Auth::id())
       {
               
           $user = Auth::user();

           $userid = $user->id;

           $count = Cart::where('user_id', $userid)->count();
       }
       else
       {
           $count = '';
       }

       return view('home.product_details', compact('product_data', 'count'));
    }

    public function add_cart ($id) 
    {
        $product_id = $id;

        $user = Auth::user();

        $user_id = $user->id;

        $data = new Cart;

        $data->user_id = $user_id;

        $data->product_id = $product_id;

        $data->save();
        toastr()->timeOut(6000)->closeButton()->success('Product added to the cart successfully ');

        return redirect()->back();
    }

    public function my_cart () 
    {
        if(Auth::id())
        {
                
            $user = Auth::user();

            $userid = $user->id;

            $count = Cart::where('user_id', $userid)->count();
            
            $cart= Cart::where('user_id', $userid)->get();

        }

        return view('home.my_cart', compact('count', 'cart'));
    }

    public function remove_cart ($id) 
    {
        $data = Cart::findOrFail($id);

        $data -> delete();

        toastr()->timeOut(300)->closeButton()->success('Item removed');

        return redirect()->back();

    }
    public function confirm_order ( Request $request ) 
    {
        $name = $request->name;

        $address = $request->address;

        $phone = $request->phone;

        $userid = Auth::user()->id;

        $cart = Cart::where('user_id', $userid)->get();

        foreach ($cart as $carts) 
        {
            $order = new Order;

            $order->name = $name;

            $order->rec_address = $address;

            $order->phone = $phone;

            $order->user_id = $userid;

            $order->product_id = $carts->product_id;

            $order->save();

        }
        toastr()->timeOut(300)->closeButton()->success('Products ordered successfully');

        $cart_clear = Cart::where('user_id', $userid)->get();

        foreach($cart_clear as $remove)
        {
            $data = Cart::find($remove->id);

            $data->delete();

        }
        return redirect()->back();
         
        
    }

    public function my_orders ()
    {

                
            $user = Auth::user()->id;

            $count = Cart::where('user_id', $user)->count();

            $my_order = Order::where('user_id',$user)->get();

        return view('home.order', compact('count', 'my_order'));
    }

    //Stripe
    public function stripe($value)

    {

        return view('home.stripe', compact('value'));

    }

    public function stripePost(Request $request, $value)

    {

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

    

        Stripe\Charge::create ([

                "amount" => $value * 100,

                "currency" => "usd",

                "source" => $request->stripeToken,

                "description" => "Test payment from Successful." 

        ]);

      

        $name = Auth::user()->name;

        $phone = Auth::user()->phone;

        $address = Auth::user()->address;

        $userid = Auth::user()->id;

        $cart = Cart::where('user_id', $userid)->get();

        foreach ($cart as $carts) 
        {
            $order = new Order;

            $order->name = $name;

            $order->rec_address = $address;

            $order->phone = $phone;

            $order->user_id = $userid;

            $order->product_id = $carts->product_id;

            $order->payment_status = "Paid";

            $order->save();

        }
        toastr()->timeOut(300)->closeButton()->success('Products ordered successfully');

        $cart_clear = Cart::where('user_id', $userid)->get();

        foreach($cart_clear as $remove)
        {
            $data = Cart::find($remove->id);

            $data->delete();

        }
        return redirect('my_cart');      

    }

    public function shop ()
    {
        $product = Product::all();

        if(Auth::id())
        {
                
            $user = Auth::user();

            $userid = $user->id;

            $count = Cart::where('user_id', $userid)->count();
        }
        else
        {
            $count = '';
        }

        return view('home.shop', compact('product', 'count'));
    }

    public function why ()
    {
        $product = Product::all();

        if(Auth::id())
        {
                
            $user = Auth::user();

            $userid = $user->id;

            $count = Cart::where('user_id', $userid)->count();
        }
        else
        {
            $count = '';
        }

        return view('home.why', compact('product', 'count'));
    }

    public function testimonial ()
    {
        $product = Product::all();

        if(Auth::id())
        {
                
            $user = Auth::user();

            $userid = $user->id;

            $count = Cart::where('user_id', $userid)->count();
        }
        else
        {
            $count = '';
        }

        return view('home.testimonial', compact('product', 'count'));
    }

    public function contact ()
    {
        $product = Product::all();

        if(Auth::id())
        {
                
            $user = Auth::user();

            $userid = $user->id;

            $count = Cart::where('user_id', $userid)->count();
        }
        else
        {
            $count = '';
        }

        return view('home.contact', compact('product', 'count'));
    }

}
