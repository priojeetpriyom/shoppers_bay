<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function PHPSTORM_META\type;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        return response()->json(array('data'=> "some cat"), 200);
//        return response("something");
//        echo "catag123132ory";
// return null;
//        return "something";

        echo "
			<ul class='nav nav-pills nav-stacked'>
				<li class='active'> <a href='#'><h4>Catagories</h4></a> </li>

		";
//        dd(Category::all());
        foreach (Category::all() as $res) {
            $id = $res['id'];
            $title = $res['title'];
//            $clickVal = '"'.$id.'"';
            echo "<li> <a class= 'product_category' cid='$id' href='#'>$title</a> </li> ";
        }

        echo "</ul>";

//        return null;


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = DB::table('products')
            ->where('category_id', $id)
            ->where('user_id', '!=', auth()->user()->id)
            ->get();
//        $products = $products->toArray();
//        dd(($products));
        return view('product.index', compact('products'))->render();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
