#!/usr/bin/python
# coding: utf-8#
import os
import sys;reload(sys);sys.setdefaultencoding('utf8') #����ȫ���ַ���
import string
import time, datetime  
import threading

global minFileSize;	minFileSize=1 #��С�ļ���С(С�ļ����Ե�λ: KB�����ļ����Ե�λ��MB)
global maxFileSize;	maxFileSize=1 #����ļ���С(С�ļ����Ե�λ: KB�����ļ����Ե�λ��MB)
global testPath;	testPath='/mnt/moosefs'
global testType;	testType='big' #�������ͣ�big-small��
global dirPath;
global isDirectIO;	isDirectIO='y' #�Ƿ��ƹ����棨y/n��
global isSumClose;	isSumClose='y' #�Ƿ����close����ʱ�� (y/n)
global isSyncTest;	isSyncTest='y'; #����ʱ�Ƿ����ͬ��д���̣�(y/n)

#main(): run by itself	
#argv[1]: ��������
#argv[2]: ��С�����ļ���С
#argv[3]: �������ļ���С
#argv[4]: ����ʱ�Ƿ��ƹ�����
#argv[5]: �Ƿ����close����ʱ��
#argv[6]: �Ƿ����ͬ��д����

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
	if isSyncTest=='y': #����ͬ��д
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