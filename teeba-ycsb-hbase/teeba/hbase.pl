#!/usr/bin/perl
#teeba 测试脚本
use DBI;
use File::Path;
my $log_path="/root/teeba-ycsb-hbase/teeba/log";
my $wl_path="/root/teeba-ycsb-hbase/teeba/workload";
eval{mkpath($log_path,0,0755)};
eval{mkpath($wl_path,0,0755)};
!$@ or die("Make path [$log_path] failed:\n$@");
my %workload_target = ( "workload" => [5000]);
my $cmd_prefix="/root/teeba-ycsb-hbase/bin/ycsb run hbase -p columnfamily=family -s";
my $cmd_load="/root/teeba-ycsb-hbase/bin/ycsb load hbase -P $wl_path/workload -p columnfamily=family -threads 48";
my @threads=(216);
open (STDOUT, ">/root/teeba-ycsb-hbase/teeba/log/hbase.log")  || die "can not redirect stdout" ;
open (STDERR, ">/root/teeba-ycsb-hbase/teeba/log/hbase-timeline.log")  || die "can not redirect stdout" ;
#重置、加载测试数据
my $table="usertable";
system("hbase shell /root/teeba-ycsb-hbase/hbase-binding/hbase-usertable-recreate.hql");
$table="-p table=$table";
system("$cmd_load $table");
for my $workload(keys %workload_target){
	for my $target (@{$workload_target{$workload}}){
		foreach my $thread (@threads){
			next if($target<$thread);
			my $operationcount=@config_fields[2];
			print STDERR "$wl_path/workload  -target $target -threads $thread $table\n";
			system("$cmd_prefix -P $wl_path/workload  -target $target -threads $thread $table");
		}
	}
}