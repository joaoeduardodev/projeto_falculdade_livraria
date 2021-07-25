<!-- Inicio Navbar -->
<nav class="navbar navbar-light bg-dark">
  <a class="navbar-brand" href="#">
    <h2 class="text-white">Sistema Livraria</h2>
  </a>
  <div class="form-inline">
    <a class="btn btn-outline-primary my-2 my-sm-0" href="<?php echo base_url('livro'); ?>">VISUALIZAR</a>
    <a class="btn btn-outline-primary my-2 ml-1 my-sm-0" href="<?php echo base_url('livro/salvar'); ?>">CADASTRAR</a>
    <a class="btn btn-outline-primary my-2 ml-1 my-sm-0" href="<?php echo base_url('transacoes'); ?>">TRANSAÇÕES</a>
    <a class="btn btn-outline-primary my-2 ml-1 my-sm-0" href="<?php echo base_url('financeiro'); ?>">FINANCEIRO</a>
    <a class="btn btn-outline-primary my-2 ml-1 my-sm-0" data-toggle="modal" data-target="#modalCg">+CG</a>
    <a class="btn btn-outline-danger my-2 ml-1 my-sm-0" href="<?php echo base_url('usuario/logout'); ?>">SAIR</a>
  </div>
</nav>


<!-- Modal -->
<div class="modal fade" id="modalCg" tabindex="-1" role="dialog" aria-labelledby="modalCgTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <?php echo form_open('financeiro/salvar'); ?>
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Capital de giro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-12">
            <label for="tipo">Tipo:</label>
            <select class="form-control" id="tipo" name="tipo" required>
              <option selected>Escolha...</option>
              <option value="0">Ativo circulante</option>
              <option value="1">Passivo circulante</option>
            </select>
          </div>
          <div class="col-12">
            <label for="descricao">Descrição:</label>
            <input type="text" class="form-control" id="descricao" name="descricao" maxlength="100" required>
          </div>
          <div class="col-12">
            <label for="valor">Valor:</label>
            <input type="number" class="form-control" id="valor" name="valor" required>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-success">Cadastrar</button>
      </div>
    </div>
    <?php echo form_close(); ?>
  </div>
</div>

<!-- Fim Navbar -->