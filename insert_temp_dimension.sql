INSERT INTO temp_dimension (dia, ano, mes, diadomes) SELECT DISTINCT
	L.dia,
	YEAR (L.dia),
	MONTH (L.dia),
	DAY (L.dia)
FROM
	leilaor L