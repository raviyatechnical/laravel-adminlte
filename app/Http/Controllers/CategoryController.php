<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
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
        $CategoryQuery = Category::query();
        if($user->hasRole('User')){
            $CategoryQuery = $CategoryQuery->where('user_id',$user->id);
        }
        $data = $CategoryQuery->orderBy('id','DESC')->paginate(5);
        return view('category.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    public function create()
    {
        return view('category.create');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'icon' => 'required',
            'name' => 'required',
        ]);
        $user = Auth::user();
        $input = $request->all();
        $input['user_id'] = $user->id;
        $user = Category::create($input);
        return redirect()->route('category.index')
                        ->with('success','Category created successfully');
    }
    public function show($id)
    {
        $category = Category::find($id);
        return view('category.show',compact('category'));
    }
    public function edit($id)
    {
        $user = Auth::user();
        $category = Category::find($id);
        if($user->hasRole('User') && $category->user_id != $user->id){
            abort(403, 'User does not have the right permissions.');
        }
        return view('category.edit',compact('category'));
    }
 	public function update(Request $request, $id)
    {
        $this->validate($request, [
            'icon' => 'required',
            'name' => 'required',
        ]);
        $user = Auth::user();
        $input = $request->all();
        $input['user_id'] = $user->id;
        $user = Category::find($id);
        $user->update($input);
        return redirect()->route('category.index')
                        ->with('success','Category updated successfully');
    }
  	public function destroy($id)
    {
        $user = Category::findOrFail($id);
        if($user){
            $user->delete();
        }       
        return redirect()->route('category.index')
                        ->with('success','Category deleted successfully');
    }
}
