/*1. Llista les oficines on l'objectiu de vendes de l'oficina excedeixi la suma de salaris
dels venedors individuals (d'aquella oficina).*/

SELECT 
    o.oficina, o.ciutat
FROM
    oficines o
WHERE
    objectiu > (SELECT 
            SUM(salari)
        FROM
            empleats e
        WHERE
            e.oficina = o.oficina);

/*2. Empleats amb salari que siguin iguals o superiors a l'objectiu de llur oficina de
vendes (emprant subconsultes i sense subconsultes).*/

SELECT 
    numemp, nom
FROM
    empleats e
WHERE
    salari >= (SELECT 
            objectiu
        FROM
            oficines
        WHERE
            oficina = e.oficina); 
/*con join, une las tablas y crea una virtual*/

select 
    numemp, nom
from
    empleats e,
    oficines o
where
    salari >= objectiu
        and o.oficina = e.oficina; 


/*3. Llista dels productes del fabricant ACI per als quals les existències superen les
existències del producte amb fabricant ACI i codi producte 41004.*/

SELECT 
    codprod, codfab
FROM
    productes
WHERE
    codfab = 'aci'
        AND existencies > (SELECT 
            existencies
        FROM
            productes
        WHERE
            codprod = '41004' AND codfab = 'aci');

/*4. Llistar els venedors que no treballen en oficines dirigides per l'empleat 108.*/
/*se puede hacer con un not in o con not exists*/
/* esto da las oficinas donde dirige el 108
select oficina from oficines where dir=108*/
SELECT 
    numemp, nom, oficina
FROM
    empleats
WHERE
    oficina NOT IN (SELECT 
            oficina
        FROM
            oficines
        WHERE
            dir = 108);

/*con not exists (hay que hacer join entre la tabla de dentro y la de fuera*/
SELECT 
    numemp, nom, oficina
FROM
    empleats e
WHERE
    oficina IS NOT NULL
        AND NOT EXISTS( SELECT 
            oficina
        FROM
            oficines
        WHERE
            dir = 108 AND e.oficina = oficina);


/*5. Llista de productes (amb la descripció) per als quals s'ha rebut una comanda
d'import 25.000 o més. (Considerant productes de qualsevol fabricant).*/

SELECT 
    p.codfab, p.codprod, p.descr
FROM
    productes p
WHERE
    EXISTS( SELECT 
            *
        FROM
            linia_comanda lc
        WHERE
            lc.codprod = p.codprod
                AND lc.codfab = p.codfab
                AND lc.import >= 25000);

/*6. Llistar els noms dels clients que tenen assignat el representant Alvaro Jaumes
(suposant que no poden haver hi representants amb el mateix nom).*/

SELECT 
    numclie, nom
FROM
    clients
WHERE
    EXISTS( SELECT 
            *
        FROM
            empleats,
            comanda
        WHERE
            clie = numclie AND rep_ven = numemp
                AND nom = 'Alvaro Jaumes');
                
/*otra opción, una subselect que condiciona que sea Alvaro Jaume; si es cierto
mira que el cliente tenga comanda: por cada cliente mira si tiene comanda y Alvaro
Jaume, si es cierto lo muestra, sino no*/

SELECT 
    numclie, nom
FROM
    clients
WHERE
    EXISTS( SELECT 
            *
        FROM
            comanda
        WHERE
            clie = numclie AND exists 
            (select* from empleats
            where rep_ven=numemp
                AND nom = 'Alvaro Jaumes'));

/*el mismo ejemplo, con el in*/
SELECT 
    numclie, nom
FROM
    clients
WHERE
    EXISTS( SELECT 
            *
        FROM
            comanda
        WHERE
            clie = numclie
                AND rep_ven IN (SELECT 
                    numemp
                FROM
                    empleats
                WHERE
                    nom = 'Alvaro Jaumes'));


/*7. Llistar els empleats (numemp, nom, i núm. d'oficina) que treballen en oficines
"bones" (les que tenen vendes superiors al seu)*/

SELECT 
    numemp, nom, oficina
FROM
    empleats
WHERE
    oficina IN (SELECT 
            oficina
        FROM
            oficines
        WHERE
            vendes > objectiu);
/*el mismo con exists*/
SELECT 
    numemp, nom, oficina
FROM
    empleats e
WHERE
    EXISTS( SELECT 
            oficina
        FROM
            oficines
        WHERE
            vendes > objectiu
                AND e.oficina = oficina);

/*8. Empleats que NO treballen en oficines dirigides per Ana Bustamante.- primero vemos 
cuales son las oficinas dirigidas por ana*/

select o.oficina from oficines o, empleats e where e.numemp=o.dir and lower(e.nom) 
like "%bustamante%");

/*ahora busca los empleados que no trabajan en estas oficinas*/

select * from empleats e where e.oficina not in (
select o.oficina from oficines o, empleats e where e.numemp=o.dir and lower(e.nom) 
like "%bustamante%");

/*9. Llistar els clients assignats a Ana Bustamante que no tenen ninguna comanda
superior a 50000.*/


