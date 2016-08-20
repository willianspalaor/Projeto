
<div class="modal fade" id="product-modal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">    
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form id="product-form" method="post" role="form" enctype="multipart/form-data" >
                                        <input name="product_id" class="form-control" type="hidden">
                                        <div class="form-group col-md-4">
                                            <img name="product_image" class="img-responsive" style="margin:0 auto;" src="" alt="">
                                        </div> 
                                         <div class="form-group col-md-8">

                                            <div class="form-group col-md-12">
                                                <h3><label name="product_tittle"></label></h3>
                                                <p name="product_description"></p>
                                            </div>

                                            <div class="form-group col-md-12">
                                                <h5><b><span name="product_stock"></span></b></h5>
                                                <h4><b><span name="product_price"></span></b></h4>
                                            </div>
                                        </div> 
                                        <div class="form-group col-md-4">
                                            <div class="form-group col-md-12">
                                                <a href="#" class="btn btn-primary btn-buy-product">Comprar</a>
                                                <a href="#" class="btn btn-default" data-dismiss="modal">Cancelar</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     </div>
</div> 

