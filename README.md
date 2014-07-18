Ansible-pfsense
===============

This playbook makes easier the update of aliases lists of pfsense.

This playbook requires that the lists of aliases are defined previously. The update process uses the url retrieve function from a microsite installed in the working directory of pfsense's lighttpd.

When a list from *http://localhost/aliases/?name=deny* is retrieved by pfsense, the PHP script tries to get the file deny.inc located in */usr/local/www/aliases*.

This lists can only be retrieve from localhost.

Once the files .inc are uploaded, the playbook runs */etc/rc.update_alias_url_data* and */etc/rc.update_urltables scripts* in order to update the pf lists with the content of the files .inc.

Requisites
==========

By default pfsense doesn't provide python interperter, that is necessary to run ansible in it. As root in pfsense, run:

```sh
pkg_add -r http://ftp-archive.freebsd.org/pub/FreeBSD-Archive/ports/amd64/packages-8.3-release/python/python27-2.7.2_4.tbz
```

Then, test ansible connection with:

```sh
ansible -m ping -i hosts fwhost
```

Define url tables
=================

The file [**vars/aliases.yml**](vars/aliases.yml) has the list of alias and the values in a list format. The variable **filename** must match with the alias name to update.

How to run
==========

```sh
ansible-playbook -i hosts update_firewalls.yml
```
