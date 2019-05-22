select *from oficines;
SELECT  nom, oficina, contracte from empleats;
SELECT  codfab, codprod, descr, preu from productes;
SELECT  codfab as Fabricante, codprod, descr, preu from productes; -- para poner espacios en el texto del nuevo nombre se pone entre comillas ex: "Fabricante de ..."
SELECT  ciutat, regio, (vendes-objectiu) from oficines where (vendes-objectiu)>0;
SELECT  codfab as fabricante, codprod, descr, existencies from productes;
SELECT  nom, MONTH(contracte) AS mes, YEAR(contracte) AS año from empleats;
SELECT  nom from empleats ORDER BY nom;
SELECT  nom, contracte from empleats ORDER BY contracte;
SELECT  numemp, nom, vendes from empleats ORDER BY vendes;
SELECT  numemp, nom, vendes, contracte from empleats ORDER BY contracte DESC;
SELECT  numemp, nom, vendes from empleats ORDER BY vendes DESC;
SELECT  oficina, regio, ciutat, vendes from oficines ORDER BY regio, ciutat;
SELECT  oficina, regio, ciutat, (vendes-objectiu) from oficines ORDER BY regio, (vendes-objectiu) DESC;
SELECT  dir as id_director, oficina from oficines;
SELECT DISTINCT dir as id_director from oficines; -- DISTINCT sirve para eliminar filas repitidas pero solo cuando cuansiden las columnas