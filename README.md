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
