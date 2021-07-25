<?php
$this->load->view('templates/cabecalho');
$this->load->view('templates/menu');

?>

<!-- Incio Formulario Cadastro -->
<div id="formularioLivros">
    <div class="col-md-12 order-md-1">
        <div class="card mt-3">
            <div class="card-body bg-dark">
                <h4 class="text-light">Livros</h4>
            </div>
        </div>
        <div class="card-body shadow p-3 mb-5 bg-white rounded">

            <?php echo form_open('livro/salvar'); ?>
                <input type="hidden" id="id" name="id" value="<?php echo isset($livro) ? $livro->id : ""; ?>">
                <div class="row">
                    <div class="col-12">
                        <label for="firstName">Nome:*</label>
                        <input type="text" class="form-control" id="nome" name="nome" value="<?php echo isset($livro) ? $livro->nome : ""; ?>" required>
                        <div class="invalid-feedback">
                            Campo obrigatório.
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="firstName">Descricao:*</label>
                        <textarea type="text" class="form-control" id="descricao" name="descricao"  required><?php echo isset($livro) ? $livro->descricao : ""; ?></textarea>
                        <div class="invalid-feedback">
                            Campo obrigatório.
                        </div>
                    </div>
                    <div class="col-md-5">
                        <label for="firstName">Valor compra:*</label>
                        <?php if(isset($livro)){?>
                            <input type="number" class="form-control" value="<?= $livro->valor_compra?>" disabled>
                        <?php } ?>
                        <input type="number" class="form-control" id="valor_compra" name="valor_compra" value="<?php echo isset($livro) ? $livro->valor_compra : ""; ?>" required <?php echo isset($livro) ? 'hidden' : '' ?>>
                        <div class="invalid-feedback">
                            Campo obrigatório.
                        </div>
                    </div>
                    <div class="col-md-5">
                        <label for="firstName">Valor venda:*</label>
                        <input type="number" class="form-control" id="valor_venda" name="valor_venda" value="<?php echo isset($livro) ? $livro->valor_venda : ""; ?>" required>
                        <div class="invalid-feedback">
                            Campo obrigatório.
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label for="firstName">Quantidade:*</label>
                        <input type="number" class="form-control" id="quantidade" name="quantidade" value="<?php echo isset($livro) ? $livro->quantidade : ""; ?>" <?php echo isset($livro) ? 'min="'. $livro->quantidade.'"' : '' ?> required>
                        <div class="invalid-feedback">
                            Campo obrigatório.
                        </div>
                    </div>
                </div>

                <hr class="mb-4">

                <div class="row">
                    <div class="col-md-9 mt-2"> *Todos os campos são obrigatórios.</div>
                    <div class="col-md-3">
                        <button class="btn btn-success btn-lg btn-block" type="submit">Salvar</button>
                    </div>
                </div>

            <?php echo form_close(); ?>

            

        </div>
    </div>
    <!-- Fim  Formulario Cadastro-->
    <?php $this->load->view('templates/rodape'); ?>
