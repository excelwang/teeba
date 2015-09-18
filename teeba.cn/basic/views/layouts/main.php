<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
    <div class="wrap">
        <?php
            NavBar::begin([
                'brandLabel' => 'TeeBa',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);?>
			<form role="search" method="get" class="navbar-form navbar-right form-group-md" action="/community">
				<div>
					<div class="form-group has-feedback">
						<label class="sr-only" for="s">搜索：</label>
						<input type="text" name="s" id="s" class="form-control">
						<i class="glyphicon glyphicon-search form-control-feedback"></i>
					</div>
				</div>
			</form><?php
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                    ['label' => '主页', 'url' => ['/site/index']],
                    ['label' => '并行数据库测试', 'url' => ['/ycsb/index']],
                    ['label' => '并行文件系统测试', 'url' => ['/dfs/index']],
					'<li><a href="http://10.0.50.225:7180/cmf/home" target="_blank">资源监控</a></li>',
                    ['label' => '社区', 'url' => ['/community']],
                    ['label' => '关于', 'url' => ['/site/about']],
                    ['label' => '联系我们', 'url' => ['/site/contact']],
                    Yii::$app->user->isGuest ?
                        ['label' => '登录', 'url' => ['/site/login']] :
                        ['label' => '注销 (' . Yii::$app->user->identity->username . ')',
                            'url' => ['/site/logout'],
                            'linkOptions' => ['data-method' => 'post']],
                ],
            ]);
            NavBar::end();
        ?>

        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; CNIC.CN <?= date('Y') ?></p>
            <p class="pull-right">先导专项课题 XDA06010307</p>
        </div>
    </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
