<?php
/* @var $this yii\web\View */
$this->title = 'TeeBa';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>TeeBa<h4>The <span class="abbr-ori">Te</span>chniques and T<span class="abbr-ori">e</span>stbed for <span class="abbr-ori">B</span>ig Dat<span class="abbr-ori">a</span> Processing</h4></h1>

        <p class="lead">
		公正 可靠 易用 的大数据技术测试平台
		</p>
		
        <p class="lead">
			在线配置测试脚本 |
			测试结果学术引用 |
			测试结果 Replay |
			还可进行个性化测试
		</p>

        <p><a class="btn btn-lg btn-success" href="/community/category/report">查看测试报告</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>并行数据库测试</h2>

                <p>使用著名的 YCSB 数据库基准测试程序，支持测试 HBase、Cassandra、Mysql Cluster、MangoDB等多种数据库。</p>

                <p><a class="btn btn-primary" href="/ycsb/index">测试</a></p>
            </div>
            <div class="col-lg-4">
                <h2>并行文件系统测试</h2>


                <p>使用业界通用的 IOZone 基准测试程序，支持测试 gluster、Ceph等多种并行文件系统。</p>

                <p><a class="btn btn-primary" href="/dfs/index">测试</a></p>
            </div>
            <div class="col-lg-4">
                <h2>数据分析算法评测</h2>

                <p>拥有多种标准测试数据集，在我们的平台上展示你的算法的威力！</p>

                <p><a class="btn btn-primary" href="/algorithm">测试</a></p>
            </div>
        </div>

    </div>
</div>
