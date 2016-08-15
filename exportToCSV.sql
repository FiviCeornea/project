SET SERVEROUTPUT ON
/

create or replace procedure writeToCSV AS
	F UTL_FILE.FILE_TYPE;
	nrFactura NUMBER(10);
	userJuicy NUMBER(13);
	suma NUMBER(8);
	data DATE;
	v_line varchar2(1000);

	CURSOR cursor IS
   SELECT * FROM facturi;

	begin
	F:=UTL_FILE.FOPEN('MYCSV', 'exportFacturiCSV.csv', 'W');

	if UTL_FILE.is_open(F) then
	begin
--	loop
		begin
		FOR rec IN cursor LOOP
	    BEGIN
	    	v_line:=rec.NR_FACTURA || ',' || rec.USER_JUICY || ',' || rec.SUMA || ',' || rec.DATA_FACTURA;
		    UTL_FILE.put_line(F, v_line);
    	END;
   		END LOOP;
		end;
--	end loop;
	UTL_FILE.fclose(F);
	end;
	end if;

	UTL_FILE.fclose(F);
	end;
/