CREATE TABLE users (
id bigserial PRIMARY KEY,
nick varchar(16) NOT NULL,
password varchar(20) NOT NULL
);

CREATE TABLE priorities (
user_id bigint references users(id) ON DELETE cascade,
id bigserial,
name varchar(40) NOT NULL,
priovalue bigint NOT NULL,
description varchar(500) NULL,
PRIMARY KEY (id)
);

CREATE TABLE categories (
user_id bigint references users(id) ON DELETE cascade,
id bigserial,
parent bigint NULL,
priority_id bigint references priorities(id) NULL,
name varchar(40) NOT NULL,
description varchar(500) NULL,
PRIMARY KEY(id)
);

CREATE TABLE tasks (
user_id bigint references users(id) ON DELETE cascade,
id bigserial,
category_id bigint references categories(id) NULL,
priority_id bigint references priorities(id) NULL,
name varchar(40) NOT NULL,
description varchar(500) NULL,
deadline date default NULL,
PRIMARY KEY(id)
);

CREATE TABLE ctjuncts (
category_id bigint references categories(id) ON DELETE cascade,
task_id bigint references taks(id) ON DELETE cascade,
PRIMARY KEY(category_id, task_id)
);
