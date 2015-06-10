<?php

/**
 * This is the model class for table "usuario".
 *
 * The followings are the available columns in table 'usuario':
 * @property integer $idusuario
 * @property integer $tipoUsuario
 * @property integer $tipoPessoa
 * @property string $cpf
 * @property string $cnpj
 * @property integer $inscricaoEstadual
 * @property string $nomeFantasia
 * @property string $razaoSocial
 * @property string $email
 * @property string $senha
 * @property integer $status
 * @property integer $usuario_idempresa
 * @property string $telefone1
 * @property string $telefone3
 * @property string $url
 * @property string $cep
 * @property string $endereco
 * @property integer $numero
 * @property string $complemento
 * @property string $bairro
 * @property string $cidade
 * @property string $estado
 * @property string $pais
 * @property string $nacionalidade
 * @property string $cpfDataEmissao
 * @property string $rg
 * @property string $rgDataEmissao
 * @property string $rgDataVencimento
 * @property string $rgUfEmissor
 * @property string $naturalidade
 * @property string $naturalidadeUf
 * @property string $dataNascimento
 * @property integer $estadoCivil
 * @property integer $sexo
 * @property string $nomePai
 * @property string $nomeMae
 * @property string $escolaridade
 * @property integer $dependentes
 * @property integer $deficienteFisico
 */
class Usuario extends CActiveRecord
{
	
	public $senhaConfirm;
	public $senhaNova;

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Usuario the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'usuario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('email', 'required'),
			array('tipoUsuario, tipoPessoa, inscricaoEstadual, status, usuario_idempresa, numero, estadoCivil, sexo, dependentes, deficienteFisico', 'numerical', 'integerOnly'=>true),
			array('cpf, telefone3,telefone1', 'length', 'max'=>14),
			array('cnpj', 'length', 'max'=>18),
			array('nome, nomeFantasia, razaoSocial, email, emailNfe, senha, , url, endereco, complemento, bairro, cidade, naturalidade, nomePai, nomeMae', 'length', 'max'=>255),
			array('cep', 'length', 'max'=>9),
			array('estado, pais, nacionalidade, rg, rgDataEmissao, escolaridade', 'length', 'max'=>45),
			array('rgUfEmissor, naturalidadeUf', 'length', 'max'=>2),
			array('cpfDataEmissao, rgDataVencimento, dataNascimento', 'safe'),

			array('email, emailNfe', 'email','checkMX'=>true,'message'=>'Informe um email válido.'),
			array('email','unique','className'=>'Usuario','message'=>'Email já cadastrado!'),

			array('url', 'url', 'defaultScheme' => 'http','message'=>'Informe uma URL válida.'),

			array('email', 'required','on'=>array('precadastro')),

			//Meus Dados
			array('nome,senha,email', 'required','on'=>array('meusDados')),
			array('email','unique','className'=>'Usuario','message'=>'Email já cadastrado!','on'=>array('meusDados')),
			array('senhaNova,senhaConfirm,senha', 'length', 'max'=>50,'min'=>6,'tooShort'=>'A {attribute} deve ter pelo menos {min} digitos.','tooLong'=>'A {attribute} deve ter no máximo {max} digitos.','on'=>array('meusDados')),		
			array('senhaConfirm', 'compare', 'compareAttribute' => 'senhaNova','message'=>'A confirmação de senha não confere.','on'=>array('meusDados')),
			array('senha', 'length', 'max'=>100,'min'=>6,'tooShort'=>'A {attribute} deve ter pelo menos {min} digitos.','tooLong'=>'A {attribute} deve ter no máximo {max} digitos.','on'=>array('passwordReset')),	
			
			//array('avatar', 'file', 'types'=>'jpg, gif, png','on'=>array('meusDados')),

			//DadosFaturamento
			array('cep, endereco, numero, bairro, cidade, estado, pais, inscricaoEstadual,emailNfe, cnpj, razaoSocial', 'required','on'=>array('dadosFaturamento')),
			

