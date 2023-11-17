<!-- Begin Page Content -->
<div class="container-fluid">

    
    <h1 class="h3 mb-2 text-gray-800"><?php echo $titulo;?></h1>
    
    <form action="<?php echo base_url();?>unidades/actualizar" method="POST" autocomplete="off">
       
        <div class="form-group">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <label for="">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $datos['nombre'] ?>" autofocus required>
                </div>
                <div class="col-12 col-sm-6">
                    <label for="">Nombre corto</label>
                    <input type="text" class="form-control" id="nombre_corto" name="nombre_corto" value="<?php echo $datos['nombre_corto'] ?>" required>
                </div>

            </div>
        </div>

            <a href="<?php echo base_url();?>unidades" class="btn btn-primary">Volver</a>
            <button type="submit" class="btn btn-success">Guardar</button>

        
    </form>

</div>
