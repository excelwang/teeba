<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ycsb".
 *
 * @property string $recordcount
 * @property string $operationcount
 * @property integer $readallfields
 * @property double $readproportion
 * @property double $updateproportion
 * @property double $scanproportion
 * @property double $insertproportion
 * @property string $requestdistribution
 */
class Ycsb extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ycsb';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['recordcount', 'operationcount', 'readallfields', 'readproportion', 'updateproportion', 'scanproportion', 'insertproportion', 'requestdistribution'], 'required'],
            [['recordcount', 'operationcount', 'readallfields'], 'integer'],
            [['readproportion', 'updateproportion', 'scanproportion', 'insertproportion'], 'number'],
            [['requestdistribution','status'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'recordcount' => '记录数',
            'operationcount' => '操作数',
            'readallfields' => '读取全部字段',
            'readproportion' => '读操作比例',
            'updateproportion' => '更新操作比例',
            'scanproportion' => 'Scan 操作比例',
            'insertproportion' => '插入操作比例',
            'requestdistribution' => '选取操作记录所使用的概率分布',
            'status' => '测试状态',
            'summary' => '运行概况',
            'log' => '测试日志',
        ];
    }
}
