$(document).ready( function () {
    // make_alert();
    function make_alert() {
        alert('alert maked');
        document.getElementById("xxx").innerHTML = "xxxxxxxxxx";
    }
    // document.getElementById("catagory").innerHTML = "aaaaaaaaaaaaaaaaaaa";
    load_cat();
    //load_brand();
    load_products();
    update_cart_items();

    function load_cat() {
        // document.getElementById("catagory").innerHTML =  "pre setted";

        var xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function() {
            if(this.readyState = 4 && this.status == 200)
            {
                document.getElementById("catagory").innerHTML =  this.responseText;
            }
        };

        xhttp.open("GET", '/category/load', true);
        xhttp.send();

    }


    // function load_brand() {
    //     var xhttp = new XMLHttpRequest();
    //     xhttp.onreadystatechange = function() {
    //         if(this.readyState = 4 && this.status == 200)
    //         {
    //             document.getElementById("brand").innerHTML =  this.responseText;
    //         }
    //     };
    //     xhttp.open("GET", 'action.php?load_brand=1', true);
    //     xhttp.send();
    //     //xhttp.close();
    // }
    function load_products() {
        //document.getElementById("products").innerHTML = "xxx";

        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange  = function() {
            if(this.readyState == 4 && this.status == 200) {
                document.getElementById("products").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET","/product/index", true);
        xhttp.send();

        // $.ajax({
        //     url: '/product/index',
        //     method: 'GET',
        //     data: {},
        //     success: function(result) {
        //         $('#products').html(result);
        //     }
        // });

    }

    //getting product by category
    $("#catagory").on('click', '.product_category', function(event) {
        // alert('load by catagory clicked');
        event.preventDefault();
        var id = $(this).attr('cid');
        // alert('catagory clicked id '+ id);
        $.ajax({
            url: '/category/'+id,
            method: 'get',
            data: {},
            success: function(result) {
                $('#products').html(result);
            }
        });
    });

    //getting product by Brand

    // $('#brand').on('click', '.product_brand', function(event) {
    //
    //     event.preventDefault();
    //
    //     bid = $(this).attr('bid');
    //
    //     $.ajax({
    //        url: 'action.php',
    //        method: 'post',
    //        data:{
    //           brandId: bid
    //
    //        },
    //        success: function(res) {
    //           $('#products').html(res);
    //
    //        }
    //
    //     });
    // });
    //load products from search text
    $('#search_btn').click(function(event) {
        // alert('sssss');
        event.preventDefault();
        var searchText = $('#search_text').val();
        // alert(searchText);
        if(searchText !='')
            $.ajax({
                url: 'action.php',
                method: 'post',
                data: {searchText: searchText},
                success: function(res) {
                    $('#products').html(res);
                }
            });

    });
    // //sign up button click
    // $('#sign_up_button').click(function(event) {
    //     event.preventDefault();
    //     $.ajax({
    //         url: ('make_registration.php'),
    //         method: 'post',
    //         data: $('form').serialize(),
    //         success: function(res) {
    //             $('#sign_up_msg').html(res);
    //         }
    //     });
    // });
    $('#some_button').click(function(event) {
        alert('some button clicked');
        $('#some_p').html('some button clicked');
    });
    // log in button click
    $('#login_button').click(function(event) {
        event.preventDefault();
        // alert("Login button clicked");
        var uu_email = $('#u_email').val();
        var uu_pass = $('#u_pass').val();
        // alert(u_email+','+u_pass);
        $.ajax({
            url: 'action.php',
            method:'post',
            data: {
                u_email: uu_email,
                u_pass: uu_pass,
                make_user_login:1
            },
            success: function(res) {
                // alert(res);
                if(res.indexOf('Login Success') != -1) {
                    window.location.href= "profile.php";
                }
            }
        });
    });

    //add product to cart
    $('#products').on('click', '.product',function(event) {
        //kauya
        // event.preventDefault();
        var pid = $(this).attr('pid');
        // alert('product clicked pid= '+pid);
        $.ajax({
            url: '/addtocart/'+pid,
            method: 'post',
            data: {},
            success: function(res) {
                // alert(res);
                if(res.length>0)
                    $('#action_msg').html(res);
                    // $('#xxx').html('done');
                update_cart_items();
            }
        });
    });
    // to update cart items
    function update_cart_items() {
        $.ajax({
            url: '/updatecart',
            method: 'get',
            data: {},
            success: function(res) {
                // alert(res);
                $('#cart_items').html(res);
                update_cart_items_count();
            }
        });
    }
    //to update cart items when clicked on cart.
    $('#cart_items_container').click(function(event) {
        // alert('cart container clicked');
        event.preventDefault();
        update_cart_items();
    });
    // to update cart items count
    function update_cart_items_count() {
        $.ajax({
            url: '/updatecartitemscount',
            method: 'get',
            data: {
            },
            success: function(res) {
                $('#cart_items_count').html(res);
            }
        });
    }
    //to remove item from cart
    $('#cart_items').on('click', '.remove_item_from_cart', function(event) {
        event.preventDefault();
        var id = $(this).attr('id');
        // alert('remove button clicked cart_id= '+id);
        $.ajax({
            url: '/cart/remove/'+id,
            method: 'get',
            data: {
            },
            success: function(res) {
                // alert('remove success');
                update_cart_items();
                update_cart_items_count();
            }
        });
    });
    // to load products in cart in the cart_page
    get_cart_page_item();
    function get_cart_page_item() {
        $.ajax({
            url: '/cart/checkout/loadproducts',
            method: 'get',
            data: {
            },
            success: function(res) {
                $('#cart_page_items_container').html(res);
            }
        });
    }
    //to delete a product from cart in cart page
    $('#cart_page_items_container').on('click', '.cart_page_item_delete', function(event) {
        event.preventDefault();
        var id = $(this).attr('id');
        // alert('delete button clicked id='+id);
        $.ajax({
            url: '/cart/checkout/destroy/'+id,
            method: 'get',
            data: {
            },
            success: function(res) {
                //alert('remove success');
                update_cart_items();
            }
        });
        get_cart_page_item();

    });
    //to update cart page product quantity in database
    $('#cart_page_items_container').on('click', '.cart_page_product_quantity_update', function(event) {
        event.preventDefault();
        var id = $(this).attr('id');
        var quantity = $('#quantity-'+id).val();
        // alert('id='+id+' quantity='+quantity);
        $.ajax({
            url: '/cart/checkout/'+id+'/'+quantity,
            method: 'get',
            data: {
            },
            success: function(res) {
                $('#cart_page_msg').html(res);
                get_cart_page_item();
            }
        });
    });
    //to update cart page product quantity in viewers page
    $('#cart_page_items_container').on('keyup', '.cart_page_product_quantity', function(event) {
        event.preventDefault();
        // alert('quantity keyup working');
        var id = $(this).attr('cart_id');
        // alert(id);
        var unit_price = $('#unit_price-'+id).val();
        if(unit_price==null) unit_price=0;
        var quantity = $('#quantity-'+id).val();
        if(quantity==null) quantity=0;
        var previous_price = $('#product_price-'+id).val();
        var new_price = unit_price * quantity;
        //alert('new='+new_price+' previous='+previous_price);
        var total_price = parseInt($('#cart_page_total_price').text());
        // alert('diff ='+(new_price-previous_price));
        //alert('previous_total ='+total_price);
        var new_total = total_price + ( (new_price) -(previous_price));
        //alert(new_total);
        $('#product_price-'+id).val(new_price);
        $('#cart_page_total_price').text(new_total);
    });
    // to change page
    $('#products').on('click', '#pagination_item', function(event) {
        event.preventDefault();
        var id = $(this).attr('page_no');
        // alert('clicked to change page id='+id);
        $.ajax({
            url:'action.php',
            method: 'post',
            data: {
                change_page:1,
                page_no:id
            },
            success: function(res) {
                $('#products').html(res);
            }
        });
    });

    //update user image

    $('#image').change(function () {
        // e.preventDefault();
        // this.form.submit();
        $('#submit').click();

    });


});
