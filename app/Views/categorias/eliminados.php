<!-- Begin Page Content -->
<div class="container-fluid">

    
    <h1 class="h3 mb-2 text-gray-800"><?php echo $titulo;?></h1>

    <div>
        <p>
            
            <a href="<?php echo base_url(); ?>/categorias" class="btn btn-warning">Categorias</a>
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
                            <th></th>
                            
                            
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php foreach($datos as $dato){?>
                            <tr>
                                <td><?php echo $dato['id'];?></td>
                                <td><?php echo $dato['nombre'];?></td>
                                <td><a href="<?php echo base_url().'/categorias/reingresar?idReingresar='. $dato['id'];?>" ><i class="fas fa-arrow-alt-circle-up"></i></a></td>
                                
                                
                            </tr>


                        <?php }?>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>


</div>