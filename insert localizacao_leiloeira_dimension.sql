INSERT INTO localizacao_leiloeira_dimension(localizacao,regiao,concelho)
SELECT DISTINCT CONCAT(L.concelho, L.regiao), L.concelho, L.regiao
FROM leiloeira L
WHERE L.concelho IS NOT NULL
AND L.regiao IS NOT NULL