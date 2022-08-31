<?php
error_reporting(0);//para que no me muestre errores porque en un principio FiltarCurp no tiene valor por o esta indefinida
//post del numero de mes para filtrar por mes
$mes = $_POST['nombre'];


//****** CLASE DE REGISTRO DE PRODUCCION
include_once 'db.php';
class Producto extends DB {
	private $id;
	private $nombre;
	private $codigo;
	



	//stters and getters ***********************************************
	public function setId($id){ $this->id = $id; }
	public function setNombre($nombre){ $this->nombre = $nombre; }
	public function setCodigo($codigo){ $this->codigo = $codigo; }
	


	public function getId(){ return $this->id; }
	public function getNombre(){ return $this->nombre; }
	public function getCodigo(){ return $this->codigo; }
	



	//**************** METODOS ******************************************
	//LISTAR PRODUCTOS
	public function listar(){
		$query = $this->connect()->prepare('SELECT * FROM producto');
		$query->execute();
		return $query->fetchAll(PDO::FETCH_ASSOC);
	}

	public function listarRegistros(){
		$query = $this->connect()->prepare('SELECT peso, nombre FROM producto INNER JOIN registro ON registro.id_producto = producto.id');
		$query->execute();
		return $query->fetchAll(PDO::FETCH_ASSOC);
	}

	public function guardar() {			//CAMPOS DB									NOMBRES VARIABLES
		$sql = "INSERT INTO producto (id, nombre, codigo) VALUES(:id, :nombre, :codigo)";
		$query = $this->connect()->prepare($sql);
		$query->execute([
			'id' => $this->id,
			'nombre' => $this->nombre,
			'codigo' => $this -> codigo]);

	}


	//LISTA DE REGISTROS DE EMBALAJES POR MES
	public function listarInformeMensual($mes){

		$query = $this->connect()->prepare('select * from registro where MONTH(fecha) = :fe ORDER BY fecha ASC');
				$query->execute(['fe' => $mes]);
		return $query->fetchAll(PDO::FETCH_ASSOC);
	}


	//LISTA DE REGISTROS DE EMALAJES DEL DIA
	public function listarInformeDelDia(){

		$query = $this->connect()->prepare('SELECT * FROM registro WHERE YEAR(fecha) = YEAR(NOW()) AND MONTH(fecha) = MONTH(NOW()) AND DAY(fecha) = DAY(NOW())');
		$query->execute();
		return $query->fetchAll(PDO::FETCH_ASSOC);
	}
	

	//LISTA DE REGISTROS DE EMALAJES DEL DIA POR CODIGO DE PRODUCTO
	public function listarInformeDelDiaPorId(){

		$query = $this->connect()->prepare('SELECT * FROM registro INNER JOIN producto WHERE producto.id = registro.id_producto AND YEAR(fecha) = YEAR(NOW()) AND MONTH(fecha) = MONTH(NOW()) AND DAY(fecha) = DAY(NOW())');
		$query->execute();
		return $query->fetchAll(PDO::FETCH_ASSOC);
	}

	//CONSULTA EL PRODUCTO POR EL ID ENVIADO DESDE LA LISTA PARA PONERLO EN EL FORM DE ACTUALIZAR
	public function consultarId($id){
		$query = $this->connect()->prepare('SELECT * FROM producto WHERE id = :producto');
		$query->execute(['producto' => $id]);
		return $query->fetch(PDO::FETCH_ASSOC);
	}

	//ACTUALIZA EL PRODUCTO CON EL ID QUE COINCIDE MEDIANTE EL GETTER
	public function actualizar(){
		$sql = "UPDATE producto SET nombre = :nombre, codigo = :codigo	WHERE id = :id";
		$query = $this->connect()->prepare($sql);
		$query->execute([
			'id' => $this->id,
			'nombre' => $this->nombre,
			'codigo' => $this->codigo]);
	}
	//ELIMINAR PRODUCTO CON EL ID QUE SE ENVIA POST GET
	public function eliminar($id){
		$query = $this->connect()->prepare('DELETE FROM producto WHERE id = :id');
		$query->execute(['id' => $id]);
	}


}

?>
