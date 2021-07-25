<?php
$this->load->view('templates/cabecalho');
$this->load->view('templates/menu');

?>
<!-- Inicio Tabela -->
<div id="tabela">

    <div class="col-md-12 order-md-1">

        <div class="card mt-3">
            <div class="card-body bg-dark">
                <h4 class="text-light">Relatorio transações de compra e venda</h4>
            </div>
        </div>
        <div class="accordion shadow p-3 mb-5 bg-white rounded" id="accordionExample">
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            RESUMO DAS TRANSAÇÕES
                        </button>
                    </h2>
                </div>

                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        <?php

                        if (isset($transacoes)) {
                            $venda = 0;
                            $compra = 0;
                            foreach ($transacoes as $row) {

                                $row->tipo == 1 ? $venda = $venda + $row->valor : $compra = $compra + $row->valor;
                            }
                        ?>

                            <div class="card">
                                <div class="card-body">
                                    Foram realizadas <strong> <?= count($transacoes) ?> transações de compra/venda </strong>
                                    , somando o valor de R$ <?= $venda ?> em vendas, e R$ <?= $compra ?> em compras.
                                    <br>
                                    Portando, a empresa ficou com um <strong>saldo
                                        <?= ($venda >= $compra) ? 'positivo no valor de R$ ' . ($venda - $compra) : 'negativo no valor de R$ ' . ($compra - $venda) ?></strong> nas compras/vendas realizadas.
                                </div>
                            </div>
                        <?php } else { ?>
                            <h4 class="text-center">Não existem transacoes realizadas</h4>
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
                            RELATÓRIO TRANSAÇÕES
                        </button>
                    </h2>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="card-body">
                        <?php if (isset($transacoes)) { ?>
                            <table class="table table-striped">

                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Tipo</th>
                                        <th scope="col">Valor</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    foreach ($transacoes as $row) {
                                    ?>
                                        <tr>
                                            <td><?php echo $row->id ?></td>
                                            <td><?php echo $row->tipo == 1 ? 'Venda' : 'Compra' ?></td>
                                            <td><?php echo 'R$ ' . $row->valor ?></td>

                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>

                        <?php } else { ?>
                            <h4 class="text-center">Não existem transacoes realizadas</h4>
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