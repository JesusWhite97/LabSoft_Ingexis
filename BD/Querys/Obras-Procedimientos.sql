use databaseingexis;
-- =================================================
create procedure Obra_agregar(in id_cliente int, in nombre varchar(50), in direccion text, in anotaciones text)
begin
    insert obras(obras.id_clientes, obras.nombre, obras.direccion, obras.anotaciones) VALUES (id_cliente, nombre, direccion, anotaciones); 
end
-- =================================================
create procedure Obra_eliminar(in id_obra int)
begin
    DELETE mu from obras as ob inner join elemento as el on el.id_obra = ob.id_obra inner join muestra as mu on mu.id_elemento = el.id_elemento where ob.id_obra = id_obra;   
    DELETE el from obras as ob inner join elemento as el on el.id_obra = ob.id_obra where ob.id_obra = id_obra;
    DELETE from obras WHERE obras.id_obra = id_obra;
end
-- =================================================
create procedure Obra_modificar(in id_obra int, in nombre varchar(50), in direccion text, in anotaciones text)
begin
    UPDATE obras 
    set
        obras.nombre = nombre,
        obras.direccion = direccion,
        obras.anotaciones = anotaciones
    where
        obras.id_obra = id_obra;
end
-- =================================================
create procedure Obra_by_id(in id_obra int)
begin
    select * from obras WHERE obras.id_obra = id_obra;
end
-- =================================================
create procedure Obra_full_by_client(in id_cliente int)
begin
    select * from obras where obras.id_clientes = id_clientes;
end
-- =================================================
create procedure Obra_full()
begin
    select * from obras;
end
-- =================================================
create procedure Obra_elementos(in id_obra int)
begin
    select * from elemento WHERE elemento.id_obra = id_obra;
end
-- =================================================