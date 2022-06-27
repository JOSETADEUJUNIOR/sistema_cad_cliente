<div class="form-group" id="divProd">
                                                <label>Selecione o Produto</label>
                                                <select name="produto" id="produto" class="produto form-control" onfocusout="SinalizaCampo('divProd','produto')">
                                                    <option value="">Escolha o produto</option>
                                                    <?php foreach ($produtos as $prod) { ?>
                                                        <option value="<?= $prod['id_produto'] . '-' . $prod['valor_produto'] ?>"><?= $prod['nome_produto'] . ' | estoque: ' . $prod['estoque'] . 'qtd' . '| R$: ' . $prod['valor_produto'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>