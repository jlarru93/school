        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Cursos</h1>
                </div>
                <!-- /.col-lg-12 -->             
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">                                
                          
                          <a href="<?php echo site_url('director/Course/add'); ?>" class="btn btn-primary" role="button">Registrar</a>          
                          
                          <a class="btn btn-primary" id="btnallcourses" role="button">todos los grados</a>          
                          
                          <a  class="btn btn-primary" id="btnprimaria" role="button">primaria</a>          
                          <a  class="btn btn-primary" id="btnprimaria1" role="button">1</a>
                          <a  class="btn btn-primary" id="btnprimaria2" role="button">2</a>
                          <a  class="btn btn-primary" id="btnprimaria3" role="button">3</a>
                          <a  class="btn btn-primary" id="btnprimaria4" role="button">4</a>
                          <a  class="btn btn-primary" id="btnprimaria5" role="button">5</a>          
                          <a  class="btn btn-primary" id="btnprimaria6" role="button">6</a>        

                          <a  class="btn btn-primary" id="btnsecundaria" role="button">secundaria</a>  
                          <a  class="btn btn-primary" id="btnsecundaria1" role="button">1</a>
                          <a  class="btn btn-primary" id="btnsecundaria2" role="button">2</a>
                          <a  class="btn btn-primary" id="btnsecundaria3" role="button">3</a>
                          <a  class="btn btn-primary" id="btnsecundaria4" role="button">4</a>
                          <a  class="btn btn-primary" id="btnsecundaria5" role="button">5</a>          
                
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-courses">
                                    <thead>
                                        <tr>
                                            <th>nombre</th>
                                            <th>nivel</th>
                                            <th>grado</th>
                                            <th>ver silabus</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php foreach ($Courses as $key => $Course): 
                                        $nivel=substr($Course['CodGrado'], 1)=='P'?'primaria':'secundaria';
                                        $grado=substr($Course['CodGrado'], 0,1).'°';
                                        $data='';
                                        $data=json_encode($Course,true);
                                       ?>
                                             <tr class="gradeU">
                                            <td><?php echo $Course['DescripCurso']; ?></td>
                                            <td><?php echo $nivel; ?></td>
                                            <td><?php echo $grado; ?></td>
                                            <td class="center">
                                            <form action="<?php echo site_url('director/course/edit'); ?>" method="post">
                                              <a title="ver silabus" href="#<?php echo $Course['CodCurso']; ?>" class="btn btn-primary btn-circle" role="button"><i class="glyphicon glyphicon-check"></i></a>
                                              <button class="btn btn-warning btn-circle" role="button"><i class="fa fa-edit"></i></button>    
                                              <input type="hidden" name="data" value='<?php echo($data);?>' />    
                                            </form>
                                            </td>
                                        </tr>
                                       <?php endforeach ?>
                                      
                                    
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

      