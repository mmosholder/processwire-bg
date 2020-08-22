# -*- mode: ruby -*-
# vi: set ft=ruby :
require File.dirname(__FILE__) + "/vagrant/addons/dependency_manager"

check_plugins ["vagrant-exec", "vagrant-vbguest"]

Vagrant.configure("2") do |config|

  config.vm.box = "scotch/box"
  config.vm.network "private_network", ip: "192.168.33.10"
  # config.vm.hostname = "gc.local"
  config.vm.synced_folder ".", "/var/www", :create => true, :mount_options => ["dmode=777", "fmode=777"]

  # make /var/www the working directory for all commands
  config.exec.commands '*', directory: '/var/www'

  # config.vm.provision "shell", path: "vagrant/provisioners/wordpress.sh", privileged: false
end
