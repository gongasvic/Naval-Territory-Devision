SELECT
	A.nif
FROM
	pessoac A,
	pessoac B
WHERE
	A.capitalsocial = B.capitalsocial
AND A.nif <> B.nif