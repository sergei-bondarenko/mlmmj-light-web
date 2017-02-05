# mlmmj-light-web

## Description

A light php web interface to mlmmj. It does not use a database.

## Installation

**An easy way:**

1. Install a clean Debian from [netinst](https://www.debian.org/CD/netinst/) iso with only standard system utilities.
2. Do commands:

```
cd /tmp
wget https://github.com/grez911/mlmmj-light-web/archive/master.tar.gz
tar xzvf master.tar.gz
mlmmj-light-web-master/misc/init.sh
```

**A slightly harder way:** read init.sh code and do all manually.

## Using

Create a domain:

```
/var/www/html/misc/manage_domains.sh add list.example.com
```

Delete a domain:

```
/var/www/html/misc/manage_domains.sh del list.example.com
```

## Screenshots

![](misc/move/screenshot_0.png?raw=true)
![](misc/move/screenshot_1.png?raw=true)
