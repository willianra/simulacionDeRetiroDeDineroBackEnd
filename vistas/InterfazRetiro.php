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
                          <h1 class="box-title">Gestionar Retiro <button class="btn btn-success" 
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
                            <th>idRetiro</th>
                            <th>idCuenta</th>
                            <th>Accion</th>
                            <th>monto</th>
                            <th>Saldo</th>
                            <th>FechaRetiro</th>
                            <th>Condicion</th>
                          </thead>
                          <tbody> 

                          </tbody>
                          <tfoot>
                          <th>Opciones</th>
                            <th>idRetiro</th>
                            <th>idCuenta</th>
                            <th>Accion</th>
                            <th>monto</th>
                            <th>Saldo</th>
                            <th>FechaRetiro</th>
                            <th>Condicion</th>
                          </tfoot>
                        </table>
                    </div>

                    <div class="panel-body" style="height: 400px;"
                     id="formularioregistros">
                        <form name="formulario" 
                        id="formulario" method="POST">
                         <!--div responsivo-->
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>numero Cuenta:</label>
                          <input type="hidden" name="idretiro" id="idretiro">
                            <input type="text" class="form-control"
                             name="idCuenta" id="idCuenta" 
                             maxlength="256" 
                             placeholder="numero de cuenta">
                          </div>

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label> realizar un:</label>
                            <br>
                            <input type="radio" id="accion" name="accion" value="retiro">
                            <label for="accion">retiro</label><br>
                            <input type="radio" id="deposito" name="accion" value="retiro">
                            <label for="deposito">deposito no disponible</label><br> 
                          </div>
                          
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>monto:</label>
                            <input type="text" class="form-control"
                             name="monto" id="monto" 
                             placeholder="monto">
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
<script type="text/javascript" src="scripts/retiro.js"></script>
 