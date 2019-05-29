/* (1) */
select  e.nom, sum(c.import_total) from empleats e inner join comanda c 
	on e.numemp=c.rep_ven and e.nom="Vicente Pantalla";
select  e.nom as Empleado, sum(c.import_total) as "Importe total comandas realizadas" 
	from empleats e, comanda c 
	where e.numemp=c.rep_ven and e.nom="Vicente Pantalla";

/* (2) */
select min(data) as "Primera Comanda" from  comanda; 
-- las funciones min, max,  suma ... se ponen despues de select

/* (3) */
select count(c.import_total) from  comanda c  where c.import_total>25000;

/* (4) */
select o.oficina, count(e.oficina) as "Numero empleados"  from empleats e right join oficines o 
	on e.oficina=o.oficina group by o.oficina;
select o.oficina, count(e.numemp) as "Numero empleados"  from empleats e, oficines o 
	where e.oficina=o.oficina group by o.oficina; -- con el where no salen las oficinas que tienes 0 empleados

/* (5) */
select o.ciutat, count(e.numemp) as "Numero empleados"  from empleats e 
	right join oficines o on e.oficina=o.oficina group by o.ciutat;
select o.ciutat, count(e.numemp) as "Numero empleados"  from empleats e, oficines o 
	where e.oficina=o.oficina group by o.ciutat;

/* (6) */
select e.numemp, e.nom as Empleado, clie, sum(c.import_total) as "Numero Cliente" from empleats e 
	left join comanda c on e.numemp=c.rep_ven group by numemp, clie;
select e.numemp, e.nom as Empleado, clie, sum(c.import_total) as "Numero Cliente" from empleats e, comanda c 
	where e.numemp=c.rep_ven group by numemp, clie;

/* (7) */
select numemp, avg(vendes) as "Importe medio" from empleats
	group by numemp having sum(vendes)>30000;
select rep_ven, avg(import_total) as "Importe medio" from comanda
	group by rep_ven having sum(import_total)>30000;
    
/* (8) */
