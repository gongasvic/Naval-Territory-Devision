delimiter //

DROP TABLE IF EXISTS perg4_trigger		
CREATE TRIGGER perg4_trigger BEFORE INSERT ON lance
FOR EACH ROW

BEGIN
	DECLARE valor_lance integer;
	DECLARE valor_base integer;
	DECLARE	valor_actual integer;
	
	SET valor_lance = (SELECT valor_lance FROM tabLances WHERE lid=new.leilao)
	SET valor_base = (SELECT valor_base FROM leilao_de_recurso, leiloes WHERE lid=new.leilao and leilao_de_recurso.lid=leiloes.lid)

	IF (valor_lance < valor_base) 
		THEN CALL ERROR()
	END IF;
		
	SET valor_actual = (SELECT valor_actual FROM tabLances WHERE lid=new.leilao)
	
	valor_actual=SELECT MAX(valor) FROM lance
	WHERE leilao=NEW.leilao
	
	IF NEW.valor_lance<valor_actual --Max dos lances
		THEN CALL ERROR()
	END IF;
	
	END IF;
END //
delimiter ;
