<!-- Begin Page Content -->
<div class="container-fluid">

    
    <h1 class="h3 mb-2 text-gray-800"><?php echo $titulo;?></h1>

    <div>
        <p>
            
            <a href="<?php echo base_url(); ?>/clientes" class="btn btn-warning">Clientes</a>
        </p>
    </div>
    

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Direccion</th>
                            <th>Telefono</th>
                            <th>Correo</th>
                            <th></th>
                            
                           
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php foreach($datos as $dato){?>
                            <tr>
                                <td><?php echo $dato['id'];?></td>
                                <td><?php echo $dato['nombre'];?></td>
                                <td><?php echo $dato['direccion'];?></td>
                                <td><?php echo $dato['telefono'];?></td>
                                <td><?php echo $dato['correo'];?></td>

                                <td><a href="#" data-href="<?php echo base_url().'/clientes/reingresar?idReingresar='
                                . $dato['id'];?>" data-toggle="modal" data-target="#modal-confirma"
                                data-placement="top" title="Reingresar registro" class="btn btn-danger"><i class="fas 
                                fa-arrow-alt-circle-up"></i></a></td>
                                
                            </tr>


                        <?php }?>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>


</div>

<!-- modal -->
<div class="modal fade" id="modal-confirma" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reingresar registro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>¿Desea reingresar este registro?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-light" data-dismiss="modal">No</button>
        <a class="btn btn-danger btn-ok">Si</a>
      </div>
    </div>
  </div>
</div>