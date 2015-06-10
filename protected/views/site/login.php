<?php $this->pageTitle=Yii::app()->name . ' - Login';?>


<!-- BEGIN LOGIN FORM -->
<?php $form=$this->beginWidget('bootstrap.widgets.BsActiveForm', array(
    'id'=>'login-form',
    //'layout' => BSHtml::FORM_LAYOUT_HORIZONTAL,
    
    'enableAjaxValidation' => true,
    'enableClientValidation' => true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
    'htmlOptions'=>array('class'=>'login-form')
)); ?>
		<h3 class="form-title">Login</h3>

		<?php echo $form->errorSummary($model); ?>

		<?php //echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textFieldControlGroup($model,'username',array('class'=>'input-large', 'placeholder'=>'Usuário')); ?>
		<?php //echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordFieldControlGroup($model,'password',array('class'=>'input-large', 'placeholder'=>'Senha')); ?>

		<?php /*echo BsHtml::submitButton('Login', array(
			//'color' => BsHtml::BUTTON_COLOR_SUCCESS,
		    'class'=>' '
		));*/ ?>
		<br>
		<div class="form-actions">
			<button type="submit" class="btn btn-success uppercase"><i class="icon-lock"></i> Entrar</button>
			<!--<label class="rememberme check">
			<input type="checkbox"/>Lembrar </label>-->
			<a href="javascript:;" id="forget-password" class="forget-password">Esqueci minha senha.</a>
		</div>
		<div class="login-options">
			<h4>Ou faça o login com</h4>
			<ul class="social-icons">
				<li>
					<a class="social-icon-color facebook" data-original-title="facebook" href="#"></a>
				</li>
				<li>
					<a class="social-icon-color googleplus" data-original-title="Goole Plus" href="#"></a>
				</li>
			</ul>
		</div>
		<div class="create-account">
			<span class="lead">Não possui uma conta?</span>
	 		<span class="help-block text-success">Crie sua conta e ganhe 10 créditos.</span>
	  		<p><a href="javascript:void(0);" id="register-btn" class="uppercase btn btn-success">Criar conta</a></p>
		</div>		
        
<?php $this->endWidget(); ?>
<!-- END LOGIN FORM -->

<!-- BEGIN FORGOT PASSWORD FORM -->
<form class="forget-form" action="index.html" method="post">
	<h3>Esqueceu sua senha?</h3>
	<p class="hint">
		 Entre com o seu email para redefinir sua senha.
	</p>
	<div class="form-group">
		<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email"/>
	</div>
	<div class="form-actions">
		<button type="button" id="back-btn" class="btn btn-default">Voltar</button>
		<button type="submit" class="btn btn-success uppercase pull-right">Redefinir</button>
	</div>
</form>
<!-- END FORGOT PASSWORD FORM -->

<!-- BEGIN REGISTRATION FORM -->

<?php $form=$this->beginWidget('bootstrap.widgets.BsActiveForm', array(
    'id'=>'register-form',
    'layout' => BSHtml::FORM_LAYOUT_HORIZONTAL,
    'enableAjaxValidation' => true,
    'enableClientValidation' => true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
    'htmlOptions'=>array('class'=>'register-form')
)); ?>
	<h3>Crie sua conta</h3>
	
    <?php echo $form->emailFieldControlGroup($usuario,'email',array('maxlength'=>255,'class'=>'')); ?>

	
	<div class="form-actions text-right">
		<!--<button type="button" id="register-back-btn" class="btn btn-default">Voltar</button>-->
		<?php //$this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'Cadastrar','type' => 'success')); ?>
		<button type="submit" id="register-submit-btn" class="btn btn-success uppercase">Criar conta</button>
  		<span class="help-block text-right"> Ao criar sua conta você aceita os <a href="#">Termos de Uso</a>.</span>      
	</div>    
    <div class="login-options">
			<h4>Ou faça o login com</h4>
			<ul class="social-icons">
				<li>
					<a href="#" data-original-title="facebook" class="social-icon-color facebook"></a>
				</li>
				<li>
					<a href="#" data-original-title="Goole Plus" class="social-icon-color googleplus"></a>
				</li>
			</ul>
		</div>
    <div class="create-account">
			<span class="lead">Já possui uma conta?</span>
      <p><a href="javascript:;" id="register-back-btn" class="btn btn-link">Faça o login</a></p>
	</div>
<?php $this->endWidget(); ?>
<!-- END REGISTRATION FORM -->




<script type="text/javascript">
	/*$(document).ready(function(){
		$('#register-form').submit(function(){
			alert('resgister');
			return false;
		});

		$('#login-form').submit(function(){
			alert('login');
			return false;
		});
	});*/
</script>