<?php include 'config.php'; 

if(isset($_REQUEST['id'])){

    if(!empty($this->Model->carregarID_Membrasia($_REQUEST['id']))){

        $data_bap = $this->Model->carregarID_Membrasia($_REQUEST['id'])->data_bap;
        //print_r($data_bap);exit;
        $ministro = $this->Model->carregarID_Membrasia($_REQUEST['id'])->ministro;
        $tempo = $this->Model->carregarID_Membrasia($_REQUEST['id'])->tempo;
        $local_bap = $this->Model->carregarID_Membrasia($_REQUEST['id'])->local_bap;
    }else{
        $data_bap = ''; $ministro = ''; $tempo = ''; $local_bap = '';  
    }

    if(!empty($this->Model->carregarID_Financas($_REQUEST['id'])) ){
    
        $profissao = $this->Model->carregarID_Financas($_REQUEST['id'])->profissao;
        $sector = $this->Model->carregarID_Financas($_REQUEST['id'])->sector;
        $salbas = $this->Model->carregarID_Financas($_REQUEST['id'])->salbase;
        $dizimo = $this->Model->carregarID_Financas($_REQUEST['id'])->dizimo;
    }else{
        $profissao = ''; $sector = ''; $salbas = ''; $dizimo = '';
    }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo($pach)?>style/style.css">
    <link rel="stylesheet" href="<?php echo($pach)?>style/main_modal.css">
    <link rel="stylesheet" href="<?php echo($pach)?>style/tab-estilo.css">
</head>
<body>

    <main>

            <?php                    
                if(isset($_POST['salvar'])){
                    ?>
                    <div style="padding: 5px">
                    <?php if(!empty($dadosModel)){
                        echo $dadosModel;
                    ?>
                    </div>
                    <?php  }   
                }
                        
                ?>
            <div class="container-completo">
               
                <div  class="title-form">
                    <h3><?php if(!isset($_REQUEST['id'])){ echo 'Registar baptismo';} else{echo 'Data: '.$dadosModel->data_reg;} ?></h3>
                    <button class="btn-novo" onclick="
                    javascript: location.href='<?php echo $pach?>baptismo'">
                    Voltar</button> 
                </div>                   
                <form action="<?php echo $pach?>baptismo/cadastrar" method="POST" enctype="multipart/form-data" class="form">

                    <div class="user-details">    
                                
                                <div class="input-box">
                                    <span class="details">Local</span>
                                    <select name="localidade" id="" class="dropdown">
                                        <option value="1">Selecione</option>
                                        <option value= "Igreja local" <?php if(isset($_REQUEST['id'])) echo 'Igreja local' == $dadosModel->localidade ? 'selected' : '' ?> >Igreja local</option>
                                        <?php 
                                        foreach($this->Model->carregarCampos() as $row){?>          
                                            <option value="<?php echo $row->localidade; ?>"<?php  if(isset($_REQUEST['id'])) echo $row->localidade == $dadosModel
                                            ->localidade ? 'selected' :'' ?>>  <?php echo $row->localidade; ?></option> 

                                        <?php } ?>    
                                    </select>
                                </div>

                                <div class="input-box">
                                    <span class="details">Data de realização</span>
                                    <input type="hidden" name="id_bap" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->id_bap; ?>">
                                    <input type="date" name="data_reg" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->data_reg; ?>"  require>
                                </div>

                                <div class="input-box">
                                    <span class="details">Pastor celebrante</span>
                                    <input type="text" name="pastor" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->pastor; ?>"  require>
                                </div>

                                <div class="input-box">
                                    <span class="details">Nº de condidatos</span>
                                    <input type="text" name="total" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->total; ?>"  require>
                                </div>                                                                                           
                             
                    </div>                           
                    <div class="button-form">
                        <input type="submit" value="Salvar" name="salvar" class="btn-form">
                    </div>                                    
                </form>
                        
            </div>
        </main>

        <script>
            const btns = document.querySelectorAll(".btn-tab");

            btns.forEach((btn) => {
                btn.addEventListener('click', () => {

                    btns.forEach((btn) => btn.classList.remove("active"));

                    btn.classList.add("active");
                    const tabContents = document.querySelectorAll('.tab-content')
                    tabContents.forEach((tabContents) => {
                        tabContents.className = tabContents.className.replace("active", "");
                    });

                    document.querySelector(btn.dataset.targetTab).classList.add("active");
                });
            });
            

            function anos_membrasia(){

                var data_bat = document.querySelector('#data_bat').innerHTML;
                var tempo = document.querySelector('#tempo_bat');

            }
            function habilitarCampos(){

                const campo1 = document.querySelector("#funcao");
                const campo2 = document.querySelector("#outra_func");

                const tipo_memb = document.querySelector("#tipo_memb");
                const prov = document.querySelector("#proveniencia");
                

                if(campo1.value == "Outra"){

                    campo2.disabled = false;
                }
                else{
                    campo2.disabled = true;
                }

                if(tipo_memb.value == "Transferência"){

                    prov.disabled = false;
                }
                else{
                    prov.disabled = true;
                }
                

            }


        </script>
</body>
</html>