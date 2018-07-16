-- 
-- Editor SQL for DB table inventario_publico
-- Created by http://editor.datatables.net/generator
-- 

CREATE TABLE IF NOT EXISTS `inventario_publico` (
	`ID` int(10) NOT NULL auto_increment,
	`nombre_campo` varchar(255),
	`cod_equipo` varchar(255),
	`tipo_equipo` varchar(20),
	`sigla` varchar(255),
	`marca` varchar(255),
	`modelo` varchar(255),
	`numero_serie` varchar(255),
	`cod_interno` varchar(255),
	`descripcion` varchar(255),
	`empresa` varchar(255),
	`area` varchar(255),
	`ubicacin` varchar(255),
	`centro_costo` varchar(255),
	`cod_usuario` varchar(255),
	`nombres` varchar(255),
	`ap_paterno` varchar(255),
	`ap_materno` varchar(255),
	`cod_proveedor` varchar(255),
	`fecha_compra` varchar(255),
	`n_factura` varchar(255),
	`valor_compra` varchar(255),
	`status` varchar(255),
	`est_cons` varchar(255),
	`grupo` varchar(255),
	`grupo_descrip` varchar(255),
	`subgrp` varchar(255),
	`subgrp_desc` varchar(255),
	`cuenta` varchar(255),
	`vu_finan` varchar(255),
	`valor_libro` varchar(255),
	`valor_act` varchar(255),
	`depre_acu` varchar(255),
	`vida_rest` varchar(255),
	PRIMARY KEY( `ID` )
);