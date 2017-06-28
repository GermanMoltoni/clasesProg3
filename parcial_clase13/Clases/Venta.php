<?php
require_once './Clases/AccesoDatos.php';
class Venta{
    public $nombreCliente;
    public $pathFoto;
    public $laboratorio;

    public $precio;
    public $idMed;
    function __construct($nombreCliente=NULL,$laboratorio=NULL,$nombreMed=NULL,$precio=NULL,$idMed=NULL,$pathFoto=NULL){
        if($nombreCliente!=NULL && $laboratorio!=NULL && $nombreMed!=NULL && $precio!=NULL && $idMed!= NULL){
            $this->nombreMed=$nombreMed;
            $this->laboratorio=$laboratorio;
                        $this->nombreCliente=$nombreCliente;

            $this->precio=$precio;
            $this->idMed=$idMed;
            $this->pathFoto=$pathFoto;
        }
    }
    function AltaVenta(){
        $objDB = AccesoDatos::DameUnObjetoAcceso();
		$consulta = $objDB->RetornarConsulta("INSERT INTO `ventas`(`idMedicamento`,`nombreCliente`, `nombreMed`,`precio`,`pathFoto`,`laboratorio`) VALUES (:idMed, :nombreCliente, :nombreMed, :precio,:pathFoto,:laboratorio)");
		$consulta->bindValue(':nombreCliente',$this->nombreCliente, PDO::PARAM_STR);
        $consulta->bindValue(':nombreMed',$this->nombreMed, PDO::PARAM_STR);
		$consulta->bindValue(':laboratorio',$this->laboratorio, PDO::PARAM_STR);

        $consulta->bindValue(':pathFoto',$this->pathFoto, PDO::PARAM_STR);
        $consulta->bindValue(':precio',$this->precio, PDO::PARAM_STR);
        $consulta->bindValue(':idMed',$this->idMed, PDO::PARAM_INT);

        return $consulta->execute();
    }



}

?>