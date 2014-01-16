<?php

/**
 * This is the model class for table "stih_tags".
 *
 * The followings are the available columns in table 'stih_tags':
 * @property integer $id
 * @property integer $tag_id
 * @property integer $stih_id
 */
class StihTags extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return StihTags the static model class
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
		return 'stih_tags';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tag_id, stih_id', 'required'),
			array('tag_id, stih_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, tag_id, stih_id', 'safe', 'on'=>'search'),
		);
	}
    
    public static function getSavedTags($id){
        $tag = self::model()->findAll(" stih_id=:stih_id ", array('stih_id'=>$id));
        $tags = CHtml::listData($tag, 'tag_id', function() { return array('selected' => 'selected');});     
        return $tags;
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
			'tag_id' => 'Tag',
			'stih_id' => 'Stih',
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
		$criteria->compare('tag_id',$this->tag_id);
		$criteria->compare('stih_id',$this->stih_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}