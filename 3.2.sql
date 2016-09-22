SELECT
	P.nome
FROM
	concorrente C,
	pessoa P,
	pessoac E
WHERE
	E.nif = C.pessoa
AND P.nif = E.nif
GROUP BY
	C.pessoa
HAVING
	COUNT(DISTINCT C.leilao) = 2