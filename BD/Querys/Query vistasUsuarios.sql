use databaseingexis;
--======================================--
-- CREATE VIEW dat_tar_Usuarios AS
-- select 
--     log_usuarios.img_log as 'img',
--     usuarios.apodo as 'apodo',
--     CONCAT(usuarios.nombre1, ' ', usuarios.nombre2, ' ', usuarios.Primer_ape, ' ', usuarios.Segund_ape) as 'nombre',
--     usuarios.puesto as 'puesto',
--     usuarios.Num_contacto as 'numero',
--     log_usuarios.correo as 'correo'
-- from 
--     log_usuarios, 
--     usuarios 
-- where log_usuarios.id_usuario = usuarios.id_usuario;
--======================================--
create view dat_usuarios AS 
select 
    usuarios.apodo as 'apodo',
    usuarios.puesto as 'puesto',
    usuarios.nombre1 as 'nom1',
    usuarios.nombre2 as 'nom2',
    usuarios.Primer_ape as 'ape1',
    usuarios.Segund_ape as 'ape2',
    usuarios.rfc as 'rfc',
    usuarios.Curp as 'curp',
    usuarios.Num_contacto as 'telefono',
    log_usuarios.correo as 'correo',
    log_usuarios.contra as 'contra',
    usuarios.calleP as 'calle',
    usuarios.Entrecalles as 'entre',
    usuarios.numero as 'numCasa',
    usuarios.cod_postal as 'codPostal',
    usuarios.colonia as 'colonia'
FROM 
    log_usuarios,
    usuarios
where usuarios.id_usuario = log_usuarios.id_usuario;
--======================================--