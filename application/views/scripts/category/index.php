<div id="main" class="container-fluid">
	<div id="top" class="row">
	    <div class="col-md-3">
	        <h2>Categorias</h2>
	    </div>
		<div class="col-md-6">
        	<div class="input-group h2">
            	<input class="search form-control" type="text" placeholder="Pesquisar categorias por título">
	            <span class="input-group-btn">
	                <button class="btn btn-primary">
	                    <span class="glyphicon glyphicon-search"></span>
	                </button>
	            </span>
        	</div>
		</div> 
	    <div class="col-md-3">
         	<a class="btn btn-primary pull-right h2 btn-create-category"  href="#" data-toggle="modal">Nova Categoria</a>
	    </div>		
	</div>
 	<hr />
 	<div id="categories" class="row">
		<div class="table-responsive col-md-12">
        	<table id="table-categories" class="table table-striped results">
	            <thead>
	                <tr>
	                    <th>ID</th>
	                    <th>Título</th>
	                    <th>Categoria</th>
	                    <th class="actions">Ações</th>
	                 </tr>
	            </thead>
            	<tbody>
	               
	            	<?php foreach($this->getCategories() as $category) : ?>

	            		<tr>
		            		<td><?php echo $category->getId();?></td>
		            		<td class="search"><?php echo $category->getTittle();?></td>
		            		<td><?php echo $this->getTittleParent($category->getParent());?></td>
		            		<td class="actions">
		                        <a data-id=<?php echo $category->getId();?> class="btn btn-warning btn-xs btn-update-category" href="#" data-toggle="modal">Editar</a>
		                        <a data-id=<?php echo $category->getId();?> class="btn btn-danger btn-xs btn-delete-category"  href="#" data-toggle="modal">Excluir</a>
		                  	</td>
	                  	</tr>

	            	<?php endforeach; ?>
	                
            	</tbody>
     		</table>
 		</div>
	</div>
</div> 
<div>
	<?php include_once 'create.php';?> 
	<?php include_once 'update.php';?> 
	<?php include_once 'delete.php';?> 
</div>
<script type="text/javascript" src="/application/views/scripts/category/category.js"></script>




