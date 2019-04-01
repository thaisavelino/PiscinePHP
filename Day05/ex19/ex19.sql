-- Display in an ’uptime’ column the number of absolute days separating the oldest
-- viewing of a movie with the most recent.
SELECT DATEDIFF(MAX(date), MIN(date)) AS 'uptime' FROM member_history;
-- or
-- SELECT DATEDIFF(MAX(date_last_film), MIN(date_last_film)) AS `uptime` FROM member;
-- I am not sure wich one to take