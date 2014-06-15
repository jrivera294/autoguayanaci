 <div class="container-fluid">
     <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
         <ul class="nav nav-sidebar">
             <li class="dropdown-submenu active">
               <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    Artículos
                    <span class="caret"></span>
               </a>
               <ul class="dropdown-menu ">
                    <li class="active" ><a href="<? base_url("index.php/stock/registrarArticulo");?>">Registrar artículos</a></li>
                    <li ><a href="#">Gestionar artículos</a></li>
               </ul>
           </li>
             <li class="dropdown-submenu">
               <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    Vehículos
                    <span class="caret"></span>
               </a>
               <ul class="dropdown-menu">
                    <li><a href="#">Registrar vehículos</a></li>
                    <li ><a href="#">Gestionar vehículos</a></li>
               </ul>
           </li>
           <li class="dropdown-submenu">
               <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    Empleados
                    <span class="caret"></span>
               </a>
               <ul class="dropdown-menu">
                    <li ><a href="#">Gestionar empleados</a></li>
                    <li ><a href="#">Gestionar fichas</a></li>
               </ul>
           </li>
             <li class="dropdown-submenu">
               <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    Reportes
                    <span class="caret"></span>
               </a>
               <ul class="dropdown-menu">
                    <li ><a href="#">Ventas</a></li>
                    <li ><a href="#">Top 5 vendedores</a></li>
                    <li ><a href="#">Desempeño general</a></li>
               </ul>
           </li>
         </ul>
        </div>
       <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">


         <h2 class="sub-header">Registro Articulo</h2>
         <div>
         <form role="form" action='<?= base_url();?>index.php/stock/registrarArticulo' method="post">


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <h3>Descripcion:</h3>
            <div class="form-group">
                <input type="text" name="first_name" id="first_name" class="form-control input-lg" placeholder="" tabindex="1">
            </div>
    </div>
</div>
<div class="row">
<div class="col-xs-12 col-sm-6 col-md-6">
                   <h3>Modelo:</h3>
<div class="form-group">
                       <input type="text" name="first_name" id="first_name" class="form-control input-lg" placeholder="" tabindex="1">
</div>
</div>
<div class="col-xs-12 col-sm-6 col-md-6">
                   <h3>Fabricante:</h3>
<div class="form-group">
                       <input type="text" name="first_name" id="first_name" class="form-control input-lg" placeholder="" tabindex="1">
</div>
</div>

</div>

<div class="row">

<div class="col-xs-12 col-sm-6 col-md-6">
                   <h3>Precio:</h3>
<div class="form-group">
                       <input type="text" name="first_name" id="first_name" class="form-control input-lg" placeholder="" tabindex="1">
</div>
</div>
<div class="col-xs-12 col-sm-6 col-md-6">
                   <h3>Disponibilidad:</h3>
<div class="form-group">
                       <input type="text" name="first_name" id="first_name" class="form-control input-lg" placeholder="" tabindex="1">
</div>
</div>
</div>



<br>

<div class="row">
<div class="col-xs-12 col-md-6"><input type="submit" value="Registrar" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
<div class="col-xs-12 col-md-6"><a href="#" class="btn btn-warning btn-block btn-lg">Cancelar</a></div>
</div>
</form>
         </div>
       </div>
     </div>
   </div>
