SELECT sum(vendes) from oficines;
SELECT count(nom) from empleats;
SELECT count(nom) from empleats where oficina is not null;
SELECT sum(vendes) from empleats where oficina =12;
SELECT sum(vendes) from empleats;
SELECT sum(vendes) as "Total de ventas de cada oficina", oficina from empleats group by oficina; -- Total de ventas de los empleados de cada oficina
SELECT codfab, codprod, sum(quant)  from linia_comanda group by codfab, codprod;
SELECT  regio, ciutat, sum(vendes) as "Total de ventas de por oficinas", oficina from oficines group by regio, ciutat; -- Total de ventas de las oficinas agrupados por region y ciudad
SELECT oficina, sum(vendes) as "Total de ventas por oficina" from empleats where oficina is not null group by oficina;
SELECT oficina, avg(vendes) as "Total de ventas" from empleats group by oficina having avg(vendes)>300000;
SELECT avg(salari) as "Salario medio", avg(vendes) as "Media de ventas" from empleats;
SELECT avg(import_total) as "Importe medio", sum(import_total) as "importe total" from comanda;
SELECT avg(import_total) as "Importe medio", sum(import_total) as "importe total" from comanda; -- falta terminar esta linea