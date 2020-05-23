use databaseingexis;
-- =================================================
create procedure ElemMues_agregar(
    in id_obra int,
    in id_usuario int,
    in nombre varchar(50),
    in observaciones text,
    in fecha_reg date,
    ------------------------------
    in iden1 varchar(10),
    in iden2 varchar(10),
    in iden3 varchar(10)
)
begin
    insert elemento(elemento.id_obra, elemento.id_usuario, elemento.nombre, elemento.observaciones, elemento.fecha_reg)
        values (id_obra, id_usuario, nombre, observaciones, fecha_reg);
    ------------------------------
    insert into id_elem values(last_insert_id());
    ------------------------------
    INSERT muestra(muestra.id_elemento, muestra.identificador, )
    ------------------------------
    ------------------------------
    ------------------------------
end
-- =================================================
-- =================================================
-- =================================================
-- =================================================