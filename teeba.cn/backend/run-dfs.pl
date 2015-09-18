#!/usr/bin/perl

# load module
use DBI;
use File::Path;
$test="dfs";
$host="10.0.96.127";
$remote_log_path="/root/teeba-dfs/test/iozone-test-result1.xls";
$extend="xls";
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
	type,
	min_file_size,
	max_file_size,isDirectIO,isSyncTest,isSumClose
	FROM $test where status='prepare' limit 1;");
$sth->execute();
($id,$atime,@config_fields)= $sth->fetchrow_array();
for($i=2;$i<6;++$i){
	$config_fields[$i]=$config_fields[$i]?'y':'n';
}
$sth->finish();
if($id==0){
#	print "当前没有需要运行的测试！";
	exit(0);
}


#运行测试

#1.解析测试脚本参数
$remote_cmd="python /root/teeba-dfs/test/test.py ".join(' ',@config_fields);

#2.测试日志目录
my $log_path="/opt/lampp/htdocs/teeba/backend/log/$test";
eval{mkpath($log_path,0,0755)};
!$@ or die(time.":$test 测试 $id: Make path [$log_path] failed:\n$@");
$log_path.="/$atime.$extend";

#3.更改数据库状态
print time.":$test 测试 $id 已启动\n";
$dbh->do("update $test set `status`='runing' where id=$id")!=0 or die(time.":$test 测试 $id: 更改 $test 测试: $id 为运行态失败！");

#4. 运行测试
$cur=time;
$config_fields[0] or die(time.":$test 测试 $id: 参数设置错误");

system("/opt/lampp/htdocs/teeba/backend/sshpass -p 'cnic.cn' ssh root\@$host \"rm $remote_log_path -rf;$remote_cmd\"");#运行测试脚本
!$@ or die(time.":$test 测试 $id: 运行测试失败！");
system("/opt/lampp/htdocs/teeba/backend/sshpass -p 'cnic.cn' scp root\@$host:$remote_log_path $log_path");#拷贝测试日志
!$@ or die(time.":$test 测试 $id: 收集测试日志失败！");

#5. 修改测试状态
$cur=time-$cur;
$dbh->do("update $test set `status`='finish',`summary`='共运行了 $cur 秒。',`log`='<a href=\"/test/log/$test/$atime.$extend\">下载</a>' where id=$id")!=0 or die(time.":$test 测试 $id: 更改数据库中的测试完成状态失败！");
print time.":$test 测试 $id 运行结束\n";
# clean up
$dbh->disconnect();
