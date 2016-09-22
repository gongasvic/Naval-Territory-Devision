DROP INDEX indicc ON pessoac;
set profiling = 1;

SELECT
	A.nif
FROM
	pessoac A,
	pessoac B
WHERE
	A.capitalsocial = B.capitalsocial
AND A.nif <> B.nif;

show profiles;

CREATE INDEX indicc ON pessoac(capitalsocial);

SELECT
	A.nif
FROM
	pessoac A,
	pessoac B
WHERE
	A.capitalsocial = B.capitalsocial
AND A.nif <> B.nif;

SHOW PROFILES;

EXPLAIN SELECT A.nif FROM pessoac A, pessoac B WHERE A.capitalsocial = B.capitalsocial AND A.nif <> B.nif;