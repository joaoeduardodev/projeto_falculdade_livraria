<?php
$this->load->view('templates/cabecalho');
$this->load->view('templates/menu');

?>
<!-- Inicio Tabela -->
<?php if (isset($mensagem)) { ?>
    <div class="alert alert-danger" role="alert">
        <?= $mensagem; ?>

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php
}
?>

<div id="tabela">

    <div class="col-md-12 order-md-1">

        <div class="card mt-3">
            <div class="card-body bg-dark">
                <h4 class="text-light">Listar livros</h4>
            </div>
        </div>

        <div class="card-body shadow p-3 mb-5 bg-white rounded table-responsive">


            <?php if (isset($livro)) { ?>
                <table class="table table-striped">

                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Descricao</th>
                            <th scope="col">Valor compra</th>
                            <th scope="col">Valor venda</th>
                            <th scope="col">Quantidade</th>
                            <th scope="col">Vender</th>
                            <th scope="col">Atualizar</th>
                            <th scope="col">Excluir</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        foreach ($livro as $row) {
                        ?>
                            <td><?php echo $row->id ?></td>
                            <td><?php echo $row->nome ?></td>
                            <td><?php echo $row->descricao ?></td>
                            <td><?php echo $row->valor_compra ?></td>
                            <td><?php echo $row->valor_venda ?></td>
                            <td><?php echo $row->quantidade ?></td>
                            <td>
                                <!-- Button abrir modal de venda -->
                                <button type="button" class="btn btn-warning" name="btnVender" onclick="preencherDadosVenda(<?php echo $row->id . ',' . $row->quantidade; ?>)" data-toggle="modal" data-target="#modalVenda">
                                    Vender
                                </button>
                            </td>
                            <td><a type="button" href="<?php echo base_url('livro/salvar/' . $row->id); ?>" class="btn btn-primary">Alterar</a></td>
                            <td><a type="button" href="<?php echo base_url('livro/excluir/' . $row->id); ?>" class="btn btn-danger">Deletar</a></td>
                            </tr>
                        <?php
                        }
                        ?>

                    </tbody>
                </table>

            <?php } else { ?>
                <h4 class="text-center">Não existem livros em estoque</h4>
            <?php
            }
            ?>


            <!-- Modal -->
            <div class="modal fade" id="modalVenda" tabindex="-1" role="dialog" aria-labelledby="modalVendaTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <?php echo form_open('livro/vender'); ?>
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Vender</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-12">
                                    <label for="id_produto">ID produto:</label>
                                    <input type="text" class="form-control id_produto" id="id_produto" name="id_produto" hidden>
                                    <input type="text" class="form-control id_produto" disabled>
                                </div>
                                <div class="col-12">
                                    <label for="quantidade">Quantidade:</label>
                                    <input type="number" class="form-control" id="quantidade_venda" name="quantidade_venda" min="1" required>
                                    <input type="number" class="form-control" id="quantidade_estoque" name="quantidade_estoque" hidden>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-success">Vender</button>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Script para preencher dados -->
<script>
    // Inicio função 
    function preencherDadosVenda(id_produto, quantidade) {
        $('.id_produto').val(id_produto);
        $('#quantidade_venda').attr('max', quantidade);
        $('#quantidade_estoque').val(quantidade);
    }
</script>

<!-- Fim Tabela -->
<?php $this->load->view('templates/rodape'); ?>