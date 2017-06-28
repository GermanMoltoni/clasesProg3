<?php
require_once './Clases/AccesoDatos.php';
class Bicicleta{
    public $color;
    public $rodado;
    public $marca;
    public $idBicicleta;
    public $pathFoto;
    function __construct($color=NULL,$marca=NULL,$rodado=NULL,$idBicicleta=NULL,$pathFoto=NULL){
        if($color!=NULL && $marca!=NULL && $rodado!=NULL){
            $this->marca=$marca;
            $this->color=$color;
            $this->rodado=$rodado;
            $this->idBicicleta=$idBicicleta;
            $this->pathFoto=$pathFoto;
        }
    }
    function SetPathFoto($path){
        $this->pathFoto=$path;
    }
    function SetIdBicicleta($idBicicleta){
        $this->idBicicleta=$idBicicleta;
    }
    function AltaBicicleta(){
        $objDB = AccesoDatos::DameUnObjetoAcceso();
		$consulta = $objDB->RetornarConsulta("INSERT INTO `bicicletas`(`marca`, `rodado`,`color`,`pathFoto`) VALUES (:marca, :rodado, :color,:pathFoto)");
		$consulta->bindValue(':marca',$this->marca, PDO::PARAM_STR);
        $consulta->bindValue(':color',$this->color, PDO::PARAM_STR);
        $consulta->bindValue(':rodado',$this->rodado, PDO::PARAM_STR);
        $consulta->bindValue(':pathFoto',$this->pathFoto, PDO::PARAM_STR);
        return $consulta->execute();
 //retornar id de bicicleta
    }
    function ModificarBicicleta(){
        $objDB = AccesoDatos::DameUnObjetoAcceso();
		$consulta = $objDB->RetornarConsulta("UPDATE `bicicletas` SET `marca`=:marca , `rodado`=:rodado ,`color`=:color WHERE idBicicleta=:idBicicleta");
		$consulta->bindValue(':marca',$this->marca, PDO::PARAM_STR);
        $consulta->bindValue(':color',$this->color, PDO::PARAM_STR);
        $consulta->bindValue(':rodado',$this->rodado, PDO::PARAM_STR);
        $consulta->bindValue(':idBicicleta',$this->idBicicleta, PDO::PARAM_STR);
        return $consulta->execute();


    }
    static function ListarBicicletas(){
        $objDB = AccesoDatos::DameUnObjetoAcceso();
		$consulta = $objDB->RetornarConsulta("SELECT color,marca,rodado,idBicicleta FROM bicicletas");
        $consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_CLASS,"Bicicleta");
    }
    static function TraerBicicletaPorId($id){
        $objDB = AccesoDatos::DameUnObjetoAcceso();
		$consulta = $objDB->RetornarConsulta("SELECT idBicicleta,color,marca,rodado,pathFoto FROM bicicletas WHERE idBicicleta=:id");
        $consulta->bindValue(':id',$id, PDO::PARAM_INT);
        $consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_CLASS,"Bicicleta");
    }
    static function TraerBicicletaPorColor($color){
        $objDB = AccesoDatos::DameUnObjetoAcceso();
		$consulta = $objDB->RetornarConsulta("SELECT color,marca,rodado,idBicicleta FROM bicicletas WHERE color=:color");
        $consulta->bindValue(':color',$color, PDO::PARAM_STR);
        $consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_CLASS,"Bicicleta");
    }
    static function BorrarBicicletaPorId($id){
        $objDB = AccesoDatos::DameUnObjetoAcceso();
		$consulta = $objDB->RetornarConsulta("DELETE  FROM `bicicletas` WHERE `idBicicleta`=:id");
        $consulta->bindValue(':id',$id, PDO::PARAM_INT);
        return $consulta->execute();
    }
    static function UltimoIdIngresado(){
        $objDB = AccesoDatos::DameUnObjetoAcceso();
		$consulta = $objDB->RetornarConsulta("SELECT count(idBicicleta) FROM bicicletas");
        $consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_COLUMN)[0];
    }
    }
    





?>