# BLOG MVC

## SQL form PHPMYADMIN

```sql
create database if not exists blog;
use blog;

create table users(
  id INT PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(100),
  email VARCHAR(150),
  password VARCHAR(255),
  created DATETIME DEFAULT CURRENT_TIMESTAMP
);

create table posts (
  id int primary key AUTO_INCREMENT,
  user_id int,
  title varchar(100),
  body TEXT,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  FOREIGN key (user_id) REFERENCES users(id)
);
```