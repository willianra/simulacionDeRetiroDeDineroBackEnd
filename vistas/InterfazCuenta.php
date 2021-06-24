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
                          <h1 class="box-title">Gestionar Cuenta <button class="btn btn-success" 
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
                            <th>idcuenta</th>
                            <th>numeroCuenta</th>
                            <th>tipo de cuenta</th>
                            <th>saldo</th>
                            <th>idPersona</th>
                            <th>estado</th>
                          </thead>
                          <tbody> 

                          </tbody>
                          <tfoot>
                          <th>Opciones</th>
                            <th>idcuenta</th>
                            <th>numeroCuenta</th>
                            <th>tipo de cuenta</th>
                            <th>saldo</th>
                            <th>idPersona</th>
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
                            <label>numero de cuenta:</label>
                          <input type="hidden" name="idcuenta" id="idcuenta">
                            <input type="text" class="form-control"
                             name="numeroCuenta" id="numeroCuenta" 
                             maxlength="256" 
                             placeholder="numeroCuenta">
                          </div>

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>tipoDeCuenta:</label>
                            <input type="text" class="form-control"
                             name="tipoDeCuenta" id="tipoDeCuenta" 
                             placeholder="tipoDeCuenta">
                          </div>
                          
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>saldo:</label>
                            <input type="text" class="form-control"
                             name="saldo" id="saldo" 
                             placeholder="saldo">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>selecionar persona :</label>
                            <select id="idpersona" name="idpersona" class="form-control selectpicker" data-live-search="true" required></select>
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
<script type="text/javascript" src="scripts/cuenta.js"></script>
 