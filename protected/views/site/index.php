<div class="row margin-bottom-25">
	<div class="col-md-6 col-xs-6 col-xs-offset-3 col-md-offset-5">
		<a class="" href="#"><img src="<?php echo Yii::app()->themeManager->baseUrl."/"; ?>assets/img/logo-v.png" alt="Passa Ficha" class="img-responsive"></a>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<h1> Em breve... </h1>
		<h2 class="text-center"> O sistema que vai revolucionar o jeito como você envia fichas para os bancos. </h2>
	</div>
</div>
<div class="box-form-pre">
	<div class="row">
		<div class="col-md-5">                    
			<p>Não perca as novidades que estão por vir. Faça seu pré-cadastro e ganhe:</p>
			<ul class="list-unstyled padding-top-10">
				<li><i class="fa fa-check"></i> Isenção de taxa de adesão</li>
				<li><i class="fa fa-check"></i> 20 créditos iniciais</li>
				<li><i class="fa fa-check"></i> Acesso VIP a ferramenta</li>
			</ul>
		</div>
		<div class="col-md-7">
			<?php echo $this->renderPartial('//usuario/_formPreCadastro',array("model"=>$model)); ?>
			<!-- <form class="form-inline">
				<input type="email" class="form-control input-lg input-cadastro" placeholder="Digite seu email"> <button class="btn btn-primary btn-lg btn-cadastro" type="button" id="acompanhamento-pf-pre"> Pré Cadastrar </button>
			</form>   -->
			<span class="help-block small"> Seu email está protegido e não será distribuido ou fornecido a terceiros. Será usado somente para seu pré-cadastro em nosso sistema. </span> 
			<p class="share"> Compartilhe essa novidade </p>
			<ul class="social-icons text-center">
				<li><a href="javascript:void(0);" data-original-title="facebook" class="facebook"></a></li>
				<li><a href="javascript:void(0);" data-original-title="twitter" class="twitter"></a></li>
				<li><a href="javascript:void(0);" data-original-title="googleplus" class="googleplus"></a></li>
				<li><a href="javascript:void(0);" data-original-title="linkedin" class="linkedin"></a></li>
				<li><a href="javascript:void(0);" data-original-title="skype" class="skype"></a></li>
			</ul>   
			<span class="help-block"> 2015 © Passa Ficha </span>              
		</div>
	</div>
</div>