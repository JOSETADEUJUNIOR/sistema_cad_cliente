<?php

if (isset($_GET['ret'])) {
    $ret = $_GET['ret'];
}
if (isset($ret)) {
    switch ($ret) {
        case '-13':
            //echo '<div class="alert alert-success">
            //Ação realizada com sucesso!
            //  </div>';
            echo "<script>
              Swal.fire({
      
                  icon: 'warning',
                  title: 'Alerta',
                  width: 'auto',
                  html: '<h3>Valor Inicial precisa ser maior que 0!</h3>',
                  showConfirmButton: false,
                  timer: 5000,
              })
          </script>";
            break;

        case '-12':
            //echo '<div class="alert alert-success">
            //Ação realizada com sucesso!
            //  </div>';
            echo "<script>
              Swal.fire({
      
                  icon: 'warning',
                  title: 'Alerta',
                  width: 'auto',
                  html: '<h3>Não é possivel excluir, codigo ja utilizado</h3>',
                  showConfirmButton: false,
                  timer: 5000,
              })
          </script>";
            break;
        case '-11':
            //echo '<div class="alert alert-success">
            //Ação realizada com sucesso!
            //  </div>';
            echo "<script>
              Swal.fire({
      
                  icon: 'warning',
                  title: 'Alerta',
                  width: 'auto',
                  html: '<h3>Arquivo muito grande !! Max: 2MB!</h3>',
                  showConfirmButton: false,
                  timer: 5000,
              })
          </script>";
            break;
        case '-10':
            //echo '<div class="alert alert-success">
            //Ação realizada com sucesso!
            //  </div>';
            echo "<script>
              Swal.fire({
      
                  icon: 'warning',
                  title: 'Alerta',
                  width: 'auto',
                  html: '<h3>Caixa já esta aberto, use o Movimentar Caixa!</h3>',
                  showConfirmButton: false,
                  timer: 5000,
              })
          </script>";
            break;
        case '-9':
            //echo '<div class="alert alert-success">
            //Ação realizada com sucesso!
            //  </div>';
            echo "<script>
                  Swal.fire({
          
                      icon: 'warning',
                      title: 'Alerta',
                      width: 'auto',
                      html: '<h3>Sangria Maior que o valor do Caixa!</h3>',
                      showConfirmButton: false,
                      timer: 5000,
                  })
              </script>";
            break;
        case '-7':
            //echo '<div class="alert alert-success">
            //Ação realizada com sucesso!
            //  </div>';
            echo "<script>
              Swal.fire({
      
                  icon: 'success',
                  title: 'Sucesso',
                  width: 'auto',
                  html: '<h3>Venda realizada com sucesso!</h3>',
                  showConfirmButton: false,
                  timer: 5000,
              })

              setTimeout(function(){
                 window.location='" . $pag_ret . "';
              }, 2000);
          </script>";
            break;
        case '-6':
            //echo '<div class="alert alert-success">
            //Ação realizada com sucesso!
            //  </div>';
            echo "<script>
                
                Swal.fire({
                      icon: 'warning',
                      title: 'Alerta',
                      width: 'auto',
                      html: '<h3>Item Sem saldo no estoque/Quantidade Maior que estoque!</h3>',
                      showConfirmButton: false,
                      timer: 2000,
                    })
                    </script>";
            break;
        case '-3':
            //echo '<div class="alert alert-success">
            //Ação realizada com sucesso!
            //  </div>';
            echo "<script>
                  Swal.fire({
          
                      icon: 'Warning',
                      title: 'Oopss...',
                      width: 'auto',
                      html: '<h3>Campos de data obrigatórios!</h3>',
                      showConfirmButton: false,
                      timer: 5000,
                  })
    
                  setTimeout(function(){
                     window.location='" . $pag_ret . "';
                  }, 2000);
              </script>";
            break;
        case '-5':
            //echo '<div class="alert alert-success">
            //Ação realizada com sucesso!
            //  </div>';
            echo "<script>
              Swal.fire({
      
                  icon: 'error',
                  title: 'Oopss...',
                  width: 'auto',
                  html: '<h3>E-mail ou senha invalidos!</h3>',
                  showConfirmButton: false,
                  timer: 5000,
              })

              setTimeout(function(){
                 window.location='" . $pag_ret . "';
              }, 2000);
          </script>";
            break;
        case '-4':
            //echo '<div class="alert alert-success">
            //Ação realizada com sucesso!
            //  </div>';
            echo "<script>
                  Swal.fire({
          
                      icon: 'error',
                      title: 'Oopss...',
                      width: 'auto',
                      html: '<h3>sem ID</h3>',
                      showConfirmButton: false,
                      timer: 5000,
                  })
    
                  setTimeout(function(){
                     window.location='" . $pag_ret . "';
                  }, 2000);
              </script>";
            break;
        case '-2':
            //echo '<div class="alert alert-success">
            //Ação realizada com sucesso!
            //  </div>';
            echo "<script>
              Swal.fire({
      
                  icon: 'warning',
                  title: 'Alerta',
                  width: 'auto',
                  html: '<h3>Não foi possível excluir o registro, pois o mesmo esta em uso!</h3>',
                  showConfirmButton: false,
                  timer: 5000,
              })

              setTimeout(function(){
                 window.location='" . $pag_ret . "';
              }, 2000);
          </script>";
            break;
        case '-1':
            echo '<div class="alert alert-danger">
        Ocorreu um erro na ação. Tente Mais tarde;
        </div>';
            break;

        case '0':
            echo "<script>
              Swal.fire({
      
                  icon: 'warning',
                  title: 'Alerta',
                  width: 'auto',
                  html: '<h3>Preencha os campos obrigatórios!</h3>',
                  showConfirmButton: false,
                  timer: 2000,
              })

          </script>";
            break;
        case '1':
            //echo '<div class="alert alert-success">
            //Ação realizada com sucesso!
            //  </div>';
            echo "<script>
              Swal.fire({
      
                  icon: 'success',
                  title: 'Sucesso',
                  width: 'auto',
                  html: '<h3>Ação realizada com sucesso!</h3>',
                  showConfirmButton: false,
                  timer: 4000,
              })

              setTimeout(function(){
                 window.location='" . $pag_ret . "';
              }, 2000);
          </script>";
            break;
    }
}
