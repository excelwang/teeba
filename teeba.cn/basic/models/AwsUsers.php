<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "aws_users".
 *
 * @property string $uid
 * @property string $user_name
 * @property string $email
 * @property string $mobile
 * @property string $password
 * @property string $salt
 * @property string $avatar_file
 * @property integer $sex
 * @property integer $birthday
 * @property string $province
 * @property string $city
 * @property integer $job_id
 * @property integer $reg_time
 * @property string $reg_ip
 * @property integer $last_login
 * @property string $last_ip
 * @property integer $online_time
 * @property integer $last_active
 * @property integer $notification_unread
 * @property integer $inbox_unread
 * @property integer $inbox_recv
 * @property integer $fans_count
 * @property integer $friend_count
 * @property integer $invite_count
 * @property integer $question_count
 * @property integer $answer_count
 * @property integer $topic_focus_count
 * @property integer $invitation_available
 * @property integer $group_id
 * @property integer $reputation_group
 * @property integer $forbidden
 * @property integer $valid_email
 * @property integer $is_first_login
 * @property integer $agree_count
 * @property integer $thanks_count
 * @property integer $views_count
 * @property integer $reputation
 * @property integer $reputation_update_time
 * @property integer $weibo_visit
 * @property integer $integral
 * @property integer $draft_count
 * @property string $common_email
 * @property string $url_token
 * @property integer $url_token_update
 * @property string $verified
 * @property string $default_timezone
 * @property string $email_settings
 * @property string $weixin_settings
 * @property string $recent_topics
 */
class AwsUsers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'aws_users';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db2');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sex', 'birthday', 'job_id', 'reg_time', 'reg_ip', 'last_login', 'last_ip', 'online_time', 'last_active', 'notification_unread', 'inbox_unread', 'inbox_recv', 'fans_count', 'friend_count', 'invite_count', 'question_count', 'answer_count', 'topic_focus_count', 'invitation_available', 'group_id', 'reputation_group', 'forbidden', 'valid_email', 'is_first_login', 'agree_count', 'thanks_count', 'views_count', 'reputation', 'reputation_update_time', 'weibo_visit', 'integral', 'draft_count', 'url_token_update'], 'integer'],
            [['recent_topics'], 'string'],
            [['user_name', 'email', 'common_email', 'email_settings', 'weixin_settings'], 'string', 'max' => 255],
            [['mobile', 'salt'], 'string', 'max' => 16],
            [['password', 'url_token', 'verified', 'default_timezone'], 'string', 'max' => 32],
            [['avatar_file'], 'string', 'max' => 128],
            [['province', 'city'], 'string', 'max' => 64]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'uid' => Yii::t('app', '用户的 UID'),
            'user_name' => Yii::t('app', '用户名'),
            'email' => Yii::t('app', 'EMAIL'),
            'mobile' => Yii::t('app', '用户手机'),
            'password' => Yii::t('app', '用户密码'),
            'salt' => Yii::t('app', '用户附加混淆码'),
            'avatar_file' => Yii::t('app', '头像文件'),
            'sex' => Yii::t('app', '性别'),
            'birthday' => Yii::t('app', '生日'),
            'province' => Yii::t('app', '省'),
            'city' => Yii::t('app', '市'),
            'job_id' => Yii::t('app', '职业ID'),
            'reg_time' => Yii::t('app', '注册时间'),
            'reg_ip' => Yii::t('app', '注册IP'),
            'last_login' => Yii::t('app', '最后登录时间'),
            'last_ip' => Yii::t('app', '最后登录 IP'),
            'online_time' => Yii::t('app', '在线时间'),
            'last_active' => Yii::t('app', '最后活跃时间'),
            'notification_unread' => Yii::t('app', '未读系统通知'),
            'inbox_unread' => Yii::t('app', '未读短信息'),
            'inbox_recv' => Yii::t('app', '0-所有人可以发给我,1-我关注的人'),
            'fans_count' => Yii::t('app', '粉丝数'),
            'friend_count' => Yii::t('app', '观众数'),
            'invite_count' => Yii::t('app', '邀请我回答数量'),
            'question_count' => Yii::t('app', '问题数量'),
            'answer_count' => Yii::t('app', '回答数量'),
            'topic_focus_count' => Yii::t('app', '关注话题数量'),
            'invitation_available' => Yii::t('app', '邀请数量'),
            'group_id' => Yii::t('app', '用户组'),
            'reputation_group' => Yii::t('app', '威望对应组'),
            'forbidden' => Yii::t('app', '是否禁止用户'),
            'valid_email' => Yii::t('app', '邮箱验证'),
            'is_first_login' => Yii::t('app', '首次登录标记'),
            'agree_count' => Yii::t('app', '赞同数量'),
            'thanks_count' => Yii::t('app', '感谢数量'),
            'views_count' => Yii::t('app', '个人主页查看数量'),
            'reputation' => Yii::t('app', '威望'),
            'reputation_update_time' => Yii::t('app', '威望更新'),
            'weibo_visit' => Yii::t('app', '微博允许访问'),
            'integral' => Yii::t('app', 'Integral'),
            'draft_count' => Yii::t('app', 'Draft Count'),
            'common_email' => Yii::t('app', '常用邮箱'),
            'url_token' => Yii::t('app', '个性网址'),
            'url_token_update' => Yii::t('app', 'Url Token Update'),
            'verified' => Yii::t('app', 'Verified'),
            'default_timezone' => Yii::t('app', 'Default Timezone'),
            'email_settings' => Yii::t('app', 'Email Settings'),
            'weixin_settings' => Yii::t('app', 'Weixin Settings'),
            'recent_topics' => Yii::t('app', 'Recent Topics'),
        ];
    }
}
