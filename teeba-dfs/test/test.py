#!/usr/bin/python
# coding: utf-8#
import os
import sys;reload(sys);sys.setdefaultencoding('utf8') #设置全局字符集
import string
import time, datetime  
import threading

global minFileSize;	minFileSize=1 #最小文件大小(小文件测试单位: KB；大文件测试单位：MB)
global maxFileSize;	maxFileSize=1 #最大文件大小(小文件测试单位: KB；大文件测试单位：MB)
global testPath;	testPath='/mnt/moosefs'
global testType;	testType='big' #测试类型（big-small）
global dirPath;
global isDirectIO;	isDirectIO='y' #是否绕过缓存（y/n）
global isSumClose;	isSumClose='y' #是否计算close（）时间 (y/n)
global isSyncTest;	isSyncTest='y'; #测试时是否进行同步写磁盘；(y/n)

#main(): run by itself	
#argv[1]: 测试类型
#argv[2]: 最小测试文件大小
#argv[3]: 最大测试文件大小
#argv[4]: 测试时是否绕过缓存
#argv[5]: 是否计算close（）时间
#argv[6]: 是否进行同步写磁盘

if __name__ == '__main__':
	print "Welcome to use this testContrl progress ,by lzx! lzxddz@cnic.cn"
	print time.strftime( 'Time: %Y-%m-%d %H:%M:%S',time.localtime(time.time()) ) 
	testArgv=''
	testPath='/mnt/moosefs'
	testFilename='%s/iotest' %testPath
	dirPath =os.path.split(os.path.realpath(__file__))[0] + '/'
	print 'dirPath: %s'%dirPath
	if len(sys.argv)>6:
		testType=sys.argv[1]
		minFileSize=sys.argv[2]
		maxFileSize=sys.argv[3]
		isDirectIO=sys.argv[4]
		isSumClose=sys.argv[5]
		isSyncTest=sys.argv[6]
	else:
		print "set args error."
		eixt(0)

	if isDirectIO=='y':
		testArgv=testArgv+'I'
	if isSumClose=='y':
		testArgv=testArgv+'c'
	if isSyncTest=='y': #磁盘同步写
		testArgv=testArgv+'o'
	print 'testArgv:%s' %testArgv
	if testType=='big':
		print 'big file test...'
		testArgv=testArgv+'Repb'
		teststr='%s/iozone3_429/src/current/iozone -a -n %sm -g %sm -f %s -%s %s/iozone-test-result1.xls ' %(dirPath,minFileSize,maxFileSize,testFilename,testArgv,dirPath)
		cmdstr=teststr
	else:
		testArgv=testArgv+'ORepb'
		print 'small file test...'
		teststr='%s/iozone3_429/src/current/iozone -a -n %sk -g %sk -f %s -%s %s/iozone-test-result1.xls ' %(dirPath,minFileSize,maxFileSize,testFilename,testArgv,dirPath)
		cmdstr=teststr
	print cmdstr
	os.popen(cmdstr)
	print time.strftime('Time: %Y-%m-%d %H:%M:%S',time.localtime(time.time()) )
	sys.exit(0)