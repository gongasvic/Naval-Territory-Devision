SELECT concelho, ano, mes, value 
FROM lance_mais_elevado NATURAL JOIN localizacao_leiloeira_dimension NATURAL JOIN temp_dimension
WHERE ano >= 2012 AND ano <= 2013
GROUP BY concelho,ano, mes WITH ROLLUP