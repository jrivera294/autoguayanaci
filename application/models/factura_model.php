<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
   class Factura_model extends CI_Model{
        function __construct(){
            parent::__construct();
        }

        /*function getFacturaByFecha($fecha_ini,$fecha_fin){
            $query = $this->db->query("SELECT * FROM cliente", array());
            return $query->result();
        }*/

       function getFacturaById($nro_factura){
            $factura = $this->db->query("SELECT * FROM factura WHERE nro_factura=?", array($nro_factura));
            return $factura->result();
       }
       
       function getArticulosById($nro_factura){
            $articulos = $this->db->query("SELECT * FROM detalle WHERE nro_factura=?", array($nro_factura));
            return $articulos->result();
       }
       
      function getFacturas($ci_cliente){
           $query = $this->db->query("SELECT nro_factura,fecha_emision,id_vehiculo,tipo_garantia FROM factura WHERE ci_cliente=?",array($ci_cliente));
          return $query->result();
       }
       
       function getFacturaTotal($nro_factura){
           $articulos = $this->db->query("SELECT * FROM totalfactura_view WHERE nro_factura=?", array($nro_factura));
            return $articulos->result();
       }

        function addFactura($factura,$articulos){            
            
            foreach ($factura as $cell=>$value){
                if($value==''){
                    $factura[$cell]=null;
                }
            }
            $this->db->trans_start();
            
            $queryFactura = $this->db->query("INSERT INTO factura (fecha_emision,tipo_financiamiento,cuotas,pago_cuota,interes,tipo_garantia,id_vehiculo,precio_venta_ve,rif_aseguradora,ci_cliente,id_empleado,rif_banco,comision,monto_asegurado,precio_seguro) VALUES (CURRENT_DATE,?,?,?,?,?,?,?,?,?,?,?,?,?,?)",$factura);
            
            $id_factura = $this->db->query("SELECT currval(pg_get_serial_sequence('factura', 'nro_factura'))",array())->result()[0]->currval;

            
            foreach ($articulos as $key){
                $queryFactura = $this->db->query("INSERT INTO detalle (id_articulo,nro_factura,precio_venta,descuento,cantidad) VALUES (?,$id_factura,?,?,?)",$key);
            } 
            
            $this->db->trans_complete();
            
            return $id_factura;
        }
       
       function getFacturaByFecha($fecha_ini,$fecha_fin){
           $queryFactura = $this->db->query("
           SELECT factura.nro_factura,factura.fecha_emision,vehiculo.id AS id_vehiculo,vehiculo.modelo,vehiculo.fecha_entrega,vehiculo.kilometraje,vehiculo.monto_garantia_ext,empleado.nombre,empleado.apellido1,empleado.apellido2,empleado.id AS id_empleado,empleado.cedula
           FROM factura,vehiculo,empleado
           WHERE (factura.fecha_emision>=? AND fecha_emision<=? AND
           factura.id_vehiculo=vehiculo.id AND
           factura.id_empleado=empleado.id);
           ",array($fecha_ini,$fecha_fin));
           return $queryFactura->result();
       }
       
        public function getPreguntas(){
            $query = $this->db->query("SELECT nro_preg,pregunta FROM preguntas");
            return $query->result();
        }
       
       public function addRespuestas($respuestas){
           foreach($respuestas as $loop){
               $query = $this->db->query("INSERT INTO respuestas nro_factura,nro_preg,respuesta VALUES (?,?,?)",array($loop->nro_factura,$loop->nro_preg,$loop->respuesta));
           }
           
       }
       
   }
?>