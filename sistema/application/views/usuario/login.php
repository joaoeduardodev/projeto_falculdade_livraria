<?php
    $this->load->view('templates/cabecalho');
?>


<div id="formularioLogin">
    <div class="col-md-6 offset-md-3 order-md-1">
        <div class="card mt-3">
            <div class="card-body bg-dark">
                <h4 class="text-light text-center">Login no Sistema</h4>
            </div>
        </div>
        <div class="card-body shadow p-3 mb-5 bg-white rounded">
            <?php echo form_open('usuario/login'); ?>
       
                <div class="row">
                    <div class="col-12">
                        <label for="login">Login:*</label>
                        <input type="text" class="form-control" id="login" name="login" required>
                        <div class="invalid-feedback">
                            Campo obrigatório.
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="senha">Senha:*</label>
                        <input type="password" class="form-control" id="senha" name="senha" required>
                        <div class="invalid-feedback">
                            Campo obrigatório.
                        </div>
                    </div>
                    <div class="col-12 text-center pt-3">
                        <span>*Todos os campos são obrigatórios.</span>
                    </div>
                    <div class="col-12 pt-3">
                        <button class="btn btn-success btn-lg btn-block" name="logar" type="submit">Login</button>
                    </div>
                </div>

                <?php echo form_close(); ?>


        </div>
    </div>
</div>
<?php 
    $this->load->view('templates/rodape'); 
?>
