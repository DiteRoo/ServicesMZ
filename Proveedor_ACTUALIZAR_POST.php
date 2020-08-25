<?php
	require 'SQLGlobal.php';

	if($_SERVER['REQUEST_METHOD']=='POST'){
		try{
			$datos = json_decode(file_get_contents("php://input"),true);

            $codigo = $datos["codigo"];
            $nombre = $datos["nombre"]; // obtener parametros POST
            $telefono = $datos["telefono"];
            $direccion = $datos["direccion"];
            $correo= $datos["correo"];

			$respuesta = SQLGlobal::cudFiltro(
				"UPDATE proveedor SET nomnbre = ?, telefono = ?, direccion = ?, correo = ? WHERE Id = ?",
				array($nombre,$telefono,$direccion,$correo,$codigo)
            );//con filtro ("El tamaño del array debe ser igual a la cantidad de los '?'")
            if($respuesta>0){
                echo json_encode(array(
                    'respuesta'=>'200',
                    'estado' => 'Se actualizo correctamente el producto',
                    'data'=>'Numero de filas afectadas: '.$respuesta,
                    'error'=>''
                ));
            }else{
                echo json_encode(array(
                    'respuesta'=>'100',
                    'estado' => 'No se actualizo correctamente.',
                    'data'=>'Numero de filas afectadas: '.$respuesta,
                    'error'=>''
                ));
            }
		}catch(PDOException $e){
			echo json_encode(
				array(
					'respuesta'=>'-1',
					'estado' => 'Ocurrio un error, intentelo mas tarde',
					'data'=>'',
					'error'=>$e->getMessage())
			);
		}
	}

?>