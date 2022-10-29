First, Create Database Named: db_clients
```sh
CREATE DATABASE db_clients;
```

Second, Create Table Named: clients:
```sh
CREATE TABLE clients(
  Id int PRIMARY KEY AUTO_INCREMENT,
  Name varchar(100) NOT NULL,
  Email varchar(100) NOT NULL,	
  Phone varchar(20) NOT NULL,	
  Address varchar(255) NOT NULL,	
  DateCreated date DEFAULT CURRENT_DATE
)  
```

<h1 align="center">Code By: Le Khac Thien</h1>