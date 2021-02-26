1]. Need a database..

=> create database signup;
=> create table register(
    rno int primary key auto_increment,
    uname varchar(30) not null unique,
    email varchar(55) not null unique,
    pass varchar(25) not null ,
    cpass varchar(25) not null
);
