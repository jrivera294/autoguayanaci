
<div class="container-fluid" id="epa">
      <div class="row">

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">


          <h2 class="sub-header">Edicion de vehículo</h2>
          <div>
          <form role="form" action='<?= base_url();?>index.php/vehiculos/guardarVehiculo' method="post">
              <?php
                    if(is_array($vehiculo) && count($vehiculo) ) {

                   //  $desc = $articulos['descripcion'];

              ?>
			<div class="row">

				<div class="col-xs-12 col-sm-6 col-md-4">
                    <h3>Serial:</h3>
					<div class="form-group">
                        <input type="text" name="serial_vista" id="serial_vista" class="form-control input-lg" placeholder="" value="<?php echo $vehiculo['serial']; ?>" tabindex="1" disabled>
                        <input type="hidden" name="serial" id="serial" class="form-control input-lg" placeholder="" value="<?php echo $vehiculo['serial']; ?>" tabindex="1" >
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4">
                    <h3>Modelo:</h3>
					<div class="form-group">
                        <input type="text" name="modelo" id="modelo" class="form-control input-lg" placeholder="" value="<?php echo $vehiculo['modelo']; ?>" tabindex="2">
					</div>
				</div>
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <h3>Placa:</h3>
					<div class="form-group">
                        <input type="text" name="placa" id="placa" class="form-control input-lg" placeholder="" value="<?php echo $vehiculo['placa']; ?>" tabindex="2">
					</div>
				</div>

			</div>

			<div class="row">

				<div class="col-xs-12 col-sm-6 col-md-6">
                    <h3>Precio (Bsf):</h3>
					<div class="form-group">
                        <input type="text" name="precio" id="precio" class="form-control input-lg" placeholder="" value="<?php echo $vehiculo['precio']; ?>"tabindex="3">
					</div>
				</div>

                <div class="col-xs-12 col-sm-6 col-md-3">
                    <h3>F. de fabricación:</h3>
					<div class="form-group">
                        <input type="date" name="fecha_fab" value="<?php echo $vehiculo['fecha_fab']; ?>"id="fecha_fab">
					</div>

				</div>
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <h3>Fecha de Entrega:</h3>
					<div class="form-group">
                        <input type="date" name="fecha_entrega" value="<?php echo $vehiculo['fecha_entrega']; ?>"id="fecha_entrega">
					</div>
                </div>

			</div>

			<div class="row">

                <div class="col-xs-12 col-sm-6 col-md-6">
                    <h3>Lugar de fabricación:</h3>
					<div class="form-group">
                        <input type="text" name="lugar_fab" id="lugar_fab" class="form-control input-lg" value="<?php echo $vehiculo['lugar_fab']; ?>" placeholder="" tabindex="4">
					</div>
				</div>

                <div class="col-xs-12 col-sm-3 col-md-3">
                    <h3>Nro. Cilindros:</h3>
					<div class="form-group">
                        <input type="text" name="nro_cil" id="nro_cil" class="form-control input-lg" placeholder="" value="<?php echo $vehiculo['nro_cil']; ?>" tabindex="5">
					</div>
				</div>
                <div class="col-xs-12 col-sm-3 col-md-3">
                    <h3>Nro. Puertas:</h3>
					<div class="form-group">
                        <input type="text" name="nro_puertas" id="nro_puertas" class="form-control input-lg" placeholder="" value="<?php echo $vehiculo['nro_puertas']; ?>" tabindex="6">
					</div>
				</div>

			</div>
			<div class="row">

 				<div class="col-xs-12 col-sm-3 col-md-3">
                    <h3>Peso (Kg):</h3>
					<div class="form-group">
                        <input type="text" name="peso" id="peso" class="form-control input-lg" placeholder="" value="<?php echo $vehiculo['peso']; ?>" tabindex="7">
					</div>
				</div>
 				<div class="col-xs-12 col-sm-3 col-md-3">
                    <h3>Capacidad:</h3>
					<div class="form-group">
                        <input type="text" name="capacidad" id="capacidad" class="form-control input-lg" placeholder="" value="<?php echo $vehiculo['capacidad']; ?>" tabindex="8">
					</div>
				</div>

			</div>
			<div class="row">

				<div class="col-xs-12 col-sm-6 col-md-6">
                    <h3>Kilometraje:</h3>
					<div class="form-group">
                        <input type="text" name="kilometraje" id="kms" class="form-control input-lg" placeholder="" value="<?php echo $vehiculo['kilometraje']; ?>" tabindex="10">
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">
                    <h3>Monto de la garantía extendida:</h3>
					<div class="form-group">
                        <input type="text" name="monto_garantia" id="monto_garantia" class="form-control input-lg" value="<?php echo $vehiculo['monto_garantia']; ?>" placeholder="" tabindex="11">
					</div>
				</div>
			</div>



			<div class="row">
				<div class="col-xs-12 col-md-6"><input type="submit" value="Actualizar" class="btn btn-primary btn-block btn-lg" tabindex="13"></div>
				<div class="col-xs-12 col-md-6"><a href='<?= base_url("index.php/vehiculos/cargarGestionVehiculos");?>' class="btn btn-warning btn-block btn-lg">Cancelar</a></div>
			</div>
              <?php }
        ?>

		</form>
          </div>
        </div>
      </div>
    </div>
<?php foreach($colores as $array){
            foreach($array as $color){
               // echo "color: ".$color;
               ?> <script type="text/javascript">traerOp_Col(<?php $color; ?>,0)</script>
      <?php  }}?>


