CREATE TABLE euler.primes (
id int unsigned not null AUTO_INCREMENT primary key,
val int unsigned not null unique ,
lastUpdate timestamp not null default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP
);