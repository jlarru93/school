        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Editar Alumno</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            modifique informacion basica del estudiante
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" method="post" action="">
                                    <input  type="hidden" class="form-control" value="edit" name="edit"  required>
                                    <input  type="hidden" class="form-control" value="<?php echo $data['codEstudiante'] ?>" name="cod_student"  required>
                                        <div class="form-group">
                                            <label>Dni</label>
                                           <input class="form-control" value="<?php echo $data['dniEstudiante'] ?>" name="dni_student"  required>
                                          
                                        </div> 
                                        <div class="form-group">
                                            <label>Nombres</label>
                                            <input class="form-control" value="<?php echo $data['nomEstudiante'] ?>" name="name_student" required>
                                           
                                        </div>
                                        <div class="form-group">
                                            <label>Apellido paterno</label>
                                            <input class="form-control" value="<?php echo $data['apePaternoEstudiante'] ?>" name="last_name" required>
                                            
                                        </div>
                                        <div class="form-group">
                                            <label>Apellido materno</label>
                                            <input class="form-control" value="<?php echo $data['apeMaternoEstudiante'] ?>" name="mother_last_name"  required>
                                        <div class="form-group">
                                            <label>Fecha nacimiento</label>
                                           <input class="datepicker" value="<?php echo $data['fechaNacEstudiante'] ?>" type="text" name="Birthdate" dateFormat: 'dd-mm-yyyy' required readonly="">
                                          
                                        </div> 
                                         <div class="form-group">
                                            <label>Sexo</label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="sex" id="optionsRadios1" value="M" <?php if ($data['sexoEstudiante']=='M'): ?>
                                                        checked
                                                    <?php endif ?> >Masculino
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="sex" id="optionsRadios2" value="F" <?php if ($data['sexoEstudiante']=='F'): ?>
                                                        checked
                                                    <?php endif ?>>Femenina
                                                </label>
                                            </div>

                                        </div> 
                                        

                                    
                                   
                                        <button type="submit" class="btn btn-default">Modificar</button>
                                        <button type="reset" class="btn btn-default">Limpiar datos</button>
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
