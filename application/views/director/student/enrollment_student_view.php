   <div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Matriculas</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Formulario de matriculas
                </div>
                <div class="panel-body">

                    <div class="row">
                        <div class="col-lg-6">
                            <h1>Informacion del alumno</h1>

                              <div class="form-group">
                                <label>dni alumno</label>
                                <input class="form-control">
                                <p class="help-block">ingrese el dni y consulte si el alumno estudio el año pasado o en otros años</p>
                                <a href="<?php echo '#nothing'; ?>" class="btn btn-primary" role="button">Consultar</a>          
                            </div>
                        </br>
                        <fieldset disabled>
                            <div class="form-group">
                                <label for="disabledSelect">nombres del alumno</label>
                                <input class="form-control" id="disabledInput" type="text" placeholder="Disabled input" disabled>
                            </div>
                            <div class="form-group">
                                <label for="disabledSelect">apellido paterno del alumno</label>
                                <input class="form-control" id="disabledInput" type="text" placeholder="Disabled input" disabled>
                            </div>                                            
                            <div class="form-group">
                                <label for="disabledSelect">apellido materno del alumno</label>
                                <input class="form-control" id="disabledInput" type="text" placeholder="Disabled input" disabled>
                            </div> 
                            <label>Fecha nacimiento</label>
                            <div class="input-group date">
                                <input type="text" class="datepicker form-control" name="date" required readonly="">
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                            </div>                                           
                        </fieldset>

                </div>
                <!-- /.col-lg-6 (nested) -->
                <div class="col-lg-6">
                 <div class="form-group">
                    <h1>Informacion del apoderado</h1>
                    <div class="form-group">
                        <label>dni apoderado</label>
                        <input class="form-control">
                        <p class="help-block">ingrese el dni y consulte si el apoderado esta registrado. Si el apoderado ya esta registrado los datos se rellenaran automaticamente</p>
                        <a href="<?php echo '#nothing'; ?>" class="btn btn-primary" role="button">Consultar</a>          
                    </div>
                    <div class="form-group">
                      <label for="disabledSelect">nombres del apoderado</label>
                      <input class="form-control" id="disabledInput" type="text" placeholder="Disabled input" disabled>

                  </div>
                  <div class="form-group">
                     <label for="disabledSelect">apellido paterno del apoderado</label>
                     <input class="form-control" id="disabledInput" type="text" placeholder="Disabled input" disabled>

                 </div>
                 <div class="form-group">
                    <label for="disabledSelect">apellido materno del apoderado</label>
                    <input class="form-control" id="disabledInput" type="text" placeholder="Disabled input" disabled>

                </div>
                <div class="form-group">
                    <label>Fecha nacimiento</label>
                    <div class="input-group date">
                        <input type="text" class="datepicker form-control" name="date" required readonly="">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                        </div>
                    </div>
                </div>




            </div>

        </div>
        <div class="form-group">
            <label>parentesco</label>
            <select class="form-control">
                <option>Padre</option>
                <option>Madre</option>
                <option>Abuelo(a)</option>
                <option>Hermano(a)</option>
                <option>Tio(a)</option>
                <option>Primo(a)</option>
                <option>Vecino(a)</option>
            </select>

        </div>

            





 
        <!-- /.col-lg-6 (nested) -->
    </div>

    <!-- /.row (nested) -->
</div>

<!-- /.panel-body -->
</div>
    <div class="panel panel-default">
                        <div class="panel-heading">
                            informacion de año academico
                        </div>
                        <div class="panel-body">
                                 <div class="form-group">
            <label>ingreso</label>
            <select class="form-control">
                <option>alumno nuevo, primero de primaria</option>
                <option>alumno nuevo, traslado escolar</option>
                <option>alumno antiguo</option>
                <option>alumno antiguo, re-ingreso a la institucion</option>
            </select>
            

        </div>

                        </div>
                        <div class="panel-footer">
                            Panel Footer
                        </div>
                    </div>
                           <div class="form-group">
            <button type="submit" disabled class="btn btn-primary">terminar</button>
        </div>
<!-- /.panel -->
</div>
<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
</div>
<!-- /#page-wrapper -->
