<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
   class Empleados_model extends CI_Model{
        function __construct(){
            parent::__construct();
        }
       
       public function getEmpleadoById($id){
            $query = $this->db->query("SELECT id,cedula,nombre,apellido1,apellido2 FROM empleado WHERE id=?", $id);
            return $query->result();
        }

       public function getEmpleadoByIdDep($id){
            $query = $this->db->query("SELECT * FROM empleado WHERE id=?", $id);
            foreach ($query->result() as $emp)
                return $emp;
       }
        public function getIdEmpleado($cedula){
            $query = $this->db->query("SELECT id FROM empleado WHERE cedula=?", $cedula);
            return $query->result();
        }

        function getEmpleados(){
            $query = $this->db->query("SELECT * FROM empleado", array());
            return $query->result();
        }

       function getTelefonosEmpleado($idEmpleado){
            $query = $this->db->query("SELECT telefono FROM telefonos_empleados WHERE id_empleado = ?",$idEmpleado);
            return $query->result();
        }
        function getCorreosEmpleado($idEmpleado){
            $query = $this->db->query("SELECT correo FROM correos_empleados WHERE id_empleado = ?",$idEmpleado);
            return $query->result();
        }

        function addEmpleado($empleado,$tlf,$correos){

         //   $this->db->trans_start();//INICIA LA TRANSACCION
            $this->db->trans_start();
            $queryE = $this->db->query("INSERT INTO empleado
            (password,cedula,nombre,apellido1,apellido2,sexo,dir,fecha_nac,fecha_contr,cod_cargo,cod_dpto)
            VALUES (?,?,?,?,?,?,?,?,CURRENT_DATE,?,?)",$empleado); //inserto empleado


           /* $query = $this->db->query("SELECT id FROM empleado WHERE cedula=?", $empleado['cedula']);//busco id
            foreach($query->result() as $emp)
                $idEmpleado = $emp->id;*/

             $idEmpleado = $this->db->query("SELECT currval(pg_get_serial_sequence('empleado', 'id'))",array())->result()[0]->currval;

            for ($i = 0 ; $i < count($tlf) ; $i++){//inserto tlf
                $info = array($idEmpleado,$tlf[$i]);
                $queryT = $this->db->query("INSERT INTO telefonos_empleados VALUES (?,?)",$info);
            }

            for ($i = 0 ; $i < count($correos) ; $i++){//inserto correos
                $info = array($idEmpleado,$correos[$i]);
                $queryC = $this->db->query("INSERT INTO correos_empleados VALUES (?,?)",$info);
            }
            $this->db->trans_complete();
            return $queryE;

            //$this->db->trans_complete();//TERMINA LA TRANSACCION
        }

        function addTelefonoEmpleado($telefono,$idEmpleado){
            $info = array($idEmpleado,$telefono);
            $query = $this->db->query("INSERT INTO telefonos_empleados VALUES (?,?)",$info);
            return $query;
        }
       function deleteTelefonoEmpleado($idEmpleado,$telefono){
            $info = array($idEmpleado,$telefono);
            $query = $this->db->query("DELETE FROM telefonos_empleados WHERE  id_empleado = ? AND telefono = ?",$info);
            return $query;
        }
        function addCorreoEmpleado($correo,$idEmpleado){
            $info = array($idEmpleado,$correo);
            $query = $this->db->query("INSERT INTO correos_empleados VALUES (?,?)",$info);
            return $query;
        }

        function deleteCorreoEmpleado($idEmpleado,$correo){
            $info = array($idEmpleado,$correo);
            $query = $this->db->query("DELETE FROM correos_empleados WHERE  id_empleado = ? AND correo = ?",$info);
            return $query;
        }

       function updateEmpleado($empleado){

            $query = $this->db->query
                (   "UPDATE empleado
                    SET password=?,nombre=?,apellido1=?,apellido2=?,dir=?,status=?,cod_cargo=?,cod_dpto=?
                    WHERE id=?",$empleado);
            return $query;
       }

       function deleteEmpleado($idEmpleado){
            $query = $this->db->query("DELETE FROM empleado WHERE id= ?",$idEmpleado);
            return $query;
       }

       function getEmpleado_ById($idEmpleado){
            $query = $this->db->query("SELECT * FROM empleado WHERE id= ?", $idEmpleado);
            return $query->result();
        }

       function desempenio ($datos,$ind){
           if ($ind==1){
                $query = $this->db->query("SELECT * FROM desempenoGeneral_view WHERE (fecha_emision >= ? AND fecha_emision <= ?  AND id= ?       )",$datos);

                return $query->result();
           }
           else if ($ind==0){
              $query = $this->db->query("SELECT * FROM desempenoGeneral_view WHERE (fecha_emision >= ? AND fecha_emision <= ?  )",$datos);
                return $query->result();
           }

       }

       public function getTop5(){
            $query = $this->db->query(
    "SELECT  e.cedula, e.nombre,e.apellido1,e.apellido2,SUM (CAST((tf.total) as double precision) )as total
FROM empleado as e, factura as f,totalfactura_view as tf
WHERE (e.id = f.id_empleado  AND tf.nro_factura=f.nro_factura AND
( extract( year from current_date) - (3) <= extract( year from f.fecha_emision)) )
GROUP BY e.cedula,e.nombre,apellido1,apellido2
ORDER  BY  total DESC  LIMIT 5;");
           return $query->result();
       }

       public function getTop5porAnios($cedulas){
           for ($i = 0 ; $i < 5 ; $i++)

            $query = $this->db->query(
            "SELECT e.cedula, SUM (tf.total)as total, extract( year from f.fecha_emision) as anio
             FROM empleado as e ,factura as f,totalfactura_view as tf
             WHERE ( e.id = f.id_empleado AND
                   (extract( year from current_date) - (3) <= extract( year from f.fecha_emision)) AND
                   (e.cedula IN (?,?,?,?,?) ))
                   AND tf.nro_factura=f.nro_factura
            GROUP BY e.cedula,f.fecha_emision",$cedulas);
            return $query->result();
       }

       public function getVentasPorAnio(){
       $query = $this->db->query (
           "SELECT SUM(cast((tf.total) as double precision)) as total,extract( year from f.fecha_emision) as anio
           FROM factura as f,totalfactura_view as tf
           WHERE  ( extract( year from current_date) - (3) <= extract( year from f.fecha_emision))
           GROUP BY anio ORDER BY anio ASC");

           return $query->result();
       }


   }
?>
