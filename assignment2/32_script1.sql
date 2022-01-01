show databases;
DROP DATABASE IF EXISTS 32_assign2db;
CREATE DATABASE 32_assign2db;
USE 32_assign2db;
SHOW TABLES;
-- creates bus table
CREATE TABLE bus (license_plate_num CHAR(7) NOT NULL , capacity INT NOT NULL, PRIMARY KEY (license_plate_num));
-- creates bus trip table
CREATE TABLE bus_trip (trip_id INT NOT NULL, trip_name VARCHAR(50) NOT NULL, start_date DATE NOT NULL, end_date DATE NOT NULL, country_visited VARCHAR(30) NOT NULL, license_plate_num CHAR(7) NOT NULL, PRIMARY KEY(trip_id), FOREIGN KEY (license_plate_num) REFERENCES bus(license_plate_num));
-- creates passport table
CREATE TABLE passport (passport_num CHAR(4) NOT NULL, citizenship VARCHAR(30) NOT NULL, expiry_date DATE NOT NULL, birth_date DATE NOT NULL, PRIMARY KEY(passport_num));
-- creates passenger table
CREATE TABLE passenger (passenger_id INT NOT NULL, first_name VARCHAR(20) NOT NULL, last_name VARCHAR (20) NOT NULL, passport_num CHAR(4) NOT NULL, PRIMARY KEY(passenger_id), FOREIGN KEY(passport_num) REFERENCES passport(passport_num) ON DELETE CASCADE);
-- creates books table for M-N relationship between passenger and bus_trips
CREATE TABLE books (trip_id INT NOT NULL, passenger_id INT NOT NULL, trip_price VARCHAR(10) NOT NULL, FOREIGN KEY(trip_id) REFERENCES bus_trip(trip_id), FOREIGN KEY(passenger_id) REFERENCES passenger(passenger_id) ON DELETE CASCADE);
SHOW TABLES;
