/* (1) */
select ps.nombre, ps.Apellidos, ps.dni from vuelo v, pasaje p, pasajeros ps
		where Origen = "Bellevue" and v.IdVuelo=p.IdVuelo and ps.IdPasajero = p.IdPasajero
		order by nombre desc;

/* (2) */
select a.IdAvion, count(v.IdVuelo) as "Numero de vuelos realizados" from avion a
		left join vuelo v on a.IdAvion=v.IdAvion group by a.IdAvion;

/* (3) */
select * from avion where Fabricante = "boeing" and 
	Capacidad > (select Capacidad from avion 
				where Matricula = "03020" and Fabricante = "boeing"); 

/* (4) */
select ps.nombre, ps.Apellidos, p.Asiento from  pasaje p, pasajeros ps
		where p.IdVuelo = "77" and ps.IdPasajero = p.IdPasajero and Nombre like "H%";
        
/* (5) */
-- * Sin Subconsultas:
select a.IdAvion, count(v.IdVuelo) as "Numero de vuelos realizados" from avion a    
		left join vuelo v on a.IdAvion=v.IdAvion group by a.IdAvion having count(v.IdVuelo)=0;

-- *** Con Subconsultas:
select a.IdAvion from avion a where a.IdAvion is not null and not exists            
	(select * from vuelo v where a.IdAvion= v.IdAvion);

/* (6) */
select * from vuelo where Fecha>"2017-12-01" and Origen="Pemuco" or Origen="San Pedro";

/* (7) */ 
select e.IdEmpleado, e.Nombre, e.Apellidos, count(t.IdVuelo) as "Numero de vuelos" from empleados e
		left join tripulacion t on e.IdEmpleado=t.IdEmpleado group by e.IdEmpleado having count(t.IdVuelo)>2;

/* (8) */ 
select distinct p.IdVuelo, ps.IdPasajero, ps.Nombre as Pasajero, t.IdVuelo, e.IdEmpleado, e.Nombre as Empleado 
	from pasajeros ps, pasaje p, empleados e, tripulacion t, avion a, vuelo v
	where ps.IdPasajero=p.IdPasajero and e.IdEmpleado=t.IdEmpleado and p.IdVuelo=t.IdVuelo and p.IdVuelo=v.IdVuelo 
    and t.IdVuelo=v.IdVuelo and v.IdAvion=a.IdAvion and a.Fabricante like "Airbus" order by Pasajero;

/* (9) */ 
insert into empleados (DNI, Nombre, Apellidos, CategoriaProfesional) 
	values ('12345678R', 'Joan', 'Soler Pineda ', 'Director general');
    
/* (10) */ 
insert into tripulacion(IdVuelo, IdEmpleado, PuestoOcupado) 
	(select IdVuelo, IdEmpleado, "Piloto" from vuelo, empleados 
	where IdVuelo="12" and IdEmpleado="101") ;

/* (11) */ 
delete from avion  where IdAvion not in (select v.IdAvion from vuelo v where v.IdAvion is not null);

/* (12) */ 
update avion set AutonomiaVuelo=AutonomiaVuelo*0.9 where IdAvion 
	in (select count(v.IdVuelo) as "Numero de vuelos" from vuelo v
		where v.IdAvion group by v.IdAvion having count(v.IdVuelo) > 2) ;
        
        