The infrastructure setup for synhak.
==========

Check http://synhak.org/wiki/Sysadmin#Ansible for more information about how this
fits in at SYNHAK.

The Setup
=========

Our infrastruture is written for ansible: http://ansible.cc

It might look a bit confusing at first, but here is the structure of the
repository:

* config/ - Contains various server-side configuration templates and a few
  ansible-side variables.
* *  config/sysadmins.yml - Defines the users who have ansible (and thus root) access.
* playbooks/ - Larger groups of plays that define what each role means
* * playbooks/master.yml - One ring to bring them all and in the darkness bind
    them. Updates all roles for all machines.
* plays/ - Logical units of role functionality that may or may not be shared
  between roles
* private/ - The actual security sensitive information that only root sysadmins
  should have access to and need to update. Kept in a private git repository on www-0.synhak.org.
* scripts/ - Scripts and things that keep SYNHAK ticking. Each one should be
  documented as to its purpose. Check in plays/ to see where each one fits in.
* sysadmin-keys/ - The public SSH keys of people with ansible access.

To use:

  ansible-playbook -i hosts plays/some-action.yml

Or:

  ansible-playbook -i hosts playbooks/some-role.yml

To get the private repo (has auth credentials and whatnot):

1.) Clone the main repo from https://github.com/SYNHAK/infrastructure
2.) cd infrastructure
3.) Set SSH to use your SYN/HAK Infrastructure keypair for all users on the synhak.org domain
4.) git submodule init
5.) git submodule update

Roles
=====

There are currently three roles, and three servers.

wwww
----

Basic webservers. They are configured to run apache and serve over HTTP and
HTTPS:

* Spiff
* The Wiki
* The contents of /var/www/html/
* Proxy to mail archives and mailman interface on www-0

mail
----

Mail host. There should only ever be one. It runs mailman, has mail aliases, and
maintains the members list by poking Spiff.

kiosk
-----

Any autonomous system for public interaction in the space itself. Such as kiosk
and jukebox.

Setting up a new server
==========

1. Add it to the hosts file under the appropriate role groups
2. ansible-playbook -i hosts -l the-hostname playbooks/master.yml
3. Stay Excellent
