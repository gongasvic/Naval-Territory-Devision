INSERT INTO lance_mais_elevado(dia,localizacao,value)
SELECT LR.dia, CONCAT(LEILEI.concelho, LEILEI.regiao), MAX(LA.valor)
FROM leilaor LR,lance LA, leiloeira LEILEI
WHERE LA.leilao = LR.lid AND LA.pessoa = LEILEI.nif 
GROUP BY LA.leilao