<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dfs".
 *
 * @property integer $id
 * @property string $type
 * @property integer $min_file_size
 * @property integer $max_file_size
 * @property string $status
 * @property string $atime
 * @property string $summary
 * @property string $log
 * @property integer $isDirectIO
 * @property integer $isSumClose
 * @property integer $isSyncTest
 */
class Dfs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dfs';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'min_file_size', 'max_file_size'], 'required'],
            [['type', 'status', 'summary'], 'string'],
            [['min_file_size', 'max_file_size', 'isDirectIO', 'isSumClose', 'isSyncTest'], 'integer'],
            [['atime'], 'safe'],
            [['log'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', '测试ID'),
            'type' => Yii::t('app', '测试类型'),
            'min_file_size' => Yii::t('app', '最小文件大小 (KB)'),
            'max_file_size' => Yii::t('app', '最大文件大小 (MB)'),
            'isDirectIO' => Yii::t('app', '绕过缓存'),
            'isSyncTest' => Yii::t('app', '同步写磁盘'),
            'isSumClose' => Yii::t('app', '计算 close() 时间'),
            'status' => Yii::t('app', '测试状态'),
            'atime' => Yii::t('app', '创建时间'),
            'summary' => Yii::t('app', '运行概况'),
            'log' => Yii::t('app', '测试日志'),
        ];
    }
}
