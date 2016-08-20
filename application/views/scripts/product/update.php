
<div class="modal fade" id="update-modal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5><i class="fa fa-edit fa-fw"></i> Novo Produto</h5>
            </div>
            <div class="modal-body">    
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form id="product-update-form" method="post" role="form" enctype="multipart/form-data" >
                                        <input class="form-control" name="product_id" type="hidden">
                                        <div class="form-group col-md-4">
                                            <label>Título:</label>
                                            <input class="form-control" name="product_tittle" maxlength="30">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Descrição:</label>
                                            <input class="form-control" name="product_description" maxlength="100">
                                        </div> 
                                        <div class="form-group col-md-2">
                                            <label>Qtde. Estoque:</label>
                                            <input class="form-control" name="stock_quantity"> 
                                        </div>  
                                        <div class="form-group col-md-2">
                                            <label>Valor:</label>
                                            <input class="form-control money" name="product_price"> 
                                        </div>  
                                        <div class="form-group col-md-2">
                                            <label>Desconto:</label>
                                            <input class="form-control money" name="product_discount"> 
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Categoria:</label>
                                            <select class="form-control selectpicker" name="product_category" multiple>

                                               <?php foreach($this->getMainCategories() as $mainCategory) : ?>

                                                    <optgroup label=<?php echo $mainCategory->getTittle();?>>

                                                        <?php foreach($this->getSubCategories($mainCategory) as $subCategory) : ?>

                                                            <option value=<?php echo $subCategory->getId();?>><?php echo $subCategory->getTittle();?></option>

                                                        <?php endforeach; ?>

                                                    </optgroup>

                                                <?php endforeach; ?>

                                            </select>
                                        </div> 
                                        <div class="form-group col-md-2">
                                            <label>Imagem:</label>
                                            <label class="btn btn-primary" for="file-selector">
                                                <input id="file-selector" type="file" style="display:none;">Selecionar</input>
                                            </label>
                                        </div>  
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-primary btn-ok">Salvar</a>
                <a href="#" class="btn btn-default" data-dismiss="modal">Cancelar</a>
            </div>
        </div>
     </div>
</div> 

