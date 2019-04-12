# -*- mode: ruby -*-
# vi: set ft=ruby :

require File.dirname(__FILE__) + "/vagrant/addons/dependency_manager"

check_plugins ["vagrant-exec", "vagrant-hostmanager"]

Vagrant.configure(2) do |config|
  # use scotchbox as base box
  config.vm.box = "scotch/box"
  config.vm.box_version = '2.5';

  # set ip address to 192.168.33.10
  config.vm.network "private_network", ip: "192.168.33.10", hostsupdater: "skip"

  # set project folder to /var/www
  config.vm.synced_folder ".", "/var/www", :mount_options => ["dmode=777", "fmode=777"]

  # set hostname
  config.vm.hostname = "bluegrass.local"

  # setup hostmanager
  config.hostmanager.enabled = true
  config.hostmanager.manage_host = true
  config.hostmanager.manage_guest = true
  config.hostmanager.ignore_private_ip = false
  config.hostmanager.include_offline = true

  # make /var/www the working directory for all commands
  config.exec.commands '*', directory: '/var/www'

  # config.trigger.after [:up, :reload, :provision] do |trigger|
  #   trigger.info = "Creating test database..."
  #   trigger.run_remote = {inline: "mysql -u root -proot -e 'CREATE DATABASE IF NOT EXISTS test;'"}
  # end

  # config.trigger.after [:up, :reload, :provision] do |trigger|
  #   trigger.info = "Installing composer packages..."
  #   trigger.run_remote = {inline: "cd /var/www ; composer install"}
  # end
end
