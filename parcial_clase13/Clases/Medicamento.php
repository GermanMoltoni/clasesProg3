<?php
class Medicamento{
    public $laboratorio;
    public $nombre;
    public $precio;
    public $id;
    function __construct($laboratorio=NULL,$nombre=NULL,$precio=NULL,$id=NULL){
        if($laboratorio!=NULL && $nombre!=NULL && $precio!=NULL && $id!= NULL){
            $this->nombre=$nombre;
            $this->laboratorio=$laboratorio;
            $this->precio=$precio;
            $this->id=$id;
        }
    }
    function AltaMedicamento(){
        $objDB = AccesoDatos::DameUnObjetoAcceso();
		$consulta = $objDB->RetornarConsulta("INSERT INTO `medicamentos`(`laboratorio`, `nombre`,`precio`,`id`) VALUES (:laboratorio, :nombre, :precio,:id)");
		$consulta->bindValue(':laboratorio',$this->laboratorio, PDO::PARAM_STR);
        $consulta->bindValue(':precio',$this->precio, PDO::PARAM_STR);
        $consulta->bindValue(':nombre',$this->nombre, PDO::PARAM_STR);
        $consulta->bindValue(':id',$this->id, PDO::PARAM_STR);
        return $consulta->execute();
    }
    static function ListarMedicamentos(){
        $objDB = AccesoDatos::DameUnObjetoAcceso();
		$consulta = $objDB->RetornarConsulta("SELECT laboratorio,nombre,precio,id FROM medicamentos");
        $consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_CLASS,"Medicamento");
    }

    static function TraerMedicamentoPorId($id){
        $objDB = AccesoDatos::DameUnObjetoAcceso();
		$consulta = $objDB->RetornarConsulta("SELECT laboratorio,nombre,precio,id FROM medicamentos WHERE id=:id");
        $consulta->bindValue(':id',$id, PDO::PARAM_INT);
        $consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_CLASS,"Medicamento");
    }
    static function MedicamentosPorLaboratorio(){
        $objDB = AccesoDatos::DameUnObjetoAcceso();
		$consulta = $objDB->RetornarConsulta("SELECT laboratorio,nombre,precio,id FROM medicamentos ORDER BY laboratorio");
        $consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_CLASS,"Medicamento");
    }
    static function BorrarMedicamentoPorId($id){
        $objDB = AccesoDatos::DameUnObjetoAcceso();
		$consulta = $objDB->RetornarConsulta("DELETE  FROM `medicamentos` WHERE `id`=:id");
        $consulta->bindValue(':id',$id, PDO::PARAM_INT);
        return $consulta->execute();
    }
}


?>