<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class PostController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Post::latest()->paginate(5);
    
        return view('index',compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
     
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
        ]);
    
        Post::create($request->all());
     
        return redirect()->route('index')
                        ->with('success','Post created successfully.');
    }
     
    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
		 $products = Post::latest()->paginate(5);
    
        //return view('index',compact('products'))
        return view('show',compact('product'));
    } 
     
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
		//
		$post = Post::where('id', $id)->first();
		if(!$post){
			return redirect()->route('index')
                        ->with('danger','No data found');
		}
        return view('edit',compact('post'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
		
		//dd($request);
		// validate
        // read more on validation at http://laravel.com/docs/validation
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
        ]);
       // $validator = Validator::make(Input::all(), $rules);
        // store
            $post = Post::find($id);
            $post->name       = $request->name;
            $post->phone      = $request->phone;
            $post->save();

    
        return redirect()->route('index')
                        ->with('success','Product updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $client_id = $id;
      $post = Post::findorfail($id);
      $post->delete();
      return redirect()->route('index')
                        ->with('success','Data deleted successfully');
    }
}
