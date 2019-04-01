SELECT `last_name`, `first_name`, DATE_FORMAT(birthdate, "%Y-%m-%d") AS `birthdate`
FROM `user_card` WHERE YEAR(birthdate) LIKE "%1989%" ORDER BY last_name ASC;