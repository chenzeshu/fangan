--CREATE database IF NOT EXISTS `workbase` DEFAULT CHARACTER SET='UTF8';

CREATE TABLE IF NOT EXISTS worklist(
id int NOT NULL AUTO_INCREMENT,
name varchar(20) NOT NULL,
password varchar(20) NOT NULL,
xingming varchar(20),
role_id int default 100,
PRIMARY KEY (id)
)DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS workcontent(
id int NOT NULL AUTO_INCREMENT,
system varchar(20),
name varchar(20),
stand varchar(40),
des_small TEXT,
des_all TEXT,
big_img varchar(128),
small_img varchar(128),
number int,
unit varchar(6),
area varchar(20),
brand varchar(20),
volume varchar(16),
weight varchar(16),
power varchar(16),
cost decimal(10,2),
sale decimal(10,2),
PRIMARY KEY (id)
)DEFAULT CHARSET=utf8;



SELECT * FROM workcontent WHERE name like "%$name%" or brand like "%$brand%" or des like "%$des%";   

SELECT * FROM workcontent WHERE name like "11%" or brand like "11%" or des like "11%";               




UPDATE workcontent SET name=''; 




create table simj2(
id int NOT NULL AUTO_INCREMENT,
system varchar(20),
name varchar(20),
stand varchar(40),
des_small TEXT,
des_all TEXT,
big_img varchar(128),
small_img varchar(128),
number int,
unit varchar(6),
area varchar(20),
brand varchar(20),
volume varchar(16),
weight varchar(16),
power varchar(16),
cost decimal(10,2),
sale decimal(10,2),
PRIMARY KEY (id)
)DEFAULT CHARSET=utf8;


create table simj21(
id int NOT NULL AUTO_INCREMENT,
system varchar(20),
name varchar(20),
stand varchar(40),
des_small TEXT,
des_all TEXT,
big_img varchar(128),
small_img varchar(128),
number int,
unit varchar(6),
area varchar(20),
brand varchar(20),
volume varchar(16),
weight varchar(16),
power varchar(16),
cost decimal(10,2),
sale decimal(10,2),
PRIMARY KEY (id)
)DEFAULT CHARSET=utf8;



create table worksys(
id int NOT NULL AUTO_INCREMENT,
sys_id varchar(4),
system varchar(20),
PRIMARY KEY (id)
)DEFAULT CHARSET=utf8;


create table liaotian(
id int NOT NULL AUTO_INCREMENT,
name varchar(4),
biaoqing varchar(20),
neirong text,
yanse, varchar(20);
PRIMARY KEY (id)
)DEFAULT CHARSET=utf8;


