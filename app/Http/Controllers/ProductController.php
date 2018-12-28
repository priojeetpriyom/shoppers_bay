<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $products;
    public function __construct(Product $product)
    {
        $this->products = $product;
        $this->middleware('auth')->only(['create', 'destroy', 'edit', 'submit', 'store']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $products = $this->products->latest('created_at')->get(); //->paginate(2);
//        dd($products);
        return view('product.index', compact('products'))->render();


//        if(isset($_GET['load_products'])) {
            // echo "aise";
//            $page_no=1, $per_page_items = 9;
//            $start = ($page_no-1)* $per_page_items;
//            $query = "SELECT * FROM products LIMIT $start, $per_page_items";
//            $pagination_query = "SELECT * FROM products";
//            $_SESSION['last_query'] =  $pagination_query;
            //dd('boga');
            //return "boga";
//            $q_run = Product::all();
//            $q_run = Product::all()->orderby('id', 'desc')->take(5)->get();
            //dd($q_run);
//            return $q_run;
//            if($q_run->count()) {
//               // dd($q_run->count());
//                echo '
//				<div class="panel panel-info">
//				<div class="panel-heading">Products</div>
//				<div class="panel-body">
//
//			';
//
//                foreach ($q_run as $res) {
//                    // echo '
//
//
//                    // ';
//                    $id = $res['id'];
//                    $title = $res['title'];
//                    $price = $res['price'];
//                    $des = $res['description'];
//                    $image = $res['image'];
//
//                    echo "
//					<div class='col-md-4'>
//						<div class='panel panel-info'>
//							<div class='panel-heading'>$title</div>
//							<div class='panel-body'>
//								<img style='width:160px; height:250px;' src='/products/images/$image'>
//							</div>
//							<div class='panel-heading'>$ $price<button pid='$id' style='float: right;' class='product btn btn-danger btn-xs'>Add To Cart</button></div>
//						</div>
//					</div>
//
//				";
//
//
//                }
//                echo "
//					</div>
//					<div class='panel-footer'>&copy; Priojeet Priyom 2017</div>
//				</div>
//			";

                //pagination

//                $q_run->links();

//                $items_count = get_database_items_count("SELECT id FROM products", $conn);

//                echo "
//				<div>
//					<center>
//						<ul class='pagination'>
//						";
//                $pages = ceil($items_count/$per_page_items);
//                $cls_active = " class='active' ";
//                for($i=1; $i<=$pages; $i++) {
//                    echo "<li id='pagination_item' page_no='$i' ".( ($i == $page_no)? $cls_active:'' ).">
//										<a href='#'>";
//                    echo $i;
//                    echo "</a></li>";
//                }
//
//                echo"
//						</ul>
//					</center>
//				</div>
//
//				";





//            }
            //else die("Invalid Request load_products");

//        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //        dd(request()->all());
        $this->validate($request, [
            'title' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'keywords' => 'required',
            'image' => 'required|image'
        ]);

        $image = $request->file('image');
        $img_name = auth()->user()->id.time().$image->getClientOriginalName();
        $img_name = preg_replace('/\s+/', '', $img_name);
        $image->move(base_path('/public/products/images'), $img_name);


        $data = request(['title','price', 'keywords', 'category_id']);
        $data['image'] = $img_name;
        $data['user_id'] = auth()->user()->id;


        \App\Product::create($data);
//        auth()->user()->submitProduct(new Product($data));
        session()->flash('message', 'your product has been published');

        return redirect()->home();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

//    public function submit(Request $request) {
////        dd(request()->all());
//        $this->validate($request, [
//            'title' => 'required',
//            'price' => 'required|number',
//            'category_id' => 'required',
//            'keywords' => 'required',
//            'image' => 'required|image'
//        ]);
//
//        $image = $request->file('image');
//        $img_name = $image->getClientOriginalName().auth()->user()->id.time();
//        $image->move(base_path('/products/image'), $img_name);
//
//
//        $data = request(['title','price', 'keywords', 'category_id']);
//        $date['image'] = $img_name;
//
//        \App\Product::create($data);
//
//        return 0;
//    }
}
