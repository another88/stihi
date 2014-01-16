<?php

/**
 * This is the model class for table "photo".
 *
 * The followings are the available columns in table 'photo':
 * @property integer $id
 * @property integer $pid
 * @property string $url_full
 * @property string $url_min
 * @property integer $main
 */
class Photo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Photo the static model class
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
		return 'photo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('pid, url_full, url_min, main', 'required'),
			array('pid, main', 'numerical', 'integerOnly'=>true),
			array('url_full, url_min', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, pid, url_full, url_min, main', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'pid' => 'Pid',
			'url_full' => 'Url Full',
			'url_min' => 'Url Min',
			'main' => 'Main',
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
		$criteria->compare('pid',$this->pid);
		$criteria->compare('url_full',$this->url_full,true);
		$criteria->compare('url_min',$this->url_min,true);
		$criteria->compare('main',$this->main);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}