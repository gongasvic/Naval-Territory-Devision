DROP INDEX indicb ON leilao;

set profiling = 1;

SELECT DISTINCT
	T.leilao
FROM
	(
		SELECT DISTINCT
			L.valor / G.valorbase AS teste,
			L.valor,
			G.valorbase,
			L.leilao
		FROM
			lance L,
			leilao G
		ORDER BY
			teste DESC
	) AS T
LIMIT 1;

show profiles;

CREATE INDEX indicb ON leilao(valorbase);

SELECT DISTINCT
	T.leilao
FROM
	(
		SELECT DISTINCT
			L.valor / G.valorbase AS teste,
			L.valor,
			G.valorbase,
			L.leilao
		FROM
			lance L,
			leilao G
		ORDER BY
			teste DESC
	) AS T
LIMIT 1;

show profiles;

EXPLAIN SELECT DISTINCT
	T.leilao
FROM
	(
		SELECT DISTINCT
			L.valor / G.valorbase AS teste,
			L.valor,
			G.valorbase,
			L.leilao
		FROM
			lance L,
			leilao G
		ORDER BY
			teste DESC
	) AS T
LIMIT 1;