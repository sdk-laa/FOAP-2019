/* (1) */
/*1.	Modificar el camp titol de la taula empleats al valor ‘representant’, 
		d’aquells que tinguin un valor 'representante'.*/
update empleats set titol="representant" where titol ="representante";

/* (2) */
/*2.	Volem actualitzar les salaris dels nostres empleats de tal forma que la salari 
		d'un empleat sigui el 50% de l'objectiu de la seva oficina.*/
update empleats e set e.salari=(select 0.5*o.objectiu from oficines o where e.oficina=o.oficina);

/* (3) */
/*3.	Volem posar a zero les vendes dels empleats de l'oficina 12.*/
update empleats set vendes=0 where oficina = 12;

/* (4) */
/*4.	Volem posar a zero el limit de crèdit dels clients assignats a empleats de l'oficina 12.*/
select * from clients cl, comanda c where cl.numclie=c.clie group by c.rep_ven;

update clients  set limitcredit=0 where -- NO FUNCIONA*********
	(select distinct e.numemp as Empleado, c.clie as Cliente from empleats e, comanda c 
		where oficina=12 and e.numemp=c.rep_ven)
and 
	(select distinct cl.nom, cl.limitcredit from clients cl, comanda c 
			where cl.numclie=c.clie);

