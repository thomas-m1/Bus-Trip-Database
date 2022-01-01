USE 32_assign2db;
-- load data from infile for bus table
LOAD DATA LOCAL INFILE 'bus_infile.txt' INTO TABLE bus FIELDS TERMINATED BY ',';

SELECT * FROM passport;
INSERT INTO passport VALUES('US10', 'USA', '2025/1/1', '1970/2/19');
INSERT INTO passport VALUES('US12', 'USA', '2025/1/1', '1972/8/12');
INSERT INTO passport VALUES('US13', 'USA', '2025/1/1', '2001/5/12');
INSERT INTO passport VALUES('US14', 'USA', '2025/1/1', '2004/3/19');
INSERT INTO passport VALUES('US15', 'USA', '2025/1/1', '2012/9/17');
INSERT INTO passport VALUES('US22', 'USA', '2030/4/4', '1950/6/11');
INSERT INTO passport VALUES('US23', 'USA', '2018/3/3', '1940/6/24');
INSERT INTO passport VALUES('GE11', 'Germany', '2027/1/1', '1970/7/12');
INSERT INTO passport VALUES('US88', 'Canada', '2030/2/13', '1979/4/25');
INSERT INTO passport VALUES('US89', 'Canada', '2022/2/2', '1976/4/8');
INSERT INTO passport VALUES('US90', 'Italy', '2020/2/28', '1980/4/4');
INSERT INTO passport VALUES('US91', 'Germany', '2030/1/1', '1959/2/2');
INSERT INTO passport VALUES('US92', 'USA', '2025/1/1', '1955/9/22');
SELECT * FROM passport;

SELECT * FROM passenger;
INSERT INTO passenger VALUES('11', 'Homer', 'Simpson', 'US10');
INSERT INTO passenger VALUES('22', 'Marge', 'Simpson', 'US12');
INSERT INTO passenger VALUES('33', 'Bart', 'Simpson', 'US13');
INSERT INTO passenger VALUES('34', 'Lisa', 'Simpson', 'US14');
INSERT INTO passenger VALUES('35', 'Maggie', 'Simpson', 'US15');
INSERT INTO passenger VALUES('44', 'Ned', 'Flanders', 'US22');
INSERT INTO passenger VALUES('45', 'Todd', 'Flanders', 'US23');
INSERT INTO passenger VALUES('66', 'Heidi', 'Klum', 'GE11');
INSERT INTO passenger VALUES('77', 'Michael', 'Scott', 'US88');
INSERT INTO passenger VALUES('78', 'Dwight', 'Schrute', 'US89');
INSERT INTO passenger VALUES('79', 'Pam', 'Beesly', 'US90');
INSERT INTO passenger VALUES('80', 'Creed', 'Bratton', 'US91');
INSERT INTO passenger VALUES('90', 'Peter', 'Griffin', 'US92');
SELECT * FROM passenger;

SELECT * FROM bus_trip;
INSERT INTO bus_trip VALUES('1', '"Castles of Germany"', '2022/1/1', '2022/1/17', 'Germany', 'VAN1111');
INSERT INTO bus_trip VALUES('2', '"Tuscany Sunsets"', '2022/3/3', '2022/3/14', 'Italy', 'TAXI222');
INSERT INTO bus_trip VALUES('3', '"California Wines"', '2022/5/5', '2022/5/10', 'USA', 'VAN2222');
INSERT INTO bus_trip VALUES('4', '"Beaches Galore"', '2022/4/4', '2022/4/14', 'Bermuda', 'TAXI222');
INSERT INTO bus_trip VALUES('5', '"Cottage Country"', '2022/6/1', '2022/6/22', 'Canada', 'CAND123');
INSERT INTO bus_trip VALUES('6', '"Arrivaderci Roma"', '2022/7/5', '2022/7/15', 'Italy', 'TAXI111');
INSERT INTO bus_trip VALUES('7', '"Shetland and Orkney"', '2022/9/9', '2022/9/29', 'UK', 'TAXI111');
INSERT INTO bus_trip VALUES('8', '"Disney World and Sea World"', '2022/6/10', '2022/6/20', 'USA', 'VAN2222');
INSERT INTO bus_trip VALUES('9', '"Mertle beach"', '2022/8/12', '2022/8/25', 'USA', 'TAXI111');
INSERT INTO bus_trip VALUES('10', '"Haunted house"', '2022/6/22', '2022/6/26', 'Canada', 'CAND123');
SELECT * FROM bus_trip;

SELECT * FROM books;
INSERT INTO books VALUES('1', '11', '500');
INSERT INTO books VALUES('1', '22', '500');
INSERT INTO books VALUES('1', '33', '200');
INSERT INTO books VALUES('1', '34', '200');
INSERT INTO books VALUES('1', '35', '200');
INSERT INTO books VALUES('1', '66', '600.99');
INSERT INTO books VALUES('8', '44', '400');
INSERT INTO books VALUES('8', '45', '200');
INSERT INTO books VALUES('4', '78', '600');
INSERT INTO books VALUES('4', '80', '600');
INSERT INTO books VALUES('1', '78', '550');
INSERT INTO books VALUES('8', '33', '300');
INSERT INTO books VALUES('8', '34', '300');
INSERT INTO books VALUES('6', '11', '600');
INSERT INTO books VALUES('6', '22', '600');
INSERT INTO books VALUES('6', '33', '100');
INSERT INTO books VALUES('6', '34', '100');
INSERT INTO books VALUES('6', '35', '100');
INSERT INTO books VALUES('7', '11', '300');
INSERT INTO books VALUES('7', '44', '400');
INSERT INTO books VALUES('7', '77', '500');
INSERT INTO books VALUES('10', '90', '900');
SELECT * FROM books;

SELECT * FROM passport;
SELECT * FROM passenger;
UPDATE passport
INNER JOIN passenger ON passport.passport_num=passenger.passport_num
SET passport.citizenship='Germany'
WHERE passenger.first_name='Dwight' AND passenger.last_name="Schrute"; 
SELECT * FROM passport;
SELECT * FROM passenger;

SELECT * FROM bus_trip;
UPDATE bus_trip SET license_plate_num='VAN1111' WHERE country_visited='USA';
SELECT * FROM bus_trip;
