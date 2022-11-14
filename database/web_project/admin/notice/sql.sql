alter table notice add column f_name varchar(50) after w_date;
alter table notice add column f_type varchar(50) after f_name;
alter table notice add column f_size varchar(50) after f_type;
