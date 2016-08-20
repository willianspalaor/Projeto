
<div class="modal fade" id="create-modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5><i class="fa fa-edit fa-fw"></i> Nova Categoria</h5>
            </div>
            <div class="modal-body">    
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form id="category-add-form" method="post" role="form">
                                        <div class="form-group col-md-6">
                                            <label>Título</label>
                                            <input class="form-control" name="category_tittle">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Categoria</label>
                                            <select class="form-control" name="category_parent">
                                                <option></option>

                                                <?php foreach($this->getMainCategories() as $mainCategory) : ?>

                                                    <option value=<?php echo $mainCategory->getId();?>><?php echo $mainCategory->getTittle();?></option>

                                                <?php endforeach; ?>

                                            </select>
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

