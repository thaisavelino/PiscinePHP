SELECT `title`,`summary` FROM `film`
WHERE upper(`summary`) LIKE "%VINCENT%"
ORDER BY `id_film` ASC