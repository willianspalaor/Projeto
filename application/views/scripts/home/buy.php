<div class="row">
	<div class="modal fade" id="buy-modal" role="dialog">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal">&times;</button>
	            </div>
	            <div class="modal-body">
	            	<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">

	            		<div class+"row">
		            		<div class="form-group col-md-12">
						    	<h3>Finalizar Compra</h3>
						    	<hr class="basket">
						    </div>
					      	<div class="form-group col-md-4">
				                <label>Total</label> 
				            </div> 
				            <div class="form-group col-md-4">
				                <label>Fatura</label> 
				            </div> 
				            <div class="form-group col-md-4">
				                <label>Comprar</label> 
				            </div> 
				            <div class="form-group col-md-12">
				            	<hr class="lowpad" />
				            </div>
				        </div>
				        <div class="row">
				            <div class="form-group col-md-4">
				                <label class="buy" name="buy_total"></label>
				            </div> 
				            <div class="form-group col-md-4">
				                  <a href="/home/printInvoice" class="btn btn-primary btn-print">Imprimir Fatura</a>
				            </div>
			            	<div class="form-group col-md-4">
						        <input type="hidden" name="cmd" value="_xclick" />
						        <input type="hidden" name="business" value="e-maildacontadopaypal" />
						        <input type="hidden" name="lc" value="BR" />
						        <input type="hidden" name="item_name" value="Nome do produto" />
						        <input type="hidden" name="amount" value="Valor" />
						        <input type="hidden" name="currency_code" value="BRL" />
						        <input type="hidden" name="no_shipping" value="1" />
						        <input type="hidden" name="return" value="página de retorno" />
						        <input type="hidden" name="notify_url" value="página de notificação de alteração de status" />
						        <input type="hidden" name="cancel_return" value="página de cancelado" />
						        <input type="hidden" name="rm" value="0" />
						        <input type="hidden" name="cbt" value="Voltar para Minha página" />
						        <input type="image" src="https://www.paypalobjects.com/pt_BR/BR/i/btn/btn_buynowCC_LG.gif" border="0" class="left" name="submit" alt="PayPal - A maneira mais fácil e segura de efetuar pagamentos online!">
						        <div class="text-left"><img alt="" border="0" src="https://www.paypalobjects.com/pt_BR/i/scr/pixel.gif" width="1" height="1" /></div>
						</div>
					</div>
					</form>
	            </div>
	        </div>
	     </div>
	</div> 
</div>