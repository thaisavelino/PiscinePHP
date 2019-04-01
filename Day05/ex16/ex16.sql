SELECT COUNT(*) AS 'movies' FROM member_history
WHERE (DATE(date) BETWEEN '2006-10-29' AND '2007-07-28')
OR (MONTH(date) = 12 AND DAY(date) = 24);