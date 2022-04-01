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
    <div class="container-completo">
                       
            <div  class="title-form">
                <h3><?php if(!isset($_REQUEST['id'])){ echo 'Consultar membros';} else{echo 'Membro nº '.$dadosModel->ident;} ?></h3>
                <a href="<?php  echo $pach?>home">
                    <img src="<?php echo $pach?>img/back.png" alt="">
                </a>
            </div>

            <div  class="title-form" style="margin-top: -2rem; margin-bottom: -1.5rem">
                <div>
                    <form class="form-busca" method="POST" action="<?php echo($pach)?>matrimonios/buscar&texto=<?php if(isset($_POST['btn-buscar'])){ echo $_POST['busca']; }?>">
                        <input type="text" class="txt-buscar" id="fetchval" value="<?php if(isset($_POST['btn-buscar'])) echo $_POST['busca']; ?>" name="busca" placeholder="Buscar...">                     
                        <button type="submit" name="btn-buscar"  class="btn-buscar"></button>
                    </form>                                  
                </div>
            </div>    
                <div class="tab-header">
                    <button class="btn-tab active" data-target-tab="#pessoais"><img src="<?php echo $pach?>img/user2.png" alt=""><span>Dados Pessoais</span> </button>
                    <button class="btn-tab" data-target-tab="#add"><img src="<?php echo $pach?>img/location.png" alt=""><span>Adicionais</span> </button>
                    <button class="btn-tab" data-target-tab="#memb"><img src="<?php echo $pach?>img/membrasia.png" alt=""><span>Membrasia</span> </button>
                    <button class="btn-tab" data-target-tab="#financ"><img src="<?php echo $pach?>img/finanças.png" alt=""><span>Finanças</span> </button>
                    <button class="btn-tab" data-target-tab="#foto"><img src="<?php echo $pach?>img/image1.png" alt=""><span>Carregar Foto</span> </button>
                </div>

                    <form action="<?php echo $pach?>membros/cadastrar" method="POST" enctype="multipart/form-data" class="form">

                        <div class="tab-body">

                            <div class="tab-content active" id="pessoais">
                        
                                <div class="user-details">    
                                

                                    <div class="input-box">
                                        <input type="hidden" name="id_mem" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->id_mem ?>">
                                        <span class="details">Nome</span>
                                        <input type="text" name="nome" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->nome ?>" placeholder="Ex: Pedro José" required>
                                    </div>

                                    <div class="input-box">
                                        <span class="details">Tipo</span>
                                        <select name="tipo" id="" class="dropdown">
                                            <option value="">Selecione</option>
                                            <option value="Local" <?php if(isset($_REQUEST['id'])) echo 'Local' == $dadosModel->tipo ? 'selected' : '' ?>>Local</option>
                                            <option value="Campo" <?php if(isset($_REQUEST['id'])) echo 'Campo' == $dadosModel->tipo ? 'selected' : '' ?>>Campo</option>                            
                                        </select>
                                    </div>

                                    <div class="input-box">
                                        <span class="details">Estado civil</span>
                                        <select name="esta_civil" id="" class="dropdown">
                                            <option value="">Selecione</option>
                                            <option value="Solteiro" <?php if(isset($_REQUEST['id'])) echo 'Solteiro' == $dadosModel->esta_civil ? 'selected' : '' ?>>Solteiro</option>
                                            <option value="Casado" <?php if(isset($_REQUEST['id'])) echo 'Casado' == $dadosModel->esta_civil ? 'selected' : '' ?>>Casado</option>                            
                                            <option value="Divorciado" <?php if(isset($_REQUEST['id'])) echo 'Divorciado' == $dadosModel->esta_civil ? 'selected' : '' ?>>Divorciado</option>
                                            <option value="Viúvo" <?php if(isset($_REQUEST['id'])) echo 'Viúvo' == $dadosModel->esta_civil ? 'selected' : '' ?>>Viúvo</option>                            
                                        </select>
                                    </div>

                                
                                    <div class="input-box">
                                        <span class="details">B.I nº</span>
                                        <input type="text" name="identidade" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->identidade ?>" placeholder="Nº de identidade" required>
                                    </div>

                                    <div class="input-box">
                                        <span class="details">Data de validade</span>
                                        <input type="date" name="data_val" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->data_val ?>" placeholder="Observação" required>
                                    </div>

                                    
                                    <div class="input-box">
                                        <span class="details">Gênero</span>
                                        <select name="genero" id="" class="dropdown">
                                            <option value="">Selecione</option>
                                            <option value="Masculino" <?php if(isset($_REQUEST['id'])) echo 'Masculino' == $dadosModel->genero ? 'selected' : '' ?>>Masculino</option>
                                            <option value="Feminino" <?php if(isset($_REQUEST['id'])) echo 'Feminino' == $dadosModel->genero ? 'selected' : '' ?>>Feminino</option>                            
                                        </select>
                                    </div>

                                

                                    <div class="input-box">
                                        <span class="details">Naturalidade</span>
                                        <input type="text" name="naturalidade" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->naturalidade ?>" placeholder="Ex: ">
                                    </div>


                                    <div class="input-box">
                                        <span class="details">Província</span>
                                        <input type="text" name="provincia" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->provincia ?>" placeholder="Ex: Uíge" >
                                    </div>

                                    <div class="input-box">
                                        <span class="details">Data de nascimento</span>
                                        <input type="date" name="data_nasc" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->data_nasc ?>" placeholder="Ex: 19/02/1990" >
                                    </div>                                                           
                                  
                                    <div class="input-box">
                                        <span class="details">Nome do pai</span>
                                        <input type="text" name="pai" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->pai ?>" placeholder="João Fernando" >
                                    </div>

                                    <div class="input-box">
                                        <span class="details">Nome da mãe</span>
                                        <input type="text" name="mae" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->mae ?>" placeholder="Ex: Maria José" >
                                    </div>

                                    
                                    <div class="input-box">
                                        <span class="details">Estado</span>
                                        <select name="estado" id="" class="dropdown">
                                            <option value="">Selecione</option>
                                            <option value="Activo" <?php if(isset($_REQUEST['id'])) echo 'Activo' == $dadosModel->estado ? 'selected' : '' ?>>Activo</option>                            
                                            <option value="Disciplina" <?php if(isset($_REQUEST['id'])) echo 'Disciplina' == $dadosModel->estado ? 'selected' : '' ?>>Disciplina</option>
                                            <option value="Transferido" <?php if(isset($_REQUEST['id'])) echo 'Transferido' == $dadosModel->estado ? 'selected' : '' ?>>Transferido</option>
                                        </select>
                                    </div>
                                                                                            
                                </div>  
                            </div> 


                            <div class="tab-content" id="add">
                                <div class="user-details">
                                    <div class="input-box">
                                        <span class="details">Residência</span>
                                        <input type="text" name="residencia" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->residencia ?>" placeholder="Ex: Bairro Popular Zona nº1" >
                                    </div>

                                    <div class="input-box">
                                        <span class="details">Ponto de referência</span>
                                        <input type="text" name="ponto_ref" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->ponto_ref ?>" placeholder="Ex: Posto de Médico" >
                                    </div>

                                    <div class="input-box">
                                        <span class="details">Grupo sanguínio</span>
                                        <input type="situacao" name="grupo_sang" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->grupo_sang ?>" placeholder="Ex: O+" >
                                    </div>

                                    <div class="input-box">
                                        <span class="details">Telefone</span>
                                        <input type="text" name="telefone" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->telefone ?>" placeholder="Ex: 937958473" >
                                    </div>

                                    <div class="input-box">
                                        <span class="details">Telefone de emergência</span>
                                        <input type="text" name="tel_emerg" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->tel_emerg ?>" placeholder="Ex: 994579374" >
                                    </div>

                                    <div class="input-box">
                                        <span class="details">Email</span>
                                        <input type="text" name="email" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->email ?>" placeholder="Ex: exemlo@gmail.com" >
                                    </div>  
                                    
                                   

                                </div>
                            </div>


                            <div class="tab-content" id="memb">
                                <div class="user-details">

                                <div class="input-box">
                                        <span class="details">Local</span>
                                        <select name="localidade" id="" class="dropdown">
                                            <option value="">Selecione</option>
                                            <option value= "Igreja local" <?php if(isset($_REQUEST['id'])) echo 'Igreja local' == $dadosModel->localidade ? 'selected' : '' ?> >Igreja local</option>
                                            <?php 
                                            foreach($this->Model->carregarCampos() as $row){?>          
                                                <option value="<?php echo $row->localidade; ?>"<?php  if(isset($_REQUEST['id'])) echo $row->localidade == $dadosModel
                                                ->localidade ? 'selected' :'' ?>>  <?php echo $row->localidade; ?></option> 

                                            <?php } ?>    
                                        </select>
                                    </div>

                                    <div class="input-box">
                                        <span class="details">Data de baptismo</span>
                                        <input type="date" name="data_bap" id="data_bat" onchange="" value="<?php if(isset($_REQUEST['id'])) echo  $data_bap ?>" placeholder="Ex: 12/04/2013" >
                                    </div>

                                    <div class="input-box">
                                        <span class="details">Ministro</span>
                                        <input type="text" name="ministro" value="<?php if(isset($_REQUEST['id'])) echo $ministro ?>" placeholder="Nome do ministro celebrante" >
                                    </div>

                                    <div class="input-box">
                                        <span class="details">Local de baptismo</span>
                                        <select name="local_bap" id="" class="dropdown">
                                            <option value="">Selecione</option>
                                            <option value= "Igreja local" <?php if(isset($_REQUEST['id'])) echo 'Igreja local' == $local_bap ? 'selected' : '' ?> >Igreja local</option>
                                            <?php 
                                            foreach($this->Model->carregarCampos() as $row){?>          
                                                <option value="<?php echo $row->localidade; ?>"<?php  if(isset($_REQUEST['id'])) 
                                                echo $row->localidade == $local_bap ? 'selected' :'' ?>>  <?php echo $row->localidade; ?></option> 
                                            <?php } ?>    
                                        </select>
                                    </div>

                                    <div class="input-box">
                                        <span class="details">tempo</span>
                                        <input type="text" name="tempo" id="tempo_bat" disabled value="<?php if(isset($_REQUEST['id'])) {echo $tempo;}else{echo '0';} ?>" placeholder="Ex: 2 anos" >
                                    </div>

                                    <div class="input-box">
                                        <span class="details">Estado</span>
                                        <select name="estado_memb" id="" class="dropdown">
                                            <option value="">Selecione</option>
                                            <option value="Comunhão" <?php if(isset($_REQUEST['id'])) echo 'Comunhão' == $dadosModel->estado_memb ? 'selected' : '' ?>>Comunhão</option>
                                            <option value="Disciplina" <?php if(isset($_REQUEST['id'])) echo 'Disciplina' == $dadosModel->estado_memb ? 'selected' : '' ?>>Disciplina</option>                            
                                        </select>
                                    </div>
              
                                </div>
                            </div>


                            <div class="tab-content" id="financ">
                                <div class="user-details">

                                    <div class="input-box">
                                        <span class="details">Profissão</span>
                                        <input type="text" name="profissao" value="<?php if(isset($_REQUEST['id'])) echo $profissao ?>" placeholder="Ex: Pedro José" >
                                    </div>

                                    <div class="input-box">
                                        <span class="details">Sector</span>
                                        <select name="sector" id="" class="dropdown">
                                            <option value="">Selecione</option>
                                            <option value="Público" <?php if(isset($_REQUEST['id'])) echo 'Público' == $sector ? 'selected' : '' ?>>Público</option>
                                            <option value="Privado" <?php if(isset($_REQUEST['id'])) echo 'Privado' == $sector ? 'selected' : '' ?>>Privado</option>                            
                                        </select>
                                    </div>

                                    <div class="input-box">
                                        <span class="details">Base salarial</span>
                                        <input type="text" name="salbas" value="<?php if(isset($_REQUEST['id'])) echo $salbas ?>" placeholder="Salária base" >
                                    </div>

                                    <div class="input-box">
                                        <span class="details">Dízimo</span>
                                        <input type="text" name="dizimo" value="<?php if(isset($_REQUEST['id'])) echo $dizimo ?>" placeholder="Valor do dízimo" >
                                    </div>

                                
                                </div>
                            </div>  
                            
                            <div class="tab-content" id="foto">
                                <div class="image-box">

                                    <div class="input-box">
                                        <img src="<?php echo($pach);?>img/image.png" alt="" width="200px" height="200px" class="imagem" style="background-color: #ccc;"> 
                                    </div>

                                    <div>                                   
                                        <input type="file" name="arquivo" id="imagem" onchange="previewImagem()" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->foto ?>">
                                    </div>

                                </div>
                            </div> 
                        </div>                           
                        <div class="button-form">
                            <input type="submit" value="Salvar" class="btn-form">
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
            
            function previewImagem(){
                var imagem = document.querySelector('input[name=arquivo]').files[0];
                var preview = document.querySelector('.imagem');

                var reader = new FileReader();

                reader.onloadend = function(){
                    preview.src = reader.result;
                }
                if(imagem){
                    reader.readAsDataURL(imagem);
                }else{
                    preview.src = "img/image.png";
                }

            }

            function anos_membrasia(){

                var data_bat = document.querySelector('#data_bat').innerHTML;
                var tempo = document.querySelector('#tempo_bat');



              

            }


        </script>
</body>
</html>