			//Configurações > Usuarios. ajaxCreate
			array('nome,email', 'required','on'=>array('ajaxCreate','ajaxUpdate')),

			
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('avatar, emailNfe, nome, idusuario, tipoUsuario, tipoPessoa, cpf, cnpj, inscricaoEstadual, nomeFantasia, razaoSocial, email, senha, status, usuario_idempresa, telefone1, telefone3, url, cep, endereco, numero, complemento, bairro, cidade, estado, pais, nacionalidade, cpfDataEmissao, rg, rgDataEmissao, rgDataVencimento, rgUfEmissor, naturalidade, naturalidadeUf, dataNascimento, estadoCivil, sexo, nomePai, nomeMae, escolaridade, dependentes, deficienteFisico', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idusuario' => 'Idusuario',
			'tipoUsuario' => 'Tipo Usuario',
			'tipoPessoa' => 'Tipo Pessoa',
			'nome'=>'Nome',
			'cpf' => 'CPF',
			'cnpj' => 'CNPJ',
			'inscricaoEstadual' => 'Inscrição Estadual',
			'nomeFantasia' => 'Nome Fantasia',
			'razaoSocial' => 'Razão Social',
			'email' => 'Email',
			'emailNfe' => 'Email para NFe',
			'senha' => 'Senha Atual',
			'senhaConfirm' => 'Repetir Nova Senha',
			'senhaNova' => 'Nova Senha',
			'status' => 'Status',
			'usuario_idempresa' => 'Usuario Idempresa',
			'telefone1' => 'Telefone',
			'telefone3' => 'Tel 3',
			'url' => 'Site',
			'cep' => 'CEP',
			'endereco' => 'Endereço',
			'numero' => 'Número',
			'complemento' => 'Complemento',
			'bairro' => 'Bairro',
			'cidade' => 'Cidade',
			'estado' => 'Estado',
			'pais' => 'País',
			'nacionalidade' => 'Nacionalidade',
			'cpfDataEmissao' => 'Cpf Data Emissão',
			'rg' => 'Rg',
			'rgDataEmissao' => 'Rg Data Emissão',
			'rgDataVencimento' => 'Rg Data Vencimento',
			'rgUfEmissor' => 'Rg Uf Emissor',
			'naturalidade' => 'Naturalidade',
			'naturalidadeUf' => 'Naturalidade Uf',
			'dataNascimento' => 'Data Nascimento',
			'estadoCivil' => 'Estado Civil',
			'sexo' => 'Sexo',
			'nomePai' => 'Nome do Pai',
			'nomeMae' => 'Nome da Mãe',
			'escolaridade' => 'Escolaridade',
			'dependentes' => 'Dependentes',
			'deficienteFisico' => 'Deficiente Físico',
			'avatar'=>'avatar'
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		if(!Yii::app()->user->isGuest && Usuario::getIDUsuario() > 0){
			$criteria->addCondition("t.idusuario = ".Usuario::getIDUsuario(),"OR");
			$criteria->addCondition("t.usuario_idempresa = ".Usuario::getIDUsuario(),"OR");
		}


		$criteria->compare('idusuario',$this->idusuario);
		$criteria->compare('tipoUsuario',$this->tipoUsuario);
		$criteria->compare('tipoPessoa',$this->tipoPessoa);
		$criteria->compare('cpf',$this->cpf,true);
		$criteria->compare('cnpj',$this->cnpj,true);
		$criteria->compare('inscricaoEstadual',$this->inscricaoEstadual);
		$criteria->compare('nome',$this->nome,true);
		$criteria->compare('nomeFantasia',$this->nomeFantasia,true);
		$criteria->compare('razaoSocial',$this->razaoSocial,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('emailNfe',$this->emailNfe,true);
		$criteria->compare('senha',$this->senha,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('usuario_idempresa',$this->usuario_idempresa);
		$criteria->compare('telefone1',$this->telefone1,true);
		$criteria->compare('telefone3',$this->telefone3,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('cep',$this->cep,true);
		$criteria->compare('endereco',$this->endereco,true);
		$criteria->compare('numero',$this->numero);
		$criteria->compare('complemento',$this->complemento,true);
		$criteria->compare('bairro',$this->bairro,true);
		$criteria->compare('cidade',$this->cidade,true);
		$criteria->compare('estado',$this->estado,true);
		$criteria->compare('pais',$this->pais,true);
		$criteria->compare('nacionalidade',$this->nacionalidade,true);
		$criteria->compare('cpfDataEmissao',$this->cpfDataEmissao,true);
		$criteria->compare('rg',$this->rg,true);
		$criteria->compare('rgDataEmissao',$this->rgDataEmissao,true);
		$criteria->compare('rgDataVencimento',$this->rgDataVencimento,true);
		$criteria->compare('rgUfEmissor',$this->rgUfEmissor,true);
		$criteria->compare('naturalidade',$this->naturalidade,true);
		$criteria->compare('naturalidadeUf',$this->naturalidadeUf,true);
		$criteria->compare('dataNascimento',$this->dataNascimento,true);
		$criteria->compare('estadoCivil',$this->estadoCivil);
		$criteria->compare('sexo',$this->sexo);
		$criteria->compare('nomePai',$this->nomePai,true);
		$criteria->compare('nomeMae',$this->nomeMae,true);
		$criteria->compare('avatar',$this->avatar,true);
		$criteria->compare('escolaridade',$this->escolaridade,true);
		$criteria->compare('dependentes',$this->dependentes);
		$criteria->compare('deficienteFisico',$this->deficienteFisico);

		//var_dump($criteria);die('ok');
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function getArrayStatus(){
		return array(
			'Inativo',
			'Ativo',
			'Aguardando confirmação',
			'Excluído'
		);
	}

	public function getTxtStatus(){

		switch ($this->status) {
			case 0://Inativo 
				return '<span class="text-danger">Inativo</span>';
				break;
			case 1://Ativo
				return '<span class="text-success">Ativo</span>';
				break;
			case 2://Aguardando confirmação
				return '<span class="text-warning">Aguardando confirmação</span>';
				break;
			case 3://Excluído
				return '<span class="text-danger">Excluído</span>';
				break;
			default:
				return "---";
				break;
		}

	}

//pego o id do usuario logado
	public static function getIDUsuario()
	{
		$resp = Usuario::model()->findByAttributes(array('email'=>Yii::app()->user->id));
		//var_dump($resp);die('ij');
		if($resp){
			return $resp->idusuario;
		}
		
	}

	//pega o nome do Usuário que está logado
	public function getNomeUsuarioLogado()
	{
		//var_dump();die('ok');
		$resp = Usuario::model()->findByAttributes(array('email'=>Yii::app()->user->id));
		if(!empty($resp)){
			$resp = $resp->nome;
		}else{
			$resp = "Visitante";
		}
		return $resp;
	}

	
}