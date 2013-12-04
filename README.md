sms-command-server
==================

Send a SMS to Control Your Linux Box via SMS

You will require a www.textlocal.com account.

You need to do the following 

add the following line to /etc/sudoers
```
www-data ALL=(ALL) NOPASSWD: ALL
```

Alter index.php and enter in your mobile number to control the textlocal keyword and mysql database settings

in functions.php you need to put your login email address for textlocal and your textlocal hash.


inport the command.sql in to your database

add the commands you wish to use and set a keyword.
