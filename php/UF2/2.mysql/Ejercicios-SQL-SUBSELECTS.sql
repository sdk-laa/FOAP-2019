/* (1) */
select o.oficina, o.objectiu, sum(e.salari) from oficines o 
	inner join empleats e on o.oficina= e.oficina  group by o.oficina having o.objectiu>sum(e.salari);     -- inner join
    
select o.oficina, o.objectiu, sum(e.salari) from oficines o, empleats e                -- Where
		where e.oficina= o.oficina group by e.oficina having o.objectiu>sum(e.salari);

select o.oficina, o.objectiu from oficines o                                           -- Subconsultas
		where o.objectiu > (select sum(e.salari) from empleats e where e.oficina= o.oficina);

/* (2) */
select e.oficina, e.nom, e.salari  from empleats e                                      -- Subconsultas
		where e.salari >= (select o.objectiu from oficines o where e.oficina= o.oficina);
        
/* (8) */
select * from empleats e where e.oficina not in (
	select o.oficina from oficines o, empleats e where e.numemp=o.dir and lower(e.nom) 
	like "%bustamante%");

/* (9) */
/* 9.	Llistar els clients assignats a Ana Bustamante que no tenen ninguna comanda superior a 50000 */
select * from clients c where c.numclie not in
	(select numemp from empleats e where lower(e.nom) like "%bustamante%");
