create table Person(
    id          bigint(20)  NOT NULL AUTO_INCREMENT,
    user_id     bigint(20)  NOT NULL,
    user_name   varchar(20) NOT NULL,
    phone       varchar(10) NOT NULL,
    email       varchar(64) NOT NULL,
    addr        varchar(64) NOT NULL,
    password    varchar(30) NOT NULL,
    pos         int DEFAULT 1,
    date        timestamp on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    primary key (id)
    ) ENGINE=INNODB DEFAULT CHARSET=utf8 COLLATE utf8_general_ci;

create table Member(
    id          bigint(20) NOT NULL,
    rank        float DEFAULT 2.5,
    foreign key (id) references Person(id)
		on delete cascade
)ENGINE=INNODB DEFAULT CHARSET=utf8 COLLATE utf8_general_ci;

create table Driver(
    id          bigint(20)  NOT NULL,
    car         varchar(10) NOT NULL,
    licence     varchar(10) NOT NULL,
    area        varchar(10) NOT NULL,
    foreign key (id) references Person(id)
		on delete cascade
) ENGINE=INNODB DEFAULT CHARSET=utf8 COLLATE utf8_general_ci;

create table Orders(
    order_id    bigint(20) NOT NULL AUTO_INCREMENT,
    time        timestamp on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    primary key (order_id)
) ENGINE=INNODB DEFAULT CHARSET=utf8 COLLATE utf8_general_ci;

create table Trans(
    trans_id    bigint(20) NOT NULL AUTO_INCREMENT,
	cur_state	int NOT NULL,
	addr        varchar(64) NOT NULL,
	time        timestamp on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	primary key (trans_id)
) ENGINE=INNODB DEFAULT CHARSET=utf8 COLLATE utf8_general_ci;

create table Product(
	product_id	bigint(20) NOT NULL AUTO_INCREMENT,
	p_name		varchar(20) NOT NULL,
	cost		int NOT NULL,
	primary key (product_id)
) ENGINE=INNODB DEFAULT CHARSET=utf8 COLLATE utf8_general_ci;

create table Work(
	id			bigint(20),
	trans_id	bigint(20),
	foreign key (id) references Person(id),
	foreign key (trans_id) references Trans(id)
) ENGINE=INNODB DEFAULT CHARSET=utf8 COLLATE utf8_general_ci;

create table States(
	order_id	bigint(20),
	trans_id	bigint(20),
	foreign key (order_id) references Orders(id),
	foreign key (trans_id) references Trans(id)
) ENGINE=INNODB DEFAULT CHARSET=utf8 COLLATE utf8_general_ci;

create table Buy(
	id			bigint(20),
	order_id	bigint(20),
	foreign key (id) references Person(id),
	foreign key (order_id) references Orders(id)
) ENGINE=INNODB DEFAULT CHARSET=utf8 COLLATE utf8_general_ci;

create table Sell(
	id			bigint(20),
	order_id	bigint(20),
	foreign key (id) references Person(id),
	foreign key (order_id) references Orders(id)
) ENGINE=INNODB DEFAULT CHARSET=utf8 COLLATE utf8_general_ci;

create table Own(
	id			bigint(20),
	product_id	bigint(20),
	foreign key (id) references Person(id),
	foreign key (product_id) references Product(id)
) ENGINE=INNODB DEFAULT CHARSET=utf8 COLLATE utf8_general_ci;

create table Contain(
	order_id	bigint(20),
	amount		bigint(20),
	product_id	bigint(20),
	foreign key (order_id) references Order(id),
	foreign key (product_id) references Product(id)
) ENGINE=INNODB DEFAULT CHARSET=utf8 COLLATE utf8_general_ci;