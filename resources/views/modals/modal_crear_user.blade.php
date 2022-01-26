<div class="container">
        <div class="row">
            <div class="col-md-12">
                <div tabindex="-1" class="modal fade" id="modal_create" aria-labelledby="modalCreateLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md">
                        <form action="registrar" method="post" class="form-group">
                            @csrf 
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="justify-content-center" style="font-size: 50; margin: auto">
                                        Agregar Usuario
                                    </h1>
                                </div>

                                <div class="modal-body">
                                    <div class="form-group" style="margin: auto">
                                        <label for="">Nombre</label>
                                        <input type="name" class="form-control form-control-lg" name="nombre_user" placeholder="Ingrese el nombre del empleado"/>
                                    </div>  
                                    <div class="form-group" style="margin: auto">
                                        <label for="">Correo Electrónico</label>
                                        <input type="email" class="form-control form-control-lg" name="email" placeholder="Ingrese el correo del empleado"/>
                                    </div>
                                    <div class="form-group" style="margin: auto">
                                        <label for="">Tipo de empleado</label>
                                        <select class="form-select form-select-lg" name="tipo" aria-label=".form-select-lg example" style="width: 470px; margin-bottom: 20px; font-size: 18">
                                            <option selected value="Supervisor">Supervisor</option>
                                            <option selected value="Técnico de Aseo">Técnico de Aseo</option>
                                            <option selected value="Recursos Humanos">Recursos Humanos</option>
                                        </select>
                                    </div>       
                                    

                                    <div class="form-group" style="margin: auto">
                                        <label for="">Contraseña</label>
                                        <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Ingrese la contraseña" style="width: 470px">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror


                                    </div>      
                                    
                                    <div class="form-group" style="margin: auto">
                                        <label for="">Confirmar Contraseña</label>
                                        <div class="col-md-6">
                                            <input id="password-confirm" type="password" class="form-control form-control-lg" name="password_confirmation" required autocomplete="new-password" placeholder="Ingrese nuevamente la contraseña" style="width: 470px">
                                            
                                            @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        
                                        </div>
                                        
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