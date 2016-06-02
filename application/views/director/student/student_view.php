        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Alumnos</h1>
                </div>
                <!-- /.col-lg-12 -->             
            </div>
            <!-- /.row -->
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">                                
                          <a href="<?php echo site_url('Director/student/add_student'); ?>" class="btn btn-primary" role="button">Registrar</a>          
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>nombre completo</th>
                                            <th>grado y seccion</th>
                                            <th>turno</th>
                                            <th>accion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php  //var_dump($alumnos[1]);?>
                               <?php foreach ($alumnos as $alumno) { 
                                            $data='';
                                            $estado=$alumno['estudiante']['EstadoEstudiante'];
                                            $data=json_encode($alumno['estudiante'],true);
                                ?>
                                    
                                        <tr class="gradeA" >
                                            <td class="center">
                                            <?php // nombre del alumno;
                                              echo  $alumno['estudiante']['nomEstudiante'].
                                                $alumno['estudiante']['apePaternoEstudiante'].
                                                $alumno['estudiante']['apeMaternoEstudiante'];
                                            ?>
                                            </td>
                                            <td class="center">
                                             <?php // turno del alumno;
                                              echo 
                                              $alumno['seccion']['grado']['descripGrado'].' '.'"'.
                                              $alumno['seccion']['nomSeccion'].'"';
                                            ?>  

                                            </td>
                                            <td class="center">
                                                   <?php // turno del alumno;
                                              echo 
                                             $alumno['seccion']['turno'];
                                            ?>  
                                            </td>
                                            <td class="center">
                                            <form action="<?php echo site_url('director/student/edit'); ?>" method="post">
                                                
                                            
                                                <a title="ver cursos" href="<?php echo site_url('Director/student/course_student/'.$alumno['estudiante']['codEstudiante']); ?>" class="btn btn-primary btn-circle" role="button"><i class="glyphicon glyphicon-check"></i></a>
                                                <a title="ver apoderados" href="<?php echo site_url('Director/student/father_student'); ?>" class="btn btn-warning btn-circle" role="button"><i class="fa fa-list"></i></a>                                                
                                                <button class="btn btn-warning btn-circle" role="button"><i class="fa fa-edit"></i></button>    
                                                <input type="hidden" name="data" value='<?php echo($data);?>' />    

                                                <a title="asociar con apoderado" href="<?php echo site_url('Director/student/relation_father_student'); ?>" class="btn btn-success btn-circle" role="button"><i class="fa fa-arrows-h"></i></a>            
                                                <?php if ($estado=='1'): ?>
                                                <a id="<?php echo $alumno['estudiante']['codEstudiante'];?>" onclick="desactivar_alumno('<?php echo $alumno['estudiante']['codEstudiante'] ;?>',this);" class="btn btn-danger btn-circle" role="button" title="activar"><i class="fa fa-times"></i></a>     
                                                <?php else: ?>
                                                <a id="<?php echo $alumno['estudiante']['codEstudiante'];?>" onclick="activar_alumno('<?php echo $alumno['estudiante']['codEstudiante'] ;?>',this);" class="btn btn-info btn-circle" role="button" title="desactivar"><i class="fa fa-check"></i></a>     
                                                <?php endif ?>
                                                
                                                
                                            </form>    
                                            </td>
                                        </tr>
                                       
                                <?php } ?>
                                 
                                    
                                    </tbody>
                                </table>
                            </div>
                         
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
