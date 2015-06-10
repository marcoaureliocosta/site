<?php

/**
 * This is the model class for table "planos".
 *
 * The followings are the available columns in table 'planos':
 * @property integer $IDPlano
 * @property string $preco
 * @property integer $quantidade
 * @property integer $status
 * @property string $nome
 */
class Planos extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Planos the static model class
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
		return 'planos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('emDestaque,quantidade, status', 'numerical', 'integerOnly'=>true),
			array('preco', 'length', 'max'=>10),
			array('IDPlano,status,preco, nome', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('emDestaque,IDPlano, preco, quantidade, status, nome', 'safe', 'on'=>'search'),
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
			'IDPlano' => 'Idplano',
			'preco' => 'Preco',
			'quantidade' => 'Quantidade',
			'status' => 'Status',
			'nome' => 'Nome',
			'emDestaque'=>"Em Destaque"
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
		$criteria->order = 'status DESC';

		$criteria->compare('IDPlano',$this->IDPlano,true);
		$criteria->compare('preco',$this->preco);
		$criteria->compare('quantidade',$this->quantidade);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('emDestaque',$this->emDestaque);
		$criteria->compare('nome',$this->nome,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	//função que calcula a % de economia que o cliente tem contrando cada plano
	//explemplo: Plano 50 tem 16.67% de economia em relação ao Pacote 25.
	public function getValorPorcentagemEconomia($preco){
		
		//pega o valor do Plano mais caro
		$v = Planos::model()->findByAttributes(array('status'=>1),array(
			'order'=>'preco DESC'
		));

		$economia = (100*$preco)/$v->preco;
		$e = number_format($economia,"2",".","");
		return (100-$e);
	}
}