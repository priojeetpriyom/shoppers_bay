{{--//        if(isset($_GET['load_products'])) {--}}
{{--// echo "aise";--}}
{{--//            $page_no=1, $per_page_items = 9;--}}
{{--//            $start = ($page_no-1)* $per_page_items;--}}
{{--//            $query = "SELECT * FROM products LIMIT $start, $per_page_items";--}}
{{--//            $pagination_query = "SELECT * FROM products";--}}
{{--//            $_SESSION['last_query'] =  $pagination_query;--}}
{{--//dd('boga');--}}
{{--//return "boga";--}}
{{--$q_run = Product::all();--}}
{{--//            $q_run = Product::all()->orderby('id', 'desc')->take(5)->get();--}}
{{--//dd($q_run);--}}
{{--//            return $q_run;--}}
{{--if($q_run->count()) {--}}
{{--// dd($q_run->count());--}}
{{--echo '--}}
<div class="panel panel-info">
    <div class="panel-heading">Products</div>
    <div class="panel-body">
{{--        {{count($products)}}--}}
        @foreach ($products as $res)
           <?php
            $id = $res->id;
            $title = $res->title;
            $price = $res->price;
            $des = $res->description;
            $image = $res->image;
            ?>
            <div class='col-md-4'>
                <div class='panel panel-info'>
                    <div class='panel-heading'>{{$title}}</div>
                    <div class='panel-body'>
                        <img style='width:160px; height:250px;' src='/products/images/{{$image}}'>
                    </div>
                    <div class='panel-heading'>
                        $ {{$price}}
                        <button class='product btn btn-danger btn-xs' pid={{$id}} style='float: right;' >Add To Cart</button>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
    {{--<div class="panel-body">--}}
        {{--{{$products->links()}}--}}
    {{--</div>--}}
    <div class='panel-footer'>&copy; Priojeet Priyom 2017</div>
</div>



{{--//pagination--}}

{{--//                $q_run->links();--}}

{{--//                $items_count = get_database_items_count("SELECT id FROM products", $conn);--}}

{{--//                echo "--}}
{{--//				<div>--}}
    {{--//					<center>--}}
        {{--//						<ul class='pagination'>--}}
            {{--//						";--}}
            {{--//                $pages = ceil($items_count/$per_page_items);--}}
            {{--//                $cls_active = " class='active' ";--}}
            {{--//                for($i=1; $i<=$pages; $i++) {--}}
            {{--//                    echo "<li id='pagination_item' page_no='$i' ".( ($i == $page_no)? $cls_active:'' ).">--}}
            {{--//										<a href='#'>";--}}
                {{--//                    echo $i;--}}
                {{--//                    echo "</a></li>";--}}
            {{--//                }--}}
            {{--//--}}
            {{--//                echo"--}}
            {{--//						</ul>--}}
        {{--//					</center>--}}
    {{--//				</div>--}}
{{--//--}}
{{--//				";--}}





{{--}--}}
{{--//else die("Invalid Request load_products");--}}

{{--//        }--}}