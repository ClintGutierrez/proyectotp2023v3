<!-- Begin Page Content -->
<div class="container-fluid">

    
    <h1 class="h3 mb-2 text-gray-800"><?php echo $titulo;?></h1>
    <?php \Config\Services::validation()->listErrors(); ?>
    
    <form action="<?php echo base_url();?>/clientes/insertar" method="POST" autocomplete="off">
        
    <?php csrf_field(); ?>
        <div class="form-group">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <label for="">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" autofocus required>
                </div>
                <div class="col-12 col-sm-6">
                    <label for="">Direccion</label>
                    <input type="text" class="form-control" id="direccion" name="direccion">
                </div>

            </div>
        </div>
        
        <div class="form-group">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <label for="">Telefono</label>
                    <input type="text" class="form-control" id="telefono" name="telefono" autofocus required>
                </div>
                <div class="col-12 col-sm-6">
                    <label for="">Correo</label>
                    <input type="text" class="form-control" id="correo" name="correo" required>
                </div>

            </div>
        </div>
        


            <a href="<?php echo base_url();?>/clientes" class="btn btn-primary">Volver</a>
            <button type="submit" class="btn btn-success">Guardar</button>

        
    </form>

</div>


