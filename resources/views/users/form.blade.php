
						<div class="row">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-8">

                                <h5 class="border-bottom pb-2">Datos generales</h5>
                                <div class="form-floating mb-3">
                                    <select class="form-control" id="id_dependencia" name="id_dependencia"></select>
                                    <label for="name">Organismo Público</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Nombre completo">
                                    <label for="name">Nombre completo</label>
                                </div>

                                <div class="form-floating mb-3 ">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Correo electrónico">
                                    <label for="email">Correo electrónico</label>
                                </div>

                                @if ( !isset($id_user) )
                                <h5 class="border-bottom pb-2">Seguridad de la cuenta</h5>
                                <div class="row g-4">
                                    <div class="col-6">
                                        <div class="form-floating mb-3">
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
                                            <label for="password">Contraseña</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-floating mb-3">
                                            <input type="password" class="form-control" id="confirm-password" name="confirm-password" placeholder="Password">
                                            <label for="confirm-password">Confirmar contraseña</label>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                <h5 class="border-bottom pb-2">Rol de usuario</h5>
                                <div class="row items-push div-rol"></div>
                                
                            </div>
                            <div class="col-lg-2"></div>
                        </div>