<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;


use function Pest\Laravel\delete;
use function Pest\Laravel\get;

class AdminController extends Controller
{
    public function view_category ()
    {
        $data = Category::all();
        return view('admin.category', compact('data'));
        
        //return view('admin.category');
    }
    public function add_category ( Request $request) 
    { 

        $category = new Category();
        $category->category_name = $request->category;

        $category->save();
        toastr()->timeOut(1000)->closeButton()->success('Category has been Added');
        return redirect()->back();
        
    }
    public function delete_category ($id)
    {
        $data = Category::findOrFail($id);

        $data -> delete();
        toastr()->timeOut(6000)->closeButton()->success('Category has been Deleted');
        return redirect()->back();
    }
    public function edit_category ($id)
    {
        $data = Category::findOrFail($id);
        return view('admin.edit_category', compact('data'));
    }
    public function update_category ( Request $request, $id)
    {
        $data = Category::findOrFail($id);

        $data->category_name = $request->category;

        $data->save();
        toastr()->timeOut(1000)->closeButton()->success('Category has been Updated');

        return redirect('/view_category');
    }

    public function add_product ()
    {
        $category = Category::all();
        return view('admin.add_product', compact('category'));
    }
    
    public function upload_product (Request $request)
    {
        $data = new Product();

        $data->title = $request->title;

        $data->description = $request->description;

        $data->price = '$' . number_format($request->input('price'), 2);

        //$data->price = $request->price;

        $data->quantity = $request->quantity;

        $data->category = $request->category;

        $image = $request->image;

        if($image)
        {
            $image_name = time().'.'. $image -> getClientOriginalExtension();

            $request->image->move('products', $image_name);

            $data->image = $image_name;
        }
        
        $data->save();
        toastr()->timeOut(1000)->closeButton()->success('Product has been Added');

        return redirect()->back();

    }

    public function view_product () 
    {
        $product = Product::paginate(4);
        return view('admin.view_product', compact('product'));
    }

    public function delete_product ($id) 
    {
        $product = Product::findOrFail($id);

        $image_path = public_path('products/'.$product->image);

        if($product->image && file_exists($image_path))
        {
            unlink($image_path);
        }

        $product->delete();
        toastr()->timeOut(6000)->closeButton()->success('Product has been Deleted');

         return redirect()->back();
    }

    public function edit_product ($slug)
    {
        $product = Product::where('slug', $slug)->get()->first();

        $category = Category::all();

        return view('admin.edit_product', compact(['product', 'category']));
    }

    public function update_product ( Request $request, $id)
    {
       $product = Product::findOrFail($id);

       $product->title = $request->title;

       $product->description = $request->description;

       $product->price = $request->price;

       $product->quantity = $request->quantity;

       $product->category = $request->category;

       $image = $request->image;

       if ($image) {
        
        $imagename = time().'.'.$image->getClientOriginalExtension();

        $request->image->move('products', $imagename);

        $product->image = $imagename;

       }
       $product->save();
       toastr()->timeOut(6000)->closeButton()->success('Product has been Updated');


       return redirect('view_product');
    }

    public function product_search ( Request $request) 
    {
        $search = $request->search;

        $product = Product::where('title', 'LIKE', '%'.$search.'%')->orWhere('category', 'LIKE', '%'.$search.'%')->paginate(3);

        return view('admin.view_product', compact('product'));

    }

    public function view_orders () 
    {
        $order = Order::all();
        
        return view('admin.order', compact('order'));

    }

    public function on_the_way ($id) 
    {
        $order = Order::findOrFail($id);

        $order->status = 'On The Way';

        $order->save();

        return redirect('/view_orders');
    }

    public function delivered ($id) 
    {
        $order = Order::findOrFail($id);

        $order->status = 'Delivered';

        $order->save();

        return redirect('/view_orders');
    }

    public function print_pdf ($id)
    {
        $data = Order::findOrFail($id);

        $pdf = Pdf::loadView('admin.invoice', compact('data'));

        return $pdf->download('invoice.pdf');   
    }

}
