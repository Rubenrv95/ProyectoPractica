<div class="container">
        <div class="row">
            <div class="col-md-12">
                <div tabindex="-1" class="modal fade" id="modal_create" aria-labelledby="modalCreateLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md">
                        <form action="crear_insta" method="post" class="form-group">
                            @csrf 
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="justify-content-center" style="font-size: 50; margin: auto">
                                        Agregar Instalacion
                                    </h1>
                                </div>

                                <div class="modal-body">
                                    <div class="form-group" style="margin: auto">
                                        <label for="">Nombre</label>
                                        <input type="name" class="form-control form-control-lg" name="nombre_insta" placeholder="Ingrese el nombre de la instalación"/>
                                    </div>  
                                    <div class="form-group" style="margin: auto">
                                        <label for="">Dirección</label>
                                        <input type="name" class="form-control form-control-lg" name="direccion" placeholder="Ingrese la dirección de la instalación"/>
                                    </div>
                                    <div class="form-group" style="margin: auto">
                                        <label for="">Dotación</label>
                                        <input type="number" class="form-control form-control-lg" style="width: 100px" name="dotacion"/>
                                    </div>         
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>