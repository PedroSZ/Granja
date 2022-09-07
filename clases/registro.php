<?php
error_reporting(0);//para que no me muestre errores porque en un principio FiltarCurp no tiene valor por o esta indefinida
//post del numero de mes para filtrar por mes
/*$mesF = $_POST['FiltrarMes'];
$fecha1 = $_POST['fecha1'];
$fecha2 = $_POST['fecha2'];*/

/*echo $fecha1;
echo $fecha2;*/

//****** CLASE DE REGISTRO DE PRODUCCION
include_once 'db.php';
class Registro extends DB {
	private $id;
	private $producto;
	private $kilos;
	private $barCode;
	private $fecha;
	//stters and getters ***********************************************
	public function setId($id){ $this->id = $id; }
	public function setIdProducto($producto){ $this->producto = $producto; }
	public function setKilos($kilos){ $this->kilos = $kilos; }
	public function setBarCode($barCode){ $this->barCode = $barCode; }
	public function setFecha($fecha){ $this->fecha = $fecha; }
	public function getId(){ return $this->id; }
	public function getProducto(){ return $this->producto; }
	public function getKilos(){ return $this->kilos; }
	public function getBarCode(){ return $this->barCode; }
	public function getFecha(){ return $this->fecha; }
	//**************** METODOS ******************************************
	//LISTAR REGISTROS
	public function listar(){
		$query = $this->connect()->prepare('SELECT * FROM producto INNER JOIN registro ON registro.id_producto = producto.id');
		$query->execute();
		return $query->fetchAll(PDO::FETCH_ASSOC);
	}
	//LISTAR REGISTROS EN ORDEN DECENDENTE
	public function listarDecendente(){
		$query = $this->connect()->prepare('SELECT * FROM producto INNER JOIN registro ON registro.id_producto = producto.id ORDER BY fecha DESC');
		$query->execute();
		return $query->fetchAll(PDO::FETCH_ASSOC);
	}

	public function listarRegistros(){
		$query = $this->connect()->prepare('SELECT peso, nombre FROM producto INNER JOIN registro ON registro.id_producto = producto.id');
		$query->execute();
		return $query->fetchAll(PDO::FETCH_ASSOC);
	}
	public function guardar() {			//CAMPOS DB									NOMBRES VARIABLES
		$sql = "INSERT INTO registro (id, id_producto, peso, barCode, fecha) VALUES(:id, :producto, :kilos, :barCode, :fecha)";
		$query = $this->connect()->prepare($sql);
		$query->execute([
			'id' => $this->id,
			'producto' => $this->producto,
			'kilos' => $this -> kilos,
			'barCode' => $this -> barCode,
			'fecha' => $this -> fecha]);
	}
	//LISTA DE REGISTROS DE EMBALAJES POR MES
	public function listarInformeMensual($mes){

		$query = $this->connect()->prepare('select * from registro INNER JOIN producto where producto.id = registro.id_producto AND MONTH(fecha) = :fe ORDER BY fecha ASC');
				$query->execute(['fe' => $mes]);
		return $query->fetchAll(PDO::FETCH_ASSOC);
	}

	//LISTA DE REGISTROS DE EMALAJES DEL DIA
	public function listarInformeDelDia(){

		$query = $this->connect()->prepare('SELECT * FROM registro WHERE YEAR(fecha) = YEAR(NOW()) AND MONTH(fecha) = MONTH(NOW()) AND DAY(fecha) = DAY(NOW())');
		$query->execute();
		return $query->fetchAll(PDO::FETCH_ASSOC);
	}

	//LISTA DE REGISTROS DE EMALAJES POR DIA ESPECIFICO
	public function listarInformePorRangoFecha($fecha1, $fecha2){
		$query = $this->connect()->prepare('SELECT * FROM registro INNER JOIN producto WHERE producto.id = registro.id_producto AND fecha BETWEEN :fe1 AND :fe2;');
		$query->execute(['fe1' => $fecha1,
						'fe2' => $fecha2]);
		return $query->fetchAll(PDO::FETCH_ASSOC);
	}

	//LISTA DE REGISTROS DE EMBALAJES DEL DIA POR CODIGO DE PRODUCTO
	public function listarInformeDelDiaPorIdReporte(){

		$query = $this->connect()->prepare('SELECT * FROM registro INNER JOIN producto WHERE producto.id = registro.id_producto AND YEAR(fecha) = YEAR(NOW()) AND MONTH(fecha) = MONTH(NOW()) AND DAY(fecha) = DAY(NOW())');
		$query->execute();
		return $query->fetchAll(PDO::FETCH_ASSOC);
	}

	//ELIMINAR REGISTRO CON EL ID QUE SE ENVIA POST GET
	public function eliminar($id){
		$query = $this->connect()->prepare('DELETE FROM registro WHERE id = :id');
		$query->execute(['id' => $id]);
	}
	//CONSULTAR NOMBRE DE REGISTRO POR CODIGO PASADO MEDIANTE POST
	
	public function consultarCodigoActual(){

		$query = $this->connect()->prepare('SELECT id_producto, nombre, peso FROM registro INNER JOIN producto where id_producto = producto.id  ORDER BY registro.id DESC LIMIT 1');
				$query->execute();
		return $query->fetchAll(PDO::FETCH_ASSOC);
	}
}

?>
