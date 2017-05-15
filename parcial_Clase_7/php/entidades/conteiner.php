<?php
require_once "AccesoDB.php";
class Conteiner
{
    private $_numero;
    private $_descripcion;
    private $_pais;
    private $_foto;
    function __construct($numero=NULL,$descripcion=NULL,$pais=NULL,$foto=NULL)
    {

        $this->_descripcion = $descripcion;
        $this->_pais = $pais;
        $this->_numero = $numero;
        $this->_foto = $foto;
        

    }
    function setFoto($path)
    {
        $this->_foto = $path;
    }
    function getNumero()
    {
        return $this->_numero;
    }
    function getDescripcion()
    {
        return $this->_descripcion;
    }
    function getFoto()
    {
        return $this->_foto;
    }
    function getPais()
    {
        return $this->_pais;
    }
    function ToDB()
    {
        $objDB = AccesoDatos::DameUnObjetoAcceso();
		$consulta = $objDB->RetornarConsulta("INSERT INTO conteiner (numero,descripcion,pais,foto) VALUES (:numero,:descripcion,:pais, :foto)");
		$consulta->bindValue(':numero', $this->getNumero(), PDO::PARAM_INT);
		$consulta->bindValue(':descripcion', $this->getDescripcion(), PDO::PARAM_STR);
		$consulta->bindValue(':pais', $this->getPais(), PDO::PARAM_STR);
        $consulta->bindValue(':foto', $this->getFoto(), PDO::PARAM_STR);
		$consulta->execute();
    }
    public static function TraerTodosLosConteinersDB()
	{
		$objDB = AccesoDatos::DameUnObjetoAcceso();
		$consulta = $objDB->RetornarConsulta("SELECT * FROM conteiner");
		$consulta->execute();
		return $consulta->fetchAll( PDO::FETCH_CLASS,"Conteiner");
	}
}
?>