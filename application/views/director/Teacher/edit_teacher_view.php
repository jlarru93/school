        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Editar Profesor</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" method="post" action="">
                                    <input  type="hidden" class="form-control" value="edit" name="edit"  required>
                                    <input  type="hidden" class="form-control" value="<?php echo $data['codProfesor'] ?>" name="cod_teacher"  required>
                                        <div class="form-group">
                                            <label>Nombres</label>
                                            <input name="names" value="<?php echo $data['nomProfesor'] ?>" class="form-control" required>

                                        </div>
                                        <div class="form-group">
                                            <label>Apellido paterno</label>
                                            <input name="father_last_name" value="<?php echo $data['apePaternoProfesor'] ?>" class="form-control" required>
                                            
                                        </div>
                                        <div class="form-group">
                                            <label>Apellido materno</label>
                                            <input name="mother_last_name" value="<?php echo $data['apeMaternoProfesor'] ?>" class="form-control"  required>

                                        </div>
                                      <div class="form-group">
                                            <label>direccion</label>
                                            <input name="address_street" value="<?php echo $data['dirProfesor'] ?>" class="form-control"  required>
                                        </div>
                                         <div class="form-group">
                                            <label>correo electronico</label>
                                            <input name="email"  value="<?php echo $data['emailProfesor'] ?>" class="form-control" type="email" required>
                                        </div>

                                        <div class="form-group">
                                            <label>telefono</label>
                                            <input name="cellphone" value="<?php echo $data['telfProfesor'] ?>" onKeyDown="if(this.value.length==9) return false;" class="form-control" type="number" maxlength="9"  required>
                                            
                                        </div>

                                        <div class="form-group">
                                          <div class="form-group">
                                            <label>Fecha nacimiento</label>
                                            <input name="Birthdate" class="datepicker" value="<?php echo $data['fechaNacProfesor'] ?>" type="text" data-date-format="yyyy-mm-dd" name="date" required>


                                        </div>

                                    <div class="form-group">
                                        <label>Sexo</label>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="sex" id="optionsRadios1" value="M" <?php if ($data['sexoProfesor']=='M'): ?>
                                                        checked
                                                    <?php endif ?>>Masculino
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="sex" id="optionsRadios2" value="F" <?php if ($data['sexoProfesor']=='F'): ?>
                                                        checked
                                                    <?php endif ?> >Femenina
                                            </label>
                                        </div>
                                    </div>



                                    <button type="submit" class="btn btn-default">Modificar</button>
                                    <button type="reset" class="btn btn-default">Cancelar</button>
                                </form>
                            </div>  

                        </div>
                        <!-- /.row (nested) -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->
