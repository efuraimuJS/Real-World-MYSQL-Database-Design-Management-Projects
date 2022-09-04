username='rootuser'
dbname='rootdb'
dbpass='rootpass'
tablename=tb1
drop_database:
	DROP DATABASE IF EXISTS $(dbname);

create_database:
	CREATE DATABASE IF NOT EXISTS $(dbname);
ls_database:
	SHOW DATABASES;

drop_table:
	DROP TABLE IF EXISTS table;


drop_user:
	DROP USER IF EXISTS $(username);

create_user:
	CREATE USER $(username)@$(dbname) IDENTIFIED BY $(dbpass);

ls_user:
	SELECT USER(), CURRENT_USER();

grant_priv:
	GRANT ALL PRIVILEGES ON $(dbname).* TO $(username)@'%' ;


create_table:
	CREATE TABLE $(tablename) (pk_id bigint primary key DEFAULT UUID_SHORT());
