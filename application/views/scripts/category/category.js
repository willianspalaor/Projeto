
$(document).ready(function() {


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


    function checkResponse(response) {

        if(response == '23000'){
            alert("Esta categoria não pode ser excluida pois há um produto vinculado a ela.");
        }
    }

    $(".btn-create-category").click(function(){

        $('#create-modal').modal('show');

        $("#create-modal").modal().find(".btn-ok").on("click", function(){

            var serializedData = $('#category-add-form').serializeArray();

            $.ajax({
                method: "POST",
                url: "/category/createCategory",
                data: serializedData,
                success: function(response) {
                    
                    $('#create-modal').modal('hide');
                    location.reload(); 
                }
            });

        });
       
    });


    $(".btn-update-category").click(function(){

        var id = $(this).data("id");

        $.ajax({

            method: "POST",
            url: "/category/getCategory",
            data: 'category_id=' + id,
            dataType: 'json',
            success: function(response) { 

                $('#update-modal').modal('show');
                $('#update-modal').find('input[name="category_id"]').val(response.category_id);
                $('#update-modal').find('input[name="category_tittle"]').val(response.category_tittle);
                $('#update-modal').find('select[name="category_parent"]').val(response.category_parent);

                $("#update-modal").modal().find(".btn-ok").on("click", function(){

                    var serializedData = $('#category-update-form').serializeArray();
                    $.ajax({
                        method: "POST",
                        url: "/category/updateCategory",
                        data: serializedData,
                        success: function(response) {
                            
                            $('#update-modal').modal('hide');
                            location.reload(); 
                        }
                    });
                });
            }
        });  
    });


    $(".btn-delete-category").click(function(){

        var id = $(this).data("id");

        $('#delete-modal').modal('show');

        $("#delete-modal").modal().find(".btn-ok").on("click", function(){

            $.ajax({
                method: "POST",
                url: "/category/deleteCategory",
                data: 'category_id=' + id,
                success: function(response) { 

                    checkResponse(response);
                    $('#delete-modal').modal('hide');
                    location.reload();                
                }
            });
        });
       
    });
    
});
