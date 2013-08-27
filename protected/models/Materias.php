<?php

/**
 * This is the model class for table "materias".
 *
 * The followings are the available columns in table 'materias':
 * @property integer $id
 * @property string $nombre
 * @property integer $idGrado
 *
 * The followings are the available model relations:
 * @property Grado $idGrado0
 */
class Materias extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Materias the static model class
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
		return 'materias';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, idGrado', 'required'),
			array(' id,idGrado', 'numerical', 'integerOnly'=>true),
			array('nombre', 'length', 'max'=>25),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombre, idGrado', 'safe', 'on'=>'search'),
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
			'idGrado0' => array(self::BELONGS_TO, 'Grado', 'idGrado'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nombre' => 'Nombre',
			'idGrado' => 'Id Grado',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('idGrado',$this->idGrado);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
    //funcion que regresa las materias dependiendo del id del grado 
	public function getMaterias($id)
	{
		$condicion=array(
			"idGrado"=>$id,
		);
		
		return self::model()->findAllByAttributes($condicion);
	}

	    
}