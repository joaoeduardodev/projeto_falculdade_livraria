<?php
$this->load->view('templates/cabecalho');
$this->load->view('templates/menu');

?>
<!-- Inicio Tabela -->
<div id="tabela">

    <div class="col-md-12 order-md-1">

        <div class="card mt-3">
            <div class="card-body bg-dark">
                <h4 class="text-light">Relatorio financeiro</h4>
            </div>
        </div>
        <div class="accordion shadow p-3 mb-5 bg-white rounded" id="accordionExample">
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            RESUMO CAPITAL DE GIRO LIQUIDO
                        </button>
                    </h2>
                </div>

                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                                <?php if (isset($financeiro)) {
                                    $ativo = 0;
                                    $passivo = 0;
                                    foreach ($financeiro as $row) {

                                        $row->tipo == 0 ? $ativo = $ativo + $row->valor : $passivo = $passivo + $row->valor;
                                    }
                                ?>

                                    Foram realizadas <strong> <?= count($financeiro) ?> operações com ativos/passivos circulantes </strong>
                                    , somando o valor de R$ <?= $ativo ?> em ativos, e R$ <?= $passivo ?> em passivos.
                                    <br>
                                    Portando, a empresa ficou com um <strong>capital de giro liquido
                                        <?= ($ativo >= $passivo) ? 'positivo no valor de R$ ' . ($ativo - $passivo) : 'negativo no valor de R$ ' . ($passivo - $ativo) ?></strong> nas aperações com ativos/passivos circulantes realizadas.
                                    <br><small><strong>*Os cálculos acima não consideram as transações de compra e venda de livros, nem os livros em estoque.</small></strong>
                                <?php
                                } else {
                                ?>
                                    <h4 class="text-center">Não existem dados financeiros relacionados aos ativos e passivos circulantes</h4>
                                <?php
                                }
                                ?>
                            
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingThree">
                    <h2 class="mb-0">
                        <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            RELATÓRIO CAPITAL DE GIRO LIQUIDO
                        </button>
                    </h2>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="card-body">
                        <?php if (isset($financeiro)) { ?>
                            <div class="table-responsive">


                                <table class="table table-striped">

                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Tipo</th>
                                            <th scope="col">Descrição</th>
                                            <th scope="col">Valor</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                        <?php foreach ($financeiro as $row) {
                                        ?>
                                            <tr>
                                                <td><?php echo $row->id ?></td>
                                                <td><?php echo $row->tipo == 0 ? 'Ativo circulante' : 'Passivo circulante' ?></td>
                                                <td><?php echo $row->descricao ?></td>
                                                <td><?php echo 'R$ ' . $row->valor ?></td>
                                            </tr>
                                        <?php } ?>

                                    </tbody>
                                </table>

                            </div>
                        <?php
                        } else {
                        ?>
                            <h4 class="text-center">Não existem dados financeiros relacionados aos ativos e passivos circulantes</h4>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>



    </div>
</div>
<!-- Fim Tabela -->
<?php $this->load->view('templates/rodape'); ?>