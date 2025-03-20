<?php
include("parametros.php");
class Conexion
{
    private $con;

    public function pdo()
    {
        try
        {
            $connPDO = new PDO('mysql:host='.SERVER.';dbname='.DATABASE,USER,PASSWORD,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

        }
        catch(PDOException $e)
        {
            echo "Ocurrio un error: " . $e->getMessage();
            die();
        }
        finally
        {
            $this->con = $connPDO;
            return $connPDO;
        }
    }

    public function MostrarConsulta($sql)
    {
        $rs = $this->pdo()->query($sql);
        return $rs;
    }

    public function EjecutarConsulta($sql)
    {
        $rs = $this->pdo()->exec($sql);
        return $rs;
    }
}

?>