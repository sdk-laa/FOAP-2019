SELECT DISTINCT oficina from empleats;
SELECT nom, oficina, edat from empleats where oficina = 12 and edat>30;
SELECT numemp, nom from empleats where vendes>salari;
SELECT numemp, nom, contracte from empleats where contracte<"1988-01-01";
SELECT numemp, nom, YEAR(contracte) from empleats where YEAR(contracte)<1988;
SELECT * from oficines where vendes<(objectiu*0.8) ;
SELECT * from oficines where dir=108;
SELECT * from empleats where vendes between 100000 and 500000;
SELECT * from empleats where vendes>=100000 and vendes<=500000; 
SELECT numemp, nom from empleats where oficina=12 or oficina=14 or oficina=16;
SELECT numemp, nom from empleats where oficina in(12,14,16);
SELECT * from oficines where dir is null;
SELECT * from empleats where oficina is not  null;
SELECT * from empleats where nom like  "Luis%";
SELECT * from empleats where nom like  "%Luis%";
SELECT * from empleats where nom like  "__a%";
SELECT preu, preu*1.21 from productes;
SELECT numcomanda, codfab, codprod, quant, import, quant*import, 

