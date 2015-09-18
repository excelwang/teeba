scp root@192.168.50.161:/root/jre* /root/
rpm -ivh jre-7u60-linux-x64.rpm
alternatives --install /usr/bin/java java /usr/java/default/bin/java 20000
alternatives --config java #input 4
export JAVA_HOME=/usr/java/default
echo "export JAVA_HOME=/usr/java/default">>/etc/profile
echo "PATH=$PATH:$JAVA_HOME/bin">>/etc/profile
source /etc/profile
echo $JAVA_HOME
java -version
wget https://maven.java.net/content/repositories/releases/net/java/dev/jna/jna/4.1.0/jna-4.1.0.jar
mv jna*  /usr/java/jre1.7.0_60/lib
echo "[datastax]">>/etc/yum.repos.d/datastax.repo 
echo "name = DataStax Repo for Apache Cassandra">>/etc/yum.repos.d/datastax.repo 
echo "baseurl = http://rpm.datastax.com/community">>/etc/yum.repos.d/datastax.repo 
echo "enabled = 1">>/etc/yum.repos.d/datastax.repo 
echo "gpgcheck = 0">>/etc/yum.repos.d/datastax.repo
sudo yum install dsc20 #input y

scp root@192.168.50.161:/etc/cassandra/conf/cassandra.yaml /etc/cassandra/conf/cassandra.yaml
sudo service cassandra start
# sed -i "s/\/usr\/java\/default\/bin/\/usr\/java\/default/g" /etc/profile
# sed -i '/^PATH=/d' /etc/profile
# echo "PATH=\$PATH:\$JAVA_HOME/bin">>/etc/profile # echo "PATH=$PATH:$JAVA_HOME/bin:$M2_HOME/bin">>/etc/profile #for 141