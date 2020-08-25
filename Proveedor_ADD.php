<?php
	require 'SQLGlobal.php';

	if($_SERVER['REQUEST_METHOD']=='POST'){
		try{
            $datos = json_decode(file_get_contents("php://input"),true);
            
            $nombre = $datos["nombre"]
			$telefono = $datos["telefono"]
			$direccion = $datos["direccion"]
			$correo = $datos["correo"]

			//$id = $datos["id"]; // obtener parametros GET
			//$respuesta = SQLGlobal::query("QUERY");//sin filtro ("No incluir filtros ni '?'")
			$respuesta = SQLGlobal::cudFiltro(
				"INSERT INTO Proveedor Values(?,?,?,?)",
				array($nombre, $telefono, $direccion, $correo)
			);//con filtro ("El tamaño del array debe ser igual a la cantidad de los '?'")
            if($respuesta > 0){
                echo json_encode(array(
                    'respuesta'=>'200',
                    'estado' => 'Se insertó correctamente al proveedor',
                    'data'=>$respuesta,
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