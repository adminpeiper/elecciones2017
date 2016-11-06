<?php

/**
 * This is the model class for table "candidatos".
 *
 * The followings are the available columns in table 'candidatos':
 * @property integer $idcandidatos
 * @property string $nombrecandidatos
 * @property string $rutaimagen
 * @property string $partidopolitico
 * @property string $usuariotwitter
 * @property string $usuariofacebook
 * @property string $paginaweb
 * @property string $estado
 *
 * The followings are the available model relations:
 * @property Propuestas[] $propuestases
 */
class Candidatos extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'candidatos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombrecandidatos, partidopolitico, estado', 'required'),
			array('nombrecandidatos', 'length', 'max'=>200),
			array('rutaimagen, usuariotwitter, usuariofacebook, paginaweb', 'length', 'max'=>50),
			array('partidopolitico', 'length', 'max'=>100),
			array('estado', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idcandidatos, nombrecandidatos, rutaimagen, partidopolitico, usuariotwitter, usuariofacebook, paginaweb, estado', 'safe', 'on'=>'search'),
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
			'propuestases' => array(self::HAS_MANY, 'Propuestas', 'idcandidato'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idcandidatos' => 'Idcandidatos',
			'nombrecandidatos' => 'Nombrecandidatos',
			'rutaimagen' => 'Rutaimagen',
			'partidopolitico' => 'Partidopolitico',
			'usuariotwitter' => 'Usuariotwitter',
			'usuariofacebook' => 'Usuariofacebook',
			'paginaweb' => 'Paginaweb',
			'estado' => 'Estado',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idcandidatos',$this->idcandidatos);
		$criteria->compare('nombrecandidatos',$this->nombrecandidatos,true);
		$criteria->compare('rutaimagen',$this->rutaimagen,true);
		$criteria->compare('partidopolitico',$this->partidopolitico,true);
		$criteria->compare('usuariotwitter',$this->usuariotwitter,true);
		$criteria->compare('usuariofacebook',$this->usuariofacebook,true);
		$criteria->compare('paginaweb',$this->paginaweb,true);
		$criteria->compare('estado',$this->estado,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Candidatos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
