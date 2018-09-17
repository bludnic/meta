SELECT `id`, `text` 
FROM `posts` 
GROUP BY id 
HAVING COUNT(id) > 1
