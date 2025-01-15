
CREATE DATABASE IF NOT EXISTS apartment;
USE apartment;

create table if not exists admin
(
    Idadmin   int          not null,
    Adminname varchar(255) not null,
    Adminpswd varchar(255) not null,
    constraint `PRIMARY`
        primary key (Idadmin)
)
    engine = InnoDB
    charset = utf8
    row_format = DYNAMIC;

create table if not exists contract
(
    Idcontract int auto_increment constraint `PRIMARY`
			primary key,
    Signdate   datetime not null,
    Startdate  datetime not null,
    Enddate    datetime not null,
    Iduser     int      not null
)
    engine = InnoDB
    charset = utf8
    row_format = DYNAMIC;

create table if not exists favorites
(
    id         int auto_increment constraint `PRIMARY`
			primary key,
    user_id    int                                 not null,
    room_id    int                                 not null,
    created_at timestamp default CURRENT_TIMESTAMP not null,
    constraint unique_favorite
        unique (user_id, room_id)
);

create table if not exists picture
(
    id      int      not null,
    room_id int      not null,
    content longtext not null,
    constraint `PRIMARY`
        primary key (id)
);

create table if not exists profile
(
    Idprofile int auto_increment constraint `PRIMARY`
			primary key,
    phonenum  varchar(255) not null,
    address   varchar(255) not null,
    rib       varchar(255) not null
)
    engine = InnoDB
    charset = utf8
    row_format = DYNAMIC;

create table if not exists room
(
    room_id      int auto_increment constraint `PRIMARY`
			primary key,
    capacity     int          not null,
    description  varchar(255) not null,
    is_available char         not null,
    user_id      int          not null,
    title        varchar(200) null,
    persons      varchar(100) null,
    price        varchar(100) null,
    type         varchar(100) null,
    location     varchar(200) null
)
    engine = InnoDB
    charset = utf8
    auto_increment = 11
    row_format = DYNAMIC;

create table if not exists user
(
    Iduser   int(10) auto_increment constraint `PRIMARY`
			primary key,
    Username varchar(255) not null,
    Password varchar(255) not null,
    Email    varchar(255) not null
)
    engine = InnoDB
    charset = utf8
    auto_increment = 2
    row_format = DYNAMIC;


