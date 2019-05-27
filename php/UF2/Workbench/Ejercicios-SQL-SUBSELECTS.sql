/* (1) */
select o.oficina, o.objectiu, sum(e.salari) from oficines o 
	inner join empleats e on o.oficina= e.oficina  group by o.oficina;

select o.oficina from oficines o
		where o.objectiu > (select sum(e.salari) from empleats e where e.oficina= o.oficina) group by o.oficina;

select o.oficina, sum(e.salari) from oficines o, empleats e
		where e.oficina= o.oficina group by e.oficina;
