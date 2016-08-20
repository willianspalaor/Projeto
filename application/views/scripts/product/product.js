
$(document).ready(function() {

  	$('.money').maskMoney();


    $(".search").keyup(function () {

        var search = $(this).val();
        var items = $('.results tbody').children('tr');

        items.each(function() {

            var tr = $(this);

            $(this).find("td.search").each(function () {

                var value = $(this).text();
                var found = (new RegExp(search, 'i')).test(value);

                if(found){
                    tr.show();
                }else{
                    tr.hide();
                }
            });

        });

    });

    $(".btn-create-product").click(function(){

        $('#create-modal').modal('show');

        $("#create-modal").modal().find(".btn-ok").on("click", function(){

            var serializedData = $('#product-add-form').serializeArray();
            var file = $('#file-selector')[0].files[0];
            var fileName = '';

            if(file !== undefined)
                fileName = file.name;

            var categories = [];
            $.each($(".selectpicker option:selected"), function(){ 
                categories.push($(this).val());
            });

            serializedData.push({name:'product_category', value:categories});
            serializedData.push({name:'product_image', value:fileName});

            var formData = new FormData();
            formData.append('file', file); 

            $.ajax({

                method: "POST",                
                url: "/product/saveFile",
                processData: false,
                contentType: false,
                cache:false,
                data: formData,
                success: function(response){

                    $.ajax({
                        type: "POST",                
                        url: "/product/createProduct",
                        data: serializedData,
                        success: function(response){
                            
                            $('#create-modal').modal('hide');
                            location.reload(); 
                        }
                    });
                }
            });

        });
       
    });

    $(".btn-update-product").click(function(){

        var id = $(this).data("id");

        $.ajax({

            method: "POST",
            url: "/product/getProduct",
            data: 'product_id=' + id,
            dataType: 'json',
            success: function(response) { 

                $('#update-modal').modal('show');
                $('#update-modal').find('input[name="product_id"]').val(response.product_id);
                $('#update-modal').find('input[name="product_tittle"]').val(response.product_tittle);
                $('#update-modal').find('input[name="stock_quantity"]').val(response.stock_quantity);
                $('#update-modal').find('input[name="product_description"]').val(response.product_description);
                $('#update-modal').find('input[name="product_price"]').val(response.product_price);
                $('#update-modal').find('input[name="product_discount"]').val(response.product_discount);
                $('#update-modal').find('input[name="product_image"]').val(response.product_image);
                $('#update-modal').find('select[name=product_category]').val(response.product_category);
                $('.selectpicker').selectpicker('refresh');


                $("#update-modal").modal().find(".btn-ok").on("click", function(){

                    var serializedData = $('#product-update-form').serializeArray();
                    var file = $('#file-selector')[0].files[0];
                    var fileName = '';

                    if(file !== undefined)
                        fileName = file.name;
                    else
                        fileName = response.product_image.match(/.*\/(.*)$/)[1];

                    var categories = [];

                    $(".selectpicker option:selected" ).each(function() {
                        categories.push($(this).val());
                    });

                    serializedData.push({name:'product_category', value:categories});
                    serializedData.push({name:'product_image', value:fileName});

                    var formData = new FormData();
                    formData.append('file', file); 
                    formData.append('id',response.product_id);

                    $.ajax({

                        method: "POST",                
                        url: "/product/saveFile",
                        processData: false,
                        contentType: false,
                        cache:false,
                        data: formData,
                        success: function(response){

                            $.ajax({
                                method: "POST",
                                url: "/product/updateProduct",
                                data: serializedData,
                                success: function(response) {
                                    
                                    $('#update-modal').modal('hide');
                                    location.reload(); 
                                }
                            });
                        }
                    });
                });
            }
        });  
    });


    $(".btn-delete-product").click(function(){

        var id = $(this).data("id");

        $('#delete-modal').modal('show');

        $("#delete-modal").modal().find(".btn-ok").on("click", function(){

            $.ajax({
                method: "POST",
                url: "/product/deleteProduct",
                data: 'product_id=' + id,
                success: function(response) {
                    $('#delete-modal').modal('hide');
                    location.reload();                
                }
            });
        });
       
    });
 
});
