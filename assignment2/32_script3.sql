USE 32_assign2db;
-- Query 1
SELECT trip_name FROM bus_trip;
-- Query 2
SELECT DISTINCT(last_name) FROM passenger;
-- Query 3
SELECT * FROM bus_trip ORDER BY trip_name;
-- Query 4
SELECT trip_name, country_visited, start_date FROM bus_trip WHERE start_date > '2022/4/30';
-- Query 5
SELECT first_name, last_name, passport.birth_date FROM passenger INNER JOIN passport ON passenger.passport_num=passport.passport_num WHERE passport.citizenship = 'USA';
-- Query 6
SELECT trip_name, bus.capacity FROM bus_trip INNER JOIN bus ON bus_trip.license_plate_num=bus.license_plate_num WHERE bus_trip.start_date>='2022/4/1' AND bus_trip.start_date<='2022/9/1';
-- Query 7
SELECT *,CURDATE() FROM passport 
WHERE passport.expiry_date<CURDATE() OR passport.expiry_date BETWEEN CURDATE() and ADDDATE(CURDATE(), INTERVAL 365 DAY);
-- Query 8
SELECT first_name, last_name, trip_name FROM bus_trip 
INNER JOIN books ON bus_trip.trip_id = books.trip_id
INNER JOIN passenger ON books.passenger_id = passenger.passenger_id
WHERE passenger.last_name LIKE 'S%';
-- Query 9
SELECT COUNT(*) as castle_of_Germany_count, bus_trip.trip_name, bus_trip.trip_id FROM bus_trip
INNER JOIN books ON bus_trip.trip_id = books.trip_id
WHERE bus_trip.trip_name='"Castles of Germany"';
-- Query 10
SELECT country_visited, SUM(books.trip_price) FROM bus_trip
INNER JOIN books ON bus_trip.trip_id=books.trip_id
GROUP BY country_visited;
-- Query 11
SELECT passenger.first_name, passenger.last_name, passport.citizenship, bus_trip.trip_name, bus_trip.country_visited FROM bus_trip
INNER JOIN books ON bus_trip.trip_id=books.trip_id
INNER JOIN passenger ON books.passenger_id=passenger.passenger_id
INNER JOIN passport ON passenger.passport_num=passport.passport_num
WHERE NOT passport.citizenship=bus_trip.country_visited;
-- Query 12
SELECT DISTINCT bus_trip.trip_id, trip_name FROM bus_trip
WHERE NOT EXISTS
(SELECT DISTINCT trip_id FROM books
WHERE books.trip_id=bus_trip.trip_id);
-- Query 13
CREATE VIEW total_paid AS SELECT passenger.first_name, passenger.last_name, passport.citizenship, SUM(books.trip_price) AS sum_paid 
FROM passenger, passport, books
WHERE passenger.passport_num=passport.passport_num AND passenger.passenger_id=books.passenger_id
GROUP BY passenger.first_name;
SELECT first_name, last_name, citizenship, MAX(sum_paid) AS sum_paid
FROM total_paid
WHERE sum_paid = (SELECT MAX(sum_paid) FROM total_paid);
-- Query 14
SELECT trip_name, COUNT(*) as booking_count FROM bus_trip
INNER JOIN books ON bus_trip.trip_id = books.trip_id
GROUP BY books.trip_id
HAVING booking_count<4;
-- Query 15
SELECT bus_trip.trip_name as Bus_Trip_Name, bus.capacity as Capacity_of_Assigned_Bus, bus.license_plate_num as Current_Bus_Assigned_License_Plate, COUNT(*) as Current_Number_of_Passengers
FROM bus
INNER JOIN bus_trip ON bus.license_plate_num=bus_trip.license_plate_num
INNER JOIN books ON bus_trip.trip_id=books.trip_id
GROUP BY books.trip_id;
