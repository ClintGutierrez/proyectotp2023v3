<!-- Begin Page Content -->
<div class="container-fluid">


    <h1 class="h3 mb-2 text-gray-800">
        <?php echo $titulo; ?>
    </h1>

  

    <form action="<?php echo base_url(); ?>/usuarios/insertar" method="POST" autocomplete="off">

        
        <div class="form-group">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <label >Usuario</label>
                    <input type="text" class="form-control" id="usuario" name="usuario" required autofocus >
                </div>
                <div class="col-12 col-sm-6">
                    <label >Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>

            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <label >Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password" required  >
                </div>
                <div class="col-12 col-sm-6">
                    <label >Repite contraseña</label>
                    <input type="password" class="form-control" id="repassword" name="repassword" required>
                </div>

            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <label for="">Caja</label>
                    <select class="form-control" name="id_caja" id="id_caja" required>
                        <option value="">Seleccionar caja</option>
                        <?php foreach($cajas as $caja) {?>
                            <option value="<?php echo $caja['id'] ?>"><?php echo $caja['nombre'] ?></option>

                            <?php }?>
                    </select>
                </div>

                <div class="col-12 col-sm-6">
                    <label for="">Rol</label>
                    <select class="form-control" name="id_rol" id="id_rol" required>
                        <option value="">Seleccionar rol</option>
                        <?php foreach($roles as $rol) {?>
                            <option value="<?php echo $rol['id'] ?>"><?php echo $rol['nombre'] ?></option>

                            <?php }?>
                    </select>
                </div>

            </div>
        </div>


        <a href="<?php echo base_url(); ?>/usuarios" class="btn btn-primary">Volver</a>
        <button type="submit" class="btn btn-success">Guardar</button>


    </form>

</div>