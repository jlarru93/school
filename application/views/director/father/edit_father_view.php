        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Editar Apoderado</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Modificar informacion 
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" method="post" action="<?php echo base_url() ;?>/Director/Father/edit" onsubmit="return Validate(this);"  enctype="multipart/form-data">
                                       <input type="hidden" value="<?php echo $data['codApoderado'] ?>" name="CodApoderado" class="form-control" required>                                           
                                       <div class="form-group">
                                        <label>dni</label>
                                        <input value="<?php echo $data['DniApoderado'] ?>" name="dni" onKeyDown="if(this.value.length==8) return false;" class="form-control" type="number" maxlength="9"  required>

                                    </div>
                                    <div class="form-group">
                                        <label>Nombres</label>
                                        <input value="<?php echo $data['nomApoderado'] ?>" name="names" class="form-control" required>                                           
                                    </div>
                                    <div class="form-group">
                                        <label>Apellido paterno</label>
                                        <input value="<?php echo $data['apePaternoApoderado'] ?>" name="father_last_name" class="form-control" required>

                                    </div>
                                    <div class="form-group">
                                        <label>Apellido materno</label>
                                        <input value="<?php echo $data['apeMaternoApoderado'] ?>" name="mother_last_name" class="form-control"  required>

                                        <div class="form-group">
                                            <label>direccion</label>
                                            <input value="<?php echo $data['DirApoderado'] ?>" name="address_street" class="form-control"  required>
                                        </div>
                                        <div class="form-group">
                                            <label>telefono</label>
                                            <input value="<?php echo $data['TelfApoderado'] ?>" name="cellphone" onKeyDown="if(this.value.length==9) return false;" class="form-control" type="number" maxlength="9"  required>
                                            
                                        </div>
                                        <div class="form-group">
                                            <label>Sexo</label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="sex" id="optionsRadios1" value="M" <?php if ($data['SexoApoderado']=='M'): ?>
                                                        checked
                                                    <?php endif ?> >Masculino
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="sex" id="optionsRadios2" value="F" <?php if ($data['SexoApoderado']=='F'): ?>
                                                        checked
                                                    <?php endif ?>>Femenina
                                                </label>
                                            </div>

                                        </div>
                                        <div class="form-group">




                                            <label>Fecha nacimiento</label>
                                            <div class="input-group date">
                                                <input value="<?php echo $data['FechaNacApoderado'] ?>" type="text" class="datepicker form-control" name="date" required readonly="">
                                                <div class="input-group-addon">
                                                <span class="glyphicon glyphicon-th"></span>
                                                </div>
                                            </div>                                    
                                        </div> 


                                        <div class="form-group">
                                            <label>Foto</label>
                                            <input type="hidden" name="MAX_FILE_SIZE" value="99999999" />
                                            <input type='file' accept="image/*" id="imgInp" name="photo" />
                                            <img id="blah" src="#" alt="your image" width="200px"  height="200px" />                                           
                                        </div> 
                                    </div>



                                    <input type="hidden" name="edit" value="edit" />
                                    <button type="submit" class="btn btn-default">enviar cambio</button>
                                    <button type="reset" class="btn btn-default">limpiar</button>
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
