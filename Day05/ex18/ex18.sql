SELECT `id_distrib`, `name` FROM distrib
WHERE `id_distrib`
IN (42, 62, 63, 64, 65, 66, 67, 68, 69, 71, 88, 89, 90)
OR `name` LIKE '%y%y%' OR `name` LIKE '%Y%Y%'
LIMIT 2, 5;
-- or or and or.. i dont know.. and % im not sure if need all 3%