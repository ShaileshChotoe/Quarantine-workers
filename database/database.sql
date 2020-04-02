create DATABASE
if not EXISTS quarantine;

use quarantine;

create TABLE
if not EXISTS users
(
    id int AUTO_INCREMENT,
    username varchar
(100),
    password varchar
(100),
    posts int
(100),
    PRIMARY KEY
(id)
);

create table
if not EXISTS posts
(
    id int AUTO_INCREMENT,
    userId int,
    code text
(1),
    language varchar
(25),
    private boolean,
    link varchar
(255),
    PRIMARY KEY
(id)
);

insert into users
    (username, password, posts)
VALUES
    ('shai', '123', 0),
    ('george', '123', 0),
    ('stijn', '123', 0),
    ('imad', '123', 0);