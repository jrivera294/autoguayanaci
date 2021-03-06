<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
   class Vehiculos_model extends CI_Model{
        function __construct(){
            parent::__construct();
        }



       //VEHICULOSS OPTIONS

        function addVehiculo($vehiculo,$colores,$opciones){
            //not ready for implementation
            foreach ($vehiculo as $cell=>$value){
                if($value==''){
                    $vehiculo[$cell]=null;
                }
            }
            $this->db->trans_start();
            $query = $this->db->query("INSERT INTO vehiculo VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)",$vehiculo);
            for ($i= 0 ; $i < count($colores) ; $i++){
                $info = array($vehiculo['serial'],$colores[$i]);
                $query = $this->db->query("INSERT INTO color_vehiculo VALUES (?,?)",$info);
            }
            for ($i= 0 ; $i < count($opciones) ; $i++){
                $info = array($vehiculo['serial'],$opciones[$i]);
                $query = $this->db->query("INSERT INTO opciones_vehiculo VALUES (?,?)",$info);
            }
            $this->db->trans_complete();
            return $query;
        }

        function addColorVehiculo($color,$serial_vehiculo){
            $info = array($serial_vehiculo,$color);
            $query = $this->db->query("INSERT INTO color_vehiculo VALUES (?,?)",$info);
            return $query;
        }

        function addOpcionVehiculo($opcion,$serial_vehiculo){
            $info = array($serial_vehiculo,$opcion);
            $query = $this->db->query("INSERT INTO opciones_vehiculo VALUES (?,?)",$info);
            return $query;
        }

        function getVehiculos(){
            $query = $this->db->query("SELECT * FROM vehiculo", array());
            return $query->result();
        }

        function getVehiculoBySerial($serial){
            $query = $this->db->query("SELECT * FROM vehiculo WHERE id = ?",array($serial));
            return $query->result();
       }

        function getColoresVehiculo($serial_vehiculo){
            $query = $this->db->query("SELECT color FROM color_vehiculo WHERE id_vehiculo = ?",$serial_vehiculo);
            return $query->result();
        }
        function getOpcionesVehiculo($serial_vehiculo){
            $query = $this->db->query("SELECT opcion FROM opciones_vehiculo WHERE id_vehiculo = ?",$serial_vehiculo);
            return $query->result();
        }
       function updateVehiculo($vehiculo){

           //if ($vehiculo["fecha_entrega"]!="")
            $query = $this->db->query("UPDATE vehiculo
                    SET precio=?,modelo=?,fecha_fab=?,placa=?,lugar_fab=?,nro_cil=?,nro_puertas=?,peso=?,
                    capacidad=?,fecha_entrega=?,kilometraje=?,monto_garantia_ext=?
                    WHERE id=?",$vehiculo);

       }

   }
?>
