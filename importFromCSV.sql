SET SERVEROUTPUT ON
/

create or replace procedure readFromCSV AS
	F UTL_FILE.FILE_TYPE;
	V_LINE varchar2(1000);
	nrFactura NUMBER(10);
	userJuicy NUMBER(13);
	suma NUMBER(8);
	data DATE;

	begin
	F:=UTL_FILE.FOPEN('MYCSV', 'facturiCSV.csv', 'R');

	if UTL_FILE.is_open(F) then
	begin
	loop
		begin
		UTL_FILE.get_line(F, V_LINE);

		if V_LINE is null then
			exit;
		end if;

		nrFactura := regexp_substr(v_line, '[^,]+', 1, 1);
		userJuicy := regexp_substr(v_line, '[^,]+', 1, 2);
		suma := regexp_substr(v_line, '[^,]+', 1, 3);
		data := regexp_substr(v_line, '[^,]+', 1, 4);

		insert into facturi values(nrFactura, userJuicy, suma, data);
		commit;
		exception
		when no_data_found then
			exit;
		end;
	end loop;
	end;
	end if;

	UTL_FILE.fclose(F);
	end;
/