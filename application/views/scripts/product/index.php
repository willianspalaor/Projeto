<div id="main" class="container-fluid">
	<div id="top" class="row">
	    <div class="col-md-3">
	        <h2>Produtos</h2>
	    </div>
		<div class="col-md-6">
        	<div class="input-group h2">
        		<input class="search form-control" type="text" placeholder="Pesquisar produtos por título">
	            <span class="input-group-btn">
	                <button class="btn btn-primary" type="submit">
	                    <span class="glyphicon glyphicon-search"></span>
	                </button>
	            </span>
        	</div>
		</div> 
	    <div class="col-md-3">
         	<a class="btn btn-primary pull-right h2 btn-create-product" href="#" data-toggle="modal">Novo Produto</a>
	    </div>		
	</div>
 	<hr />
 	<div id="products" class="row">
		<div class="table-responsive col-md-12">
        	<table id="table-products" class="table table-striped results">
		 		<thead>
                	<tr>
                    	<th>ID</th>
	                    <th>Título</th>
	                    <th>Qtde. Estoque</th>
	                    <th>Descrição</th>
	                    <th>Valor</th>
	                    <th>Desconto</th>
	                    <th class="actions">Ações</th>
	                 </tr>
	            </thead>
            	<tbody>
	               
	            	<?php foreach($this->getProducts() as $product) : ?>

	            		<tr>
		            		<td><?php echo $product->getId();?></td>
		            		<td class="search"><?php echo $product->getTittle();?></td>
		            		<td><?php echo $this->getStockQuantity($product)?></td>
		            		<td><?php echo $product->getDescription();?></td>
		            		<td><?php echo '$' . $product->getPrice();?></td>
		            		<td><?php echo !empty($product->getDiscount()) ? '$' . $product->getDiscount() : '$0';?></td>
		            		<td class="actions">
		                        <a data-id=<?php echo $product->getId();?> class="btn btn-warning btn-xs btn-update-product" href="#" data-toggle="modal">Editar</a>
		                        <a data-id=<?php echo $product->getId();?> class="btn btn-danger btn-xs btn-delete-product"  href="#" data-toggle="modal">Excluir</a>
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
<script type="text/javascript" src="/application/views/scripts/product/product.js"></script>




