<div class="wrapper" role="main">
	<div class="container-fluid">
		<div class="row">
			<form id="basket-form" method="post" role="form" >

	        	<div class="form-group col-md-12">
			    	<h3>Carrinho de Compras</h3>
			    	<hr class="basket">
			    </div>
		      	<div class="form-group col-md-8">
	                <label>Itens</label> 
	            </div> 

	            <div class="form-group col-md-2">
	            	<label>Ação</label> 
	            </div>
	            <div class="form-group col-md-12">
	            	<hr class="lowpad">
	            </div>

	            <?php if($this->hasSessionProducts()) : ?> 

		            <?php foreach($_SESSION['products'] as $product) : ?> 

			            <div class="row">
			            	<hr>
				            <div class="form-group col-md-8">
			                	<img class="basket" src=<?php echo "/public/" . $product->getImage()?> alt="">
			                	<span><?php echo $product->getTittle(); ?></span>
				        	</div>
				    
				        	<div class="form-group col-md-2">
				        		<div class="btn-group">
								  <button data-id=<?php echo $product->getId();?> type="button" class="btn btn-danger btn-delete"><i class="glyphicon glyphicon-remove"></i></button>
								</div>
				        	</div>
				        </div>

		        	<?php endforeach; ?>


		        	<?php 

		        		$products = $this->getSessionProducts();

		        	?>

		        <?php else : ?>

		        	<div class="row">
			        	<div class="form-group col-md-12">
			        		<p class="basket"> Não há produtos adicionados no carrinho. </p>
			        	</div>
		        	</div>

		    	<?php endif; ?>


		        <div class="form-group col-md-12">
		        	<hr>
	            	<div class="text-right">
	            		<br>
	            		<hr class="basket">
	            		<button type="button" class="btn btn-primary btn-back"><i class="glyphicon glyphicon-arrow-left"></i> Continuar comprando</button>
	            		<button data-id=<?php echo isset($products) ? $products : ''; ?> type="button" class="btn btn-success btn-ok"><i class="glyphicon glyphicon-ok"></i> Finalizar compra</button>
	            		<button data-id=<?php echo isset($products) ? $products : ''; ?> type="button" class="btn btn-danger btn-delete-all" href="#" data-toggle="modal"><i class="glyphicon glyphicon-remove"></i> Cancelar compra</button>
	            	</div>
	            </div>
	        </form>
		</div>
        <div>
			<?php include_once 'buy.php';?> 
		</div>
    </div>
</div>
