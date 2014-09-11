gmail-leaks-search
==================

Simple PHP script to search in DB for leaked Gmail accounts


Installation
==================

####Clone the repo 

`git clone https://github.com/azoughbi/gmail-leaks-search.git`

`cd gmail-leaks-search`

####Create database
`mysql -u [db-username] -p[db-password]`

`create database [db-name];`

`grant all privileges on [db-name].* to "[db-username]"@"[db-host]" identified by "[db-password]";`

`exit`

#####Import DB with emails: 

`tar xfz db.tar.gz`

`mysql -u [db-username] -p[db-password] [db-name] < db.sql`

####Update index.php file

`$db_hostname = '';`

`$db_username = '';`

`$db_password = '';`

```$db_database = '';```

