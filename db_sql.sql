-- SQL for phpmyadmin

create database cms;
use cms;

-- category table
create table category(
    id int PRIMARY KEY AUTO_INCREMENT,
    cat_name varchar(50)
);

-- posts table

create table posts(
    id int PRIMARY KEY AUTO_INCREMENT,
    post_tags varchar(50),
    post_comment_count int,
    post_status int default 0 check (post_status >= 0 and post_status <= 1),
    post_title varchar(50),
    post_author varchar(55),
    post_date DATE,
    post_image TEXT,
    post_content TEXT,
    FOREIGN KEY (post_category_id) REFERENCES category(id)
);