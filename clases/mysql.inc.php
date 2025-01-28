<?php
class mod_db
{
	private $db; // Conexión a la base de datos
	private $setting_file = "setting.inc.php";
	private $perpage = 5; // Cantidad de registros por página
	private $total;
	private $pagecut_query;
	private $debug = false; // Cambiado a false para mantener la configuración original

	public function __construct()
	{
		$this->connection();
	}

	private function connection()
	{
		// Incluye las configuraciones de conexión
		include_once($this->setting_file);
		global $sql_host, $sql_name, $sql_user, $sql_pass;

		$dsn = "mysql:host=$sql_host;dbname=$sql_name;charset=utf8";
		try {
			$this->db = new PDO($dsn, $sql_user, $sql_pass);
			$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			if ($this->debug) {
				echo "Conexión exitosa a la base de datos<br>";
			}
		} catch (PDOException $e) {
			echo "Error de conexión: " . $e->getMessage();
			exit;
		}
	}

	public function disconnect()
	{
		$this->db = null; // Cierra la conexión a la base de datos
	}

	public function insert($tb_name, $cols, $val, $astriction = "")
	{
		$cols = $cols ? "($cols)" : ""; // Si hay columnas, las formateamos
		$sql = "INSERT INTO $tb_name $cols VALUES ($val)";
		$this->executeQuery($sql, $astriction);
	}

	public function update($tb_name, $string, $astriction)
	{
		$sql = "UPDATE $tb_name SET $string";
		$this->executeQuery($sql, $astriction);
	}

	public function del($tb_name, $astriction)
	{
		$sql = "DELETE FROM $tb_name";
		if ($astriction) {
			$sql .= " WHERE $astriction"; // Agrega la restricción si existe
		}
		$this->executeQuery($sql);
	}

	public function query($string)
	{
		return $this->executeQuery($string);
	}

	public function nums($string = "", $stmt = null)
	{
		if ($string) {
			$stmt = $this->query($string);
		}
		$this->total = $stmt ? $stmt->rowCount() : 0; // Cuenta el número de filas
		return $this->total;
	}

	public function objects($string = "", $stmt = null)
	{
		if ($string) {
			$stmt = $this->query($string);
		}
		return $stmt ? $stmt->fetch(PDO::FETCH_OBJ) : null; // Retorna un objeto
	}

	public function insert_id()
	{
		return $this->db->lastInsertId(); // Retorna el último ID insertado
	}

	public function page_cut($string, $nowpage = 0)
	{
		$start = $nowpage ? ($nowpage - 1) * $this->perpage : 0; // Calcula el inicio de la página
		$this->pagecut_query = "$string LIMIT $start, $this->perpage";
		return $this->pagecut_query;
	}

	public function show_page_cut($string = "", $num = "", $url = "")
	{
		$nowpage = isset($_REQUEST['nowpage']) ? $_REQUEST['nowpage'] : 1; // Obtiene la página actual
		$this->total = $string ? $this->nums($string) : $num; // Total de registros
		$pages = ceil($this->total / $this->perpage); // Calcula el total de páginas
		$pagecut = "";

		for ($i = 1; $i <= $pages; $i++) {
			if ($nowpage == $i) {
				$pagecut .= $i; // Página actual
			} else {
				$pagecut .= "<a href='$url&nowpage=$i'><font color='336600' style='font-size:10pt'>$i</font></a>";
			}
		}

		return $pagecut; // Retorna el paginador
	}

	private function executeQuery($sql, $astriction = "")
	{
		try {
			if ($astriction) {
				$sql .= " WHERE $astriction"; // Agrega la restricción si existe
			}
			$stmt = $this->db->prepare($sql); // Prepara la consulta
			$stmt->execute(); // Ejecuta la consulta
			if ($this->debug) {
				echo "Query ejecutada: $sql<br>";
			}
			return $stmt; // Retorna el resultado
		} catch (PDOException $e) {
			echo "Error en la consulta: " . $e->getMessage();
			return null;
		}
	}
}
