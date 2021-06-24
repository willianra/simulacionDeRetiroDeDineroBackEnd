      <!-- Content Wrapper. Contains page content -->
      <?php
      require 'header2.php';
      ?>
      <div class="content-wrapper">        
        <!-- Main content -->
        <section class="content">
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    
                    <div class="box-header with-border">
                          <h1 class="box-title">Gestionar Persona <button class="btn btn-success" 
                            id="btnagregar" onclick="mostrarform(true)"><i
                            class="fa fa-plus-circle"></i> CREAR</button></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>

                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadopersona">
                        <table id="tbllistado" 
                        class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Opciones</th>
                            <th>idpersona</th>
                            <th>nombre</th>
                            <th>telefono</th>
                            <th>carnet</th>
                            <th>direccion</th>
                            <th>fechaNacimiento</th>
                            <th>Correo </th>
                            <th>codigo</th>
                            <th>huella</th>
                            <th>estado</th>
                          </thead>
                          <tbody> 

                          </tbody>
                          <tfoot>
                          <th>Opciones</th>
                            <th>idpersona</th>
                            <th>nombre</th>
                            <th>telefono</th>
                            <th>carnet</th>
                            <th>direccion</th>
                            <th>fechaNacimiento</th>
                            <th>Correo </th>
                            <th>codigo</th>
                            <th>huella</th>
                            <th>estado</th>
                          </tfoot>
                        </table>
                    </div>

                    <div class="panel-body" style="height: 400px;"
                     id="formularioregistros">
                        <form name="formulario" 
                        id="formulario" method="POST">
                         <!--div responsivo-->
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>nombre:</label>
                          <input type="hidden" name="idpersona" id="idpersona">
                            <input type="text" class="form-control"
                             name="nombre" id="nombre" 
                             maxlength="256" 
                             placeholder="nombre">
                          </div>

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>telefono:</label>
                            <input type="text" class="form-control"
                             name="telefono" id="telefono" 
                             placeholder="telefono">
                          </div>
                          
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>carnet:</label>
                            <input type="text" class="form-control"
                             name="carnet" id="carnet" 
                             placeholder="carnet">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>direccion:</label>
                            <input type="text" class="form-control"
                             name="direccion" id="direccion" 
                             maxlength="256" 
                             placeholder="direccion">
                          </div>
                       
                          
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>nechaNacimiento:</label>
                            <input type="date" class="form-control"
                             name="fechaNacimiento" id="fechaNacimiento" 
                             maxlength="256" 
                             placeholder="fechaNacimiento">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>correo:</label>
                            <input type="text" class="form-control"
                             name="correo" id="correo" 
                             maxlength="256" 
                             placeholder="correo">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>codigo:</label>
                            <input type="text" class="form-control"
                             name="codigo" id="codigo" 
                             placeholder="codigo">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>huella:</label>
                            <input type="text" class="form-control"
                             name="huella" id="huella" 
                             placeholder="huella">
                          </div>
                           
                   
                          
                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                             <!--buton de tipo submit el cual envia el formulario por el metodo por ajax   -->
                            <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>

                            <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                          </div>
                        </form>
                    </div>
                    <!--Fin centro -->
                  </div><!-- /.box -->
              </div><!-- /.col -->
          </div><!-- /.row -->
      </section><!-- /.content -->

    </div><!-- /.content-wrapper -->
  <!--Fin-Contenido-->
<?php
 
 
require 'footer.php';
?>
<script type="text/javascript" src="scripts/persona.js"></script>
 