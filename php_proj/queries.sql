// sql files


// create table

create table subjects(

id INT(11) NOT NULL AUTO_INCREMENT,
menu_name VARCHAR(255),
position INT(3),
visible TINYINT(1),
PRIMARY KEY (id));

// create pages 

create table pages(

id INT(11) NOT NULL AUTO_INCREMENT,
menu_name VARCHAR(255),
subject_id INT(11)
position INT(3),
visible TINYINT(1),
content TEXT,
PRIMARY KEY (id));

// insert into pages

INSERT into pages (subject_id,menu_name,position,visible) VALUES(1,'history',1,1);

INSERT into pages (subject_id,position,visible,menu_name) VALUES(1,1,1,'history');