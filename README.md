The infrastructure setup for synhak.
==========

Written for ansible: http://ansible.cc

To use:

  ansible-playbook -i hosts plays/some-action.yml

To get the private repo (has auth credentials and whatnot):

1.) Clone the main repo from https://github.com/SYNHAK/infrastructure
2.) cd infrastructure
3.) Set SSH to use your SYN/HAK Infrastructure keypair for all users on the synhak.org domain
4.) git submodule init
5.) git submodule update

Roles and Such
=========
There are a couple of roles used in the infrastructure, which are used as groups
in the hosts file:

* www - Webservers that host mediawiki, spiff, and mail archives
* mail - Mail host. There should only ever be one. It runs mailman, has mail
  aliases, and maintains the members list by poking Spiff.
* kiosk - Any autonomous systems for public interaction in the space itself

Setting up a new server
==========

1. Add it to the hosts file under the appropriate role groups
2. ansible-playbook -i hosts -l the-hostname playbooks/master.yml
