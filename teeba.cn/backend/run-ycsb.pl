#!/usr/bin/perl

# load module
use DBI;
use File::Path;
$test="ycsb";
$host="10.0.50.225";
$remote_log_path="/root/teeba-ycsb-hbase/teeba/log/hbase-timeline.log";
$extend="log";
#ln -s /data/mysql_datadir/mysql.sock /var/lib/mysql/mysql.sock 
$dbh = DBI->connect("DBI:mysql:database=teeba;host=localhost;mysql_socket=/opt/lampp/var/mysql/mysql.sock",'teeba', '90onw1ndT') or die "cannot connect to database！";
$dbh->do("SET character_set_client='utf8'");
$dbh->do("SET character_set_connection='utf8'");
$dbh->do("SET character_set_results='utf8'");

#判断是否有正则运行的测试，若有退出
my $sth = $dbh->prepare("SELECT id FROM $test where status='runing';");
$sth->execute();
@row= $sth->fetchrow_array();
$sth->finish();
if(@row!=0){
#	print "当前正在运行另一个测试！";
	exit(0);
}

#查询等待运行的测试，若无退出
$sth = $dbh->prepare("SELECT 
	id,UNIX_TIMESTAMP(),
	recordcount,
	operationcount,
	readallfields,
	readproportion,
	updateproportion,
	scanproportion,
	insertproportion,
	requestdistribution
	FROM $test where status='prepare' limit 1;");
$sth->execute();
($id,$atime,@config_fields)= $sth->fetchrow_array();
$sth->finish();
if($id==0){
#	print "当前没有需要运行的测试！";
	exit(0);
}


#运行测试

#1.解析测试脚本参数
#@config_fields=split(';',$config);
@config_k=('recordcount','operationcount','readallfields','readproportion','updateproportion','scanproportion','insertproportion','requestdistribution');
$config="workload=com.yahoo.ycsb.workloads.CoreWorkload\n";
for(my $i=0;$i<@config_k;$i++){
	$config.=@config_k[$i]."=".@config_fields[$i]."\n";
	#($name,$readcnt)=split '=';#test
}

#2.写入测试脚本
my $path="/opt/lampp/htdocs/teeba/backend/$test/$atime/script";
eval{mkpath($path,0,0755)};
my $log_path="/opt/lampp/htdocs/teeba/backend/log/$test";
eval{mkpath($log_path,0,0755)};
!$@ or die(time.":$test 测试 $id: Make path [$path] failed:\n$@");
$log_path.="/$atime.$extend";
open(OUTFILE, ">$path/workload")  || die ("Could not open test script file");
print OUTFILE $config;
close(OUTFILE);

#3.更改数据库状态
print time.":$test 测试 $id 已启动\n";
$dbh->do("update $test set `status`='runing' where id=$id")!=0 or die(time.":$test 测试 $id: 更改 $test 测试: $id 为运行态失败！");

#4. 运行测试
$cur=time;
$config_fields[0] or die(time.":$test 测试 $id: 参数设置错误");
system("/opt/lampp/htdocs/teeba/backend/sshpass -p 'cnic.cn' ssh root\@$host \"rm $remote_log_path;/root/teeba-ycsb-hbase/teeba/sshpass -p 'cnic.cn' scp root\@10.0.96.121:$path/workload /root/teeba-ycsb-hbase/teeba/workload\"");#复制workload
!$@ or die(time.":$test 测试 $id: 部署测试负载失败！");
system("/opt/lampp/htdocs/teeba/backend/sshpass -p 'cnic.cn' ssh root\@$host \"rm $remote_log_path;/root/teeba-ycsb-hbase/teeba/hbase.pl\"");#运行测试脚本
!$@ or die(time.":$test 测试 $id: 运行测试失败！");
system("/opt/lampp/htdocs/teeba/backend/sshpass -p 'cnic.cn' scp root\@$host:$remote_log_path $log_path");#拷贝测试日志
!$@ or die(time.":$test 测试 $id: 收集测试日志失败！");

#5. 修改测试状态
$cur=time-$cur;
$dbh->do("update $test set `status`='finish',`summary`='共运行了 $cur 秒。',`log`='<a href=\"/test/log/$test/$atime.$extend\">下载</a>' where id=$id")!=0 or die(time.":$test 测试 $id: 更改数据库中的测试完成状态失败！");
print time.":$test 测试 $id 运行结束\n";
# clean up
$dbh->disconnect();
