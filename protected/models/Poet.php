<?php

/**
 * This is the model class for table "poet".
 *
 * The followings are the available columns in table 'poet':
 * @property integer $id
 * @property string $name
 * @property integer $views
 * @property string $start_date
 * @property string $end_date
 * @property string $short_text
 * @property string $text
 * @property string $time
 */
class Poet extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Poet the static model class
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
		return 'poet';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, start_date, end_date, short_text, text', 'required'),
			array('views', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, views, start_date, end_date, short_text, text, time', 'safe', 'on'=>'search'),
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
            'stihi'=>array(self::HAS_MANY,'Stihi','poet_id'),
		);
	}
    
    public function behaviors() {
        return array(
            'photoImgBehavior' => array(
                'class' => 'ImageARBehavior',
                'attribute' => 'photo',
                'extension' => 'png, gif, jpg', // Возможные расширения файла  
                'prefix' => 'news_',
                'relativeWebRootFolder' => 'upload/poets', 
                'formats' => array(
                    'ava_small' => array(
                        'suffix' => '_small',
                        'process' => array('resize' => array(130, 190)),
                    ),
                    'ava_big' => array(
                        'suffix' => '_big',
                        'process' => array('resize' => array(600, 600)),
                    ),
                    'normal' => array(
                        'process' => array('resize' => array(300, 300)),
                    ),
                ),
                'defaultName' => 'default', // when no file is associated, this one is used by getFileUrl  
            )
        );
    }

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Имя',
			'views' => 'Просмотры',
			'start_date' => 'Дата рождения',
			'end_date' => 'Дата ухода',
			'short_text' => 'Краткое описание',
			'text' => 'Описание',
			'time' => 'время',
            'photo_id' => 'Фото'
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('views',$this->views);
		$criteria->compare('start_date',$this->start_date,true);
		$criteria->compare('end_date',$this->end_date,true);
		$criteria->compare('short_text',$this->short_text,true);
		$criteria->compare('text',$this->text,true);
		$criteria->compare('time',$this->time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}