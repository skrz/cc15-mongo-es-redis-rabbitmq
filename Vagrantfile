$script = <<SCRIPT
wget -qO - https://packages.elastic.co/GPG-KEY-elasticsearch | sudo apt-key add -
echo "deb http://packages.elastic.co/elasticsearch/1.7/debian stable main" | sudo tee /etc/apt/sources.list.d/elk.list
sudo apt-get update && sudo apt-get install bindfs rabbitmq-server mongodb openjdk-7-jre elasticsearch php5-mongo -y

sudo cp -r /var/www/conf/hunspell /etc/elasticsearch/
sudo rabbitmq-plugins enable rabbitmq_management

sudo /etc/init.d/mongodb restart
sudo /etc/init.d/elasticsearch restart
sudo /etc/init.d/redis_6379 restart
sudo /etc/init.d/rabbitmq-server restart
sudo /etc/init.d/apache2 restart
SCRIPT

Vagrant.configure("2") do |config|

    config.vm.box = "scotch/box"
    config.vm.network "private_network", ip: "192.168.33.10"
    config.vm.hostname = "scotchbox"
    config.vm.synced_folder ".", "/var/www", :nfs => { :mount_options => ["dmode=777","fmode=666"] }
    config.bindfs.bind_folder "/var/www", "/var/www", :owner => 1000, :group => 1000
    config.vm.provider "virtualbox" do |v|
        v.memory = 1024
        v.cpus = 2
        v.customize ["guestproperty", "set", :id, "/VirtualBox/GuestAdd/VBoxService/--timesync-set-threshold", 10000]
    end
    config.vm.provision "shell", inline: $script

end
