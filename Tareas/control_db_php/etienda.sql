CREATE TABLE IF NOT EXISTS `clientes` ( 
  `cod_cliente` int(9) NOT NULL DEFAULT '0', 
  `nombre` varchar(10) DEFAULT NULL, 
  `clave` varchar(10) DEFAULT NULL, 
  `veces` int(9) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cod_cliente`) 
) ENGINE=InnoDB DEFAULT CHARSET=latin1; 

CREATE TABLE IF NOT EXISTS `pedidos` ( 
  `numped` int(9) NOT NULL DEFAULT '0', 
  `cod_cliente` int (9) DEFAULT NULL, 
  `producto` varchar(20) DEFAULT NULL, 
  `precio`  int(7) DEFAULT NULL,
  PRIMARY KEY (`numped`) 
) ENGINE=InnoDB DEFAULT CHARSET=latin1; 


INSERT INTO `clientes` (`cod_cliente`, `nombre`, `clave`, `veces`) VALUES 
(1001, 'miguel', '123456' ,0), 
(1002, 'eva', 'secretoeva',2), 
(1003, 'luis33', 'luis34' ,1), 
(2000, 'jesus', 'jesus' ,  2), 
(1004, 'silviam','sm2323' ,3);

INSERT INTO `pedidos` (`numped`, `cod_cliente`, `producto`, `precio`) VALUES 
(1,  1001, 'Zapatilla s23' , 30), 
(2,  1002, 'Camisa sport' ,  20), 
(3,  1002, 'Camisa green' ,  25), 
(4,  1002, 'Pantalón sport' ,20), 
(5,  1001, 'Camisa sport' ,  20), 
(6,  1003, 'Camisa sport' ,  20), 
(7,  1003, 'Zapatilla sport',10), 
(8,  1004, 'Camisa sport',   20), 
(9,  1004, 'Forro polar',    60),
(10, 1003, 'Gorro color',    10); 
