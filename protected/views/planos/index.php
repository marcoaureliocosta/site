<!-- BEGIN PAGE HEAD -->
  <div class="page-head">
    <!-- BEGIN PAGE TITLE -->
    <div class="page-title">
      <h1>Comprar Créditos</h1>
    </div>
    <!-- END PAGE TITLE -->
  </div>
<!-- END PAGE HEAD -->
  

  <!-- BEGIN PAGE CONTENT INNER -->
  <div class="row margin-top-10">
    <div class="col-md-12">
    	<div class="portlet light">
        <p> Selecione o(s) pacote(s) abaixo que você deseja adquirir. </p>
        <table class="table table-hover table-striped">
          <thead>
            <tr>
              <th width="10">&nbsp;  </th>
              <th> Produto </th>
              <th> Envios <button class="btn btn-xs btn-link popovers" data-container="body" data-trigger="hover" data-placement="right" data-content="Envio é o número de créditos que você possui para enviar uma ficha." data-original-title="O que é?"><i class="icon-question"></i></button> </th>
              <th> Valor unitário </th>
              <th> Valor total </th>
              <th> Economia </th>
            </tr>
          </thead>
          <tbody>
            
          	<?php $this->widget('bootstrap.widgets.BsListView',array(
			'dataProvider'=>$dataProvider,
			'summaryText'=>'',
			'itemView'=>'_view',
			)); ?>

            <tr>
              <td colspan="6">
                <p>Se você possui um cupom de desconto, informe-o no campo abaixo.</p>
              </td>
            </tr>
            <tr class="info">
              <td colspan="2" class="text-right" style="vertical-align:middle"> Cupum de desconto </td>
              <td>
                <div class="input-group">
                  <div class="input-icon">                  	
                    <input type="text" class="form-control" style="padding-left:6px;" placeholder="Insira aqui seu cupum de desconto">
                  </div>
                  <span class="input-group-btn">
                    <button type="button" class="btn dark"><i class="fa fa-check fa-fw"></i> Validar </button>
                  </span>  
                </div>              
              </td>
              <td colspan="3">&nbsp;</td>
            </tr>
          </tbody>
        </table>
        
        <div class="row text-right">							
          <div class="col-xs-12 invoice-block">
            <ul class="list-unstyled amounts">
              <li>
                <strong>Sub-total:</strong> <span id="subTotal"> --- </span>
              </li>
              <li>
                <strong>Desconto:</strong> <span> --- </span>
              </li>
              <li>
                <strong>Total:</strong> <span id="total"> --- </span>
              </li>
            </ul>
            <hr />
            </a>
            <a class="btn btn-lg green-haze hidden-print margin-bottom-5">
            Clique aqui para imprimir o boleto <i class="fa fa-barcode"></i>
            </a>
            <span class="help-block"> Ao finalizar seu pagamento você concorda e aceita com os <a href="#">Termos de Uso</a>.</span>
            <span class="help-block text-danger"> Os créditos são válidos por 12 meses. </span>
          </div>
        </div>

      </div>
    </div>
  </div>
  <!-- END PAGE CONTENT INNER -->

  <script type="text/javascript">
	$(document).ready(function(){
		calculaSubTotal();
		$( "input[type=checkbox]" ).on( "change", function(){
			calculaSubTotal();
		});
	});

	function calculaSubTotal() {
		subTotal = 0;
		$( "input[type=checkbox]" ).each(function(){
			isChecked = $(this).is(':checked');
			if(isChecked){
				valor = $(this).data('valor');
				//quantidade = $(this).data('quantidade');
				subTotal = subTotal + valor;
			}
		});
		$("#subTotal, #total").html('').html("R$ "+float2moeda(subTotal));
	}

	//recebe um valor decimal (000.00) e retorna em forma de REAL (0.00,00)
	function float2moeda(num) {
	   x = 0;
	   if(num<0) {
		  num = Math.abs(num);
		  x = 1;
	   }
	   if(isNaN(num)) num = "0";
		  cents = Math.floor((num*100+0.5)%100);

	   num = Math.floor((num*100+0.5)/100).toString();

	   if(cents < 10) cents = "0" + cents;
		  for (var i = 0; i < Math.floor((num.length-(1+i))/3); i++)
			 num = num.substring(0,num.length-(4*i+3))+'.'
				   +num.substring(num.length-(4*i+3));
	   ret = num + ',' + cents;
	   if (x == 1) ret = ' - ' + ret;return ret;

	}
  </script>