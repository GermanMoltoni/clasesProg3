<?php
require_once './Clases/AccesoDatos.php';
class Venta{
    public $idBicicleta;
    public $nombreCliente;
    public $fecha;
    public $precio;
    public $pathFoto;
    function __construct($idBicicleta=NULL,$nombreCliente=NULL,$fecha=NULL,$precio=NULL,$pathFoto=NULL){
        if($idBicicleta!=NULL && $nombreCliente!=NULL && $fecha!=NULL && $precio!=NULL){
            $this->idBicicleta=$idBicicleta;
            $this->nombreCliente=$nombreCliente;
            $this->precio=$precio;
            $this->fecha=$fecha;
            $this->pathFoto=$pathFoto;
        }
    }
    function AltaVenta(){
        $objDB = AccesoDatos::DameUnObjetoAcceso();
		$consulta = $objDB->RetornarConsulta("INSERT INTO `ventas`(`idBicicleta`,`nombreCliente`, `fecha`,`precio`,`pathFoto`) VALUES (:idBicicleta, :nombreCliente, :fecha, :precio,:pathFoto)");
		$consulta->bindValue(':nombreCliente',$this->nombreCliente, PDO::PARAM_STR);
        $consulta->bindValue(':fecha',$this->fecha, PDO::PARAM_STR);
        $consulta->bindValue(':pathFoto',$this->pathFoto, PDO::PARAM_STR);
        $consulta->bindValue(':precio',$this->precio, PDO::PARAM_STR);
        $consulta->bindValue(':idBicicleta',$this->idBicicleta, PDO::PARAM_INT);
        return $consulta->execute();
    }



}

?>