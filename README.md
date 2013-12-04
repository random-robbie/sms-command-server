sms-command-server
==================

Send a SMS to Control Your Linux Box via SMS

You will require a www.textlocal.com account.

You need to do the following 

add the following line to /etc/sudoers
```
www-data ALL=(ALL) NOPASSWD: ALL
```

in index.php alter the following

```
// configuration
$dbtype                = "mysql";
$dbhost         = "localhost";
$dbname                = "commands";
$dbuser                = "MYUSERNAME";
$dbpass                = "MYPASS";
$smskey = "YOUR KEYWORD";  // NOTE YOU MUST ADD A SPACE FOR THIS TO WORK
$number = "Auth Number";  // ENTER THE MOBILE NUMBER THAT YOU WISH TO ALLOW TO CONTROL TO
```

in functions.php alter the following

```
// Authorisation details.
$uname = "YOUR TEXT LOCAL EMAIL ADDRESS";
$hash = "YOUR TEXT LOCAL API HASH";
```


import the command.sql in to your database

add the commands you wish to use and set a keyword.

now to to the textlocal account settings for the inbox and ensure you set the url to your script and hey presto working sms commands.
