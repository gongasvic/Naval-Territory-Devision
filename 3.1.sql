SELECT
	pessoa
FROM
	concorrente
WHERE
	pessoa NOT IN (SELECT pessoa FROM lance)