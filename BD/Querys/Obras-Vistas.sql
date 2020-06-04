use databaseingexis;
-- =================================================
-- create view Tarjetas_Obras AS
-- select 
--     obras.id_obra,
--     obras.nombre,
--     clientes.nom_empr
-- from 
--     clientes,
--     obras
-- WHERE
--     clientes.id_clientes = obras.id_clientes;
-- =================================================
create view Info_obra_clien AS
select 
    obras.id_obra,
    clientes.nom_empr,
    obras.nombre,
    obras.direccion,
    obras.anotaciones
from
    clientes,
    obras
WHERE 
    clientes.id_clientes = obras.id_clientes;
-- =================================================