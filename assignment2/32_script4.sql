USE 32_assign2db;
CREATE VIEW viewtrip AS 
SELECT passenger.first_name, passenger.last_name, bus_trip.trip_name, bus_trip.country_visited, books.trip_price 
FROM bus_trip
INNER JOIN books ON bus_trip.trip_id = books.trip_id
INNER JOIN passenger ON books.passenger_id = passenger.passenger_id
WHERE books.trip_id IS NOT NULL;

SELECT * FROM viewtrip;
SELECT * FROM viewtrip WHERE trip_name LIKE '%Castles%' ORDER BY trip_price ASC;
SELECT * FROM bus;
DELETE FROM bus WHERE license_plate_num LIKE '%UWO%';
SELECT * FROM bus;
SELECT * FROM passport;
SELECT * FROM passenger;
DELETE FROM passport WHERE citizenship = 'Canada';
SELECT * FROM passport;
SELECT * FROM passenger;
-- the reason why the table passenger and passport was affected was because of the delete on cascade command made when creating the table.
-- the deletion deleted all of the Canadian citizens in the passport table and also deleted the corrisponding passenger from the passenger table because they were linked with a foreign key.
SELECT * FROM bus_trip;
DELETE FROM bus_trip WHERE trip_name = '"California Wines"';
SELECT * FROM bus_trip;
DELETE FROM bus_trip WHERE trip_name = '"Arrivaderci Roma"';
-- the reason why this trip cannot be deleted is because of the foreign key referance. trip_id reverences bus_trip and we did not create a delete on cascade when creating the table.
-- this means that the file cannot be deleted because of the foreign key limitations.
SELECT * FROM passenger;
DELETE FROM passenger WHERE first_name = 'Pam';
SELECT * FROM passenger;
SELECT * FROM viewtrip;
DELETE FROM passenger WHERE last_name = 'Simpson';
SELECT * FROM viewtrip;
