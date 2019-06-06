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

/* (7) */ -- falta terminar
select e.IdEmpleado, t.IdVuelo from tripulacion t, empleados e where ;
select e.IdEmpleado, count(t.IdVuelo) as "Numero de vuelos" from empleados e
		left join tripulacion t on e.IdEmpleado=t.IdEmpleado group by t.IdEmpleado;
