<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    // function __construct()
    // {
    //      $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index','show']]);
    //      $this->middleware('permission:product-create', ['only' => ['create','store']]);
    //      $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
    //      $this->middleware('permission:product-delete', ['only' => ['destroy']]);

    // }
    public function index(Request $request)
    {
        $user = Auth::user();
        $ProductQuery = Product::query();
        if($user->hasRole('User')){
            $ProductQuery = $ProductQuery->where('user_id',$user->id);
        }
        $data = $ProductQuery->orderBy('id','DESC')->paginate(5);
        return view('products.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    public function create()
    {
        $category = Category::pluck('name','id')->all();
        return view('products.create',compact('category'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'category' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $user = Auth::user();
        $input = $request->all();
        if($request->hasFile('image')){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/products'), $imageName);
        }
        $product = Product::create([
            'user_id' => $user->id,
            'image' => $imageName,
            'name' => $input['name'],
            'price' => $input['price'],
            'description' => $input['description'],
        ]);
        foreach ($input['category'] as $key => $value) {
            ProductCategory::create([
                'product_id' => $product->id,
                'category_id' => $value,
            ]);
        }
        
        
        return redirect()->route('products.index')
                        ->with('success','Product created successfully');
    }
    public function show($id)
    {
        $product = Product::find($id);
        return view('products.show',compact('product'));
    }
    public function edit($id)
    {
        $user = Auth::user();
        $product = Product::find($id);
        if($user->hasRole('User') && $product->user_id != $user->id){
            abort(403, 'User does not have the right permissions.');
        }
        $category = Category::pluck('name','id')->all();
        return view('products.edit',compact('product','category'));
    }
 	public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'category' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $user = Auth::user();
        $input = $request->all();
        if($request->hasFile('image')){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/products'), $imageName);
        }
        $product = Product::find($id);
        $productArray =[
            'user_id' => $user->id,
            'name' => $input['name'],
            'price' => $input['price'],
            'description' => $input['description'],
        ];
        
        if($request->hasFile('image')){
            $productArray['image'] = $imageName;
        }
        $product->update($productArray);
        ProductCategory::where('product_id',$product->id)->delete();
        foreach ($input['category'] as $key => $value) {
            ProductCategory::create([
                'product_id' => $product->id,
                'category_id' => $value,
            ]);
        }
        
        
        return redirect()->route('products.index')
                        ->with('success','Product updated successfully');
    }
  	public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if($product){
            $product->delete();
        }       
        return redirect()->route('products.index')
                        ->with('success','Product deleted successfully');
    }
}
