$(document).ready(function() {


    function deleteProduct(id) {
       
        $.ajax({
            type: "POST",                
            url: "/home/removeProduct",
            data: 'product_id=' + id,
            success: function(response){
                location.reload();
            }
        });   
    }

    function isArray(obj){

        if(obj.toString().indexOf(",") >= 0){
            return true;
        }

        return false;
    }


    $('.btn-ok').on("click",function(){

        var id = $(this).data("id");

        $.ajax({

            type: "POST",               
            url: "/home/finishBuy",
            data: 'product_id=' + id,
            dataType: 'json',
            success: function(response){
                
                $('#buy-modal').modal('show');  
                $('#buy-modal').find('[name="buy_total"]').text(response.buy_total); 
            }

        });

    });


    $('.btn-delete').on("click",function(){

        var id = $(this).data("id");
        deleteProduct(id);  
    });


    $('.btn-back').on("click",function(){

        window.location = '/home/index';
    });

    $('.btn-delete-all').on("click",function(){

        var id = $(this).data("id");

        if(isArray(id)){

           var products = $(this).data("id").split(',');

            $.each(products, function(key, value) {
                deleteProduct(value); 
            });

        }else{

            deleteProduct(id); 
        }   
    });


    $('li.menu').on("click", function(){

        var id_sub  = $(this).data("id-sub");
        var id_main = $(this).data("id-main");

        var data = {};
        data['main_category'] = id_main;
        data['sub_category']  = id_sub;

         $.ajax({

            type: "POST",                
            url: "/home/setCategory",
            data: data,
            success: function(response){
                window.location = '/home/index';
            }
        });
    });


	$('.product').on("click",function(){

	 	var id = $(this).data("id");
      
        $.ajax({

        	method: "POST",
            url: "/home/openProduct",
            data: 'product_id=' + id,
            dataType: 'json',
            success: function(response) {

        		$('#product-modal').modal('show');  
        		$('#product-modal').find('[name="product_tittle"]').text(response.product_tittle); 
                $('#product-modal').find('[name="product_image"]').attr('src', response.product_image); 
                $('#product-modal').find('[name="product_description"]').text(response.product_description); 
                $('#product-modal').find('[name="product_price"]').text(response.product_price);

                if(response.stock_quantity > 0)$('#product-modal').find('[name="product_stock"]').text("Em estoque");
                else $('#product-modal').find('[name="product_stock"]').text("Indisponível");

                $("#product-modal").modal().find(".btn-buy-product").on("click", function(){

                    $.ajax({
                        type: "POST",                
                        url: "/home/addProduct",
                        data: 'product_id=' + id,
                        success: function(response){
                            
                            $('#product-modal').modal('hide');
                            window.location.href = '/home/basket';
                        }
                    });

                });
            }
        });

	});
});
