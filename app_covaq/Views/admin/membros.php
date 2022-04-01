<?php include 'config.php'; 

if(isset($_REQUEST['id'])){

    if(!empty($this->Model->carregarID_Membrasia($_REQUEST['id']))){

        $tipo_memb = $this->Model->carregarID_Membrasia($_REQUEST['id'])->tipo_memb;
        $data_bap = $this->Model->carregarID_Membrasia($_REQUEST['id'])->data_bap;
        //print_r($data_bap);exit;
        $ministro = $this->Model->carregarID_Membrasia($_REQUEST['id'])->ministro;
        $tempo = $this->Model->carregarID_Membrasia($_REQUEST['id'])->tempo;
        $local_bap = $this->Model->carregarID_Membrasia($_REQUEST['id'])->local_bap;
    }else{
        $data_bap = ''; $ministro = ''; $tempo = ''; $local_bap = '';  $tipo_memb ="";
    }

    if(!empty($this->Model->carregarID_Financas($_REQUEST['id'])) ){
    
        $profissao = $this->Model->carregarID_Financas($_REQUEST['id'])->profissao;
        $sector = $this->Model->carregarID_Financas($_REQUEST['id'])->sector;
        $ramo_activ = $this->Model->carregarID_Financas($_REQUEST['id'])->ramo_activ;
        $dizimo = $this->Model->carregarID_Financas($_REQUEST['id'])->dizimo;
    }else{
        $profissao = ''; $sector = ''; $ramo_activ = ''; $dizimo = '';
    }

    if(!empty($this->Model->carregarID_Endereco($_REQUEST['id'])) ){
    
        $bairro = $this->Model->carregarID_Endereco($_REQUEST['id'])->bairro;
        $rua = $this->Model->carregarID_Endereco($_REQUEST['id'])->rua;
        $zona = $this->Model->carregarID_Endereco($_REQUEST['id'])->zona;
        $quarteirao = $this->Model->carregarID_Endereco($_REQUEST['id'])->quarteirao;
        $casa = $this->Model->carregarID_Endereco($_REQUEST['id'])->casa;
        $ponto_ref = $this->Model->carregarID_Endereco($_REQUEST['id'])->ponto_ref;
    }else{
        $bairro=''; $rua=''; $zona=''; $quarteirao=''; $casa=''; $ponto_ref='';
    }

    if(!empty($this->Model->carregarID_Detalhes($_REQUEST['id'])) ){
    
        $agregado = $this->Model->carregarID_Detalhes($_REQUEST['id'])->agregado;
        $num_filhos = $this->Model->carregarID_Detalhes($_REQUEST['id'])->num_filhos;
        $estatus = $this->Model->carregarID_Detalhes($_REQUEST['id'])->estatus;
        $conjuge = $this->Model->carregarID_Detalhes($_REQUEST['id'])->conjuge;
    }else{
        $agregado = ''; $num_filhos = ''; $estatus = ''; $conjuge = '';
    }

    if(!empty($this->Model->carregarID_Ministerio($_REQUEST['id'])) ){
    
        $id_min = $this->Model->carregarID_Ministerio($_REQUEST['id'])[0]->id_min;
        $minist = $this->Model->carregarID_Ministerio($_REQUEST['id'])[0]->ministerio;
        $funcao = $this->Model->carregarID_Ministerio($_REQUEST['id'])[0]->funcao;

        if(isset( $this->Model->carregarID_Ministerio($_REQUEST['id'])[1])){
            $id_min2 = $this->Model->carregarID_Ministerio($_REQUEST['id'])[1]->id_min;
            $minist2 = $this->Model->carregarID_Ministerio($_REQUEST['id'])[1]->ministerio;
            $funcao2 = $this->Model->carregarID_Ministerio($_REQUEST['id'])[1]->funcao;
        }

        if(isset( $this->Model->carregarID_Ministerio($_REQUEST['id'])[2])){
            $id_min3 = $this->Model->carregarID_Ministerio($_REQUEST['id'])[2]->id_min;
            $minist3 = $this->Model->carregarID_Ministerio($_REQUEST['id'])[2]->ministerio;
            $funcao3 = $this->Model->carregarID_Ministerio($_REQUEST['id'])[2]->funcao;
        }

    }else{
        $id_min = ''; $funcao = ''; $minist='';
        $id_min3=''; $minist3='';   $minist3='';
        $id_min2=''; $minist2='';   $funcao2='';
    }

    if(!empty($this->Model->carregarID_Discipulador($_REQUEST['id'])) ){
    
        $estado = $this->Model->carregarID_Discipulador($_REQUEST['id'])->estado;
        if(isset($estado)){
            $discipulado = "Discipulador";
        }
        
    }else{
        $situacao = '';
    }

    if(!empty($this->Model->carregarID_Missionario($_REQUEST['id'])) ){
    
        $id_camp = $this->Model->carregarID_Missionario($_REQUEST['id'])->id_camp;

    }else{
        $id_camp = '';
    }

    if(!empty($this->Model->carregarID_Formacao($_REQUEST['id'])) ){
    
        $tipo = $this->Model->carregarID_Formacao($_REQUEST['id'])[0]->tipo;
        $nivel = $this->Model->carregarID_Formacao($_REQUEST['id'])[0]->nivel;
        $instituicao = $this->Model->carregarID_Formacao($_REQUEST['id'])[0]->instituicao;
        $especialidade = $this->Model->carregarID_Formacao($_REQUEST['id'])[0]->especialidade;

        if(isset($this->Model->carregarID_Formacao($_REQUEST['id'])[1])){
            $tipo = $this->Model->carregarID_Formacao($_REQUEST['id'])[1]->tipo;
            $nivel_teo = $this->Model->carregarID_Formacao($_REQUEST['id'])[1]->nivel;
            $instituicao_teo = $this->Model->carregarID_Formacao($_REQUEST['id'])[1]->instituicao;
            $curso_teo = $this->Model->carregarID_Formacao($_REQUEST['id'])[1]->especialidade;
        }
        
    }else{
        $tipo = ''; $nivel = ''; $instituicao = ''; $especialidade = '';
        $nivel_teo = ''; $instituicao_teo = ''; $curso_teo = '';
    }

    if(!empty($this->Model->carregarID_Campos($_REQUEST['id'])) ){
    
        $id_camp = $this->Model->carregarID_Campos($_REQUEST['id'])[0]->id_camp;

    }else{
        $id_camp = '';
    }

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SGI-Covaq</title>
    <link rel="stylesheet" href="<?php echo($pach)?>style/style.css">
    <link rel="stylesheet" href="<?php echo($pach)?>style/main_modal.css">
    <link rel="stylesheet" href="<?php echo($pach)?>style/modal.css">
    <script src="javascript/js_modal.js"></script>
    <script src="javascript/jquery/jquery.min.js"></script>
    <script src="javascript/filter.js"></script>


</head>
<body>

        <main id="container">
        
                <?php 
                     
                        if(!empty($dadosModel[0]) ){
                ?>
                            <div class="msg" id="mensagem" style="padding: 6px; background-color:red; color:  #fff; font-size:small">                       
                                <img src="<?php echo $pach?>img/error.png" alt="">&nbsp;<?php echo $dadosModel[0];?>
                            </div>
                <?php }
                        else if(!empty($dadosModel[1])){
                ?>
                            <div class="msg" id="mensagem" style="padding: 6px; background-color:green; color:  #fff; font-size:small">                       
                                <img src="<?php echo $pach?>img/save.png" alt="">&nbsp;<?php echo 'Cadastro efectuado com sucesso !';?>
                            </div>
                <?php  } 
                        else if(!empty($dadosModel[2])){ ?>
                            <div id="mensagem" style="padding: 6px; background-color: green; color: #fff; font-size:small">                       
                                <img src="<?php echo $pach?>img/save.png" alt="">&nbsp;<?php echo 'Alteração efectuada com sucesso !'; ?>
                            </div>  
               <?php } ?>
            
            <div class="recent-grid-page">
                <div class="projects">
                    <div class="card">
                        <div class="card-header">
                            <h3>Registos de membros</h3> 
                            <button onclick="javascript: location.href='<?php echo($pach)?>admin';">Voltar</button>                                       
                        </div>
                            <div class="card-body">                                
                                <div class="card-body-header">
                                    <a href="<?php echo($pach)?>membros/cad_membros" class="btn-novo">Registar membro</a>
                                    
                                    <table class="no-mobile">
                                        <td col-index = 3>Membrasia
                                            <select class="table-filter" id="dropdown-busca"  onchange="filter_rows()">
                                                <option value="all">Todos</option>
                                            </select>
                                        </td>
                                    </table>

                                    <table class="no-mobile">
                                        <td col-index = 5>Gênero
                                            <select class="table-filter" id="dropdown-busca"  onchange="filter_rows()">
                                                <option value="all">Todos</option>
                                            </select>
                                        </td>
                                    </table>

                                    <table class="no-mobile">
                                        <td col-index = 9>Estado
                                            <select class="table-filter" id="dropdown-busca"  onchange="filter_rows()">
                                                <option value="all">Todos</option>
                                            </select>
                                        </td>
                                    </table>

                                    <div class="card-body-busca">
                                        <form class="form-busca" method="POST" action="<?php echo($pach)?>membros/buscar">
                                            <input type="text" class="txt-buscar" id="buscar" value="<?php if(isset($_POST['btn-buscar'])) echo $_POST['texto']; ?>" name="texto" placeholder="Buscar...">                     
                                            <button type="submit" name="btn-buscar"  class="btn-buscar"></button>
                                        </form>                                  
                                    </div>
                                 </div>
                                 <div class="card-body-header">                                                             
                                    <small>
                                        <?php 
                                        if(isset($_POST['texto'])){ 
                                            echo 'Registos encontrados: '.count($this->dados2);
                                            }else{ echo 'Total de registos: '.count($this->dados2);
                                            }
                                        
                                        ?>
                                    </small>
                                    <a href="" class="" id="imprimir">Imprimir</a>
                                    <!--<button class="btn-novo" id="imprimir">Imprimir</button>-->
                                </div>

                                <div class="table-responsive">
                                    <table width="99%" class="table-page" id="table-page">
                                        <thead class="thead">
                                            <tr>
                                                <td>Código</td>
                                                <td>Nome completo</td>
                                                <td col-index= 3>Membrasia</td>
                                                <td>B.I Nº</td>
                                                <td col-index= 5>Gênero</td>
                                                <td col-index= 6>Est. Civil</td>                                               
                                                <td>Telefone</td>                                                                                             
                                                <td>G.S</td>                                                                                             
                                                <td col-index= 9>Situação</td>
                                                <td>Foto</td>
                                                <td></td>
                                            </tr>
                                        </thead>
                                        <tbody id=tbody class="tbody">

                                        <?php   
                                        $ml=0; $mc=0;                                                  
                                         if(!isset($_POST['texto'])){
                                             
                                                foreach($this->dados2 as $row){ 
                                                    if($row->tipo=='Local'){ $ml ++; } else { $mc++; }
                                                     ?>                                                
                                                    <tr>
                                                        <td  data-label="Codigo"> <?php echo $row->ident; ?></td>
                                                        <td  data-label="Nome"> <?php echo $row->nome; ?> </td> 
                                                        <td  data-label="Tipo"> <?php echo $row->tipo; ?> </td>     
                                                        <td  data-label="B.I nº"> <?php echo $row->identidade; ?> </td>                                                      
                                                        <td  data-label="Género"> <?php echo $row->genero; ?> </td>   
                                                        <td  data-label="Est_civil"> <?php echo $row->esta_civil; ?></td> 
                                                        <td  data-label="Telefone"> <?php echo $row->telefone; ?></td>                                                           
                                                        <td  data-label="G. Sanguínio"> <?php echo $row->grupo_sang; ?> </td>                                                       
                                                        <td  data-label="Estado"> <?php echo $row->estado; ?> </td>   
                                                        <td> <a href="<?php echo $pach?>membros/infor&id=<?php echo $row->id_mem; ?>#bg">
                                                            <?php if(!empty($row->foto)){?>
                                                                <img style="border-radius: 50%;" src="<?php echo $pach. 'img/fotos/'.$row->foto;?>" alt="" width="28px" height="28px"> 
                                                            <?php }else{ ?>
                                                                <img style="border-radius: 50%;" src="<?php echo $pach?>img/image.png" alt="" width="28px" height="28px">
                                                            <?php } ?>
                                                            </a>
                                                        </td>  
                                                        <td>  
                                                            <a href="<?php echo $pach?>membros/infor&id=<?php echo $row->id_mem; ?>#bg"> 
                                                                <img style="border-radius: 50%;" src="<?php echo $pach?>img/ver.png" alt="" width="24px" height="26px">
                                                            </a> &nbsp;
                                                            <a href="<?php echo $pach?>membros/novo&id=<?php echo $row->id_mem; ?>"> 
                                                                <img style="border-radius: 50%;" src="<?php echo $pach?>img/editarr.png" alt="" width="24px" height="24px">
                                                            </a>
                                                            <a href="Javascript: if(confirm('Tem certeza que deseja deletar este registo ?')) location.href='<?php echo $pach?>membros/eliminar&cod=<?php echo $row->id_mem; ?>'">
                                                                <img style="border-radius: 50%;" src="<?php echo $pach?>img/delete.png" alt="" width="24px" height="24px">
                                                            </a>                                                            
                                                        </td>
                                                    </tr>
                                                    
                                                <?php } 
                                                }else{                                                    
                                                foreach($this->dados2 as $row){
                                                    if($row->tipo=='Local'){ $ml ++; } else { $mc++; }
                                                    ?>
                                                    <tr>
                                                        <td> <?php echo $row->ident; ?></td>
                                                        <td> <?php echo $row->nome; ?> </td> 
                                                        <td> <?php echo $row->tipo; ?> </td>     
                                                        <td> <?php echo $row->identidade; ?> </td>                                                      
                                                        <td> <?php echo $row->genero; ?> </td>   
                                                        <td> <?php echo $row->esta_civil; ?></td> 
                                                        <td> <?php echo $row->telefone; ?></td>                                                          
                                                        <td> <?php echo $row->grupo_sang; ?> </td>                                                        
                                                        <td> <?php echo $row->estado; ?> </td>   
                                                        <td> <a href="<?php echo $pach?>membros/infor&id=<?php echo $row->id_mem; ?>#bg">
                                                            <?php if(!empty($row->foto)){?>
                                                                <img style="border-radius: 50%; border-radius: 50%;" src="<?php echo $pach. 'img/fotos/'.$row->foto;?>" alt="" width="28px" height="28px"> 
                                                            <?php } ?>
                                                            </a>
                                                        </td>  
                                                        <td> 
                                                            <a href="<?php echo $pach?>membros/infor&id=<?php echo $row->id_mem; ?>#bg"> 
                                                                <img style="border-radius: 50%;" src="<?php echo $pach?>img/ver.png" alt="" width="24px" height="26px">
                                                            </a> &nbsp;
                                                            <a href="<?php echo $pach?>membros/novo&id=<?php echo $row->id_mem; ?>"> 
                                                                <img style="border-radius: 50%;" src="<?php echo $pach?>img/editarr.png" alt="" width="24px" height="24px">
                                                            </a>
                                                            <a href="" onclick="Javascript: if(confirm('Tem certeza que deseja deletar este registo ?')) location.href='<?php echo $pach?>membros/eliminar&cod=<?php echo $row->id_mem; ?>'">
                                                                <img style="border-radius: 50%;" src="<?php echo $pach?>img/delete.png" alt="" width="24px" height="24px">
                                                            </a> 
                                                        </td>
                                                    </tr>
                                                <?php } 
                                         }?>  
                                                                                                              
                                        </tbody>                                       
                                    </table> 
                                </div>
                                                              
                            </div>
                        </div>
                     </div>

                </div>
            </div>

                
            <div class="container" style="background-color: #f1f5f9;">
                <div class="container-header">
                    <div class="title">Informações preliminares do membro</div>
                    <a href="<?php echo($pach)?>membros" id="close">X</a>
                </div> 
                <div>
                    <h3  style="display: block; margin-bottom:10px; margin-left:215px;"><?php if(isset($_REQUEST['id'])) echo ' '.$dadosModel[3]->nome; ?></h3> 
                </div>  
                <div class="container-perfil"> 

                    <img style="border-radius: 50%; margin-right:20px;" src="<?php  if(isset($_REQUEST['id'])) echo $pach. 'img/fotos/'. $dadosModel[3]->foto;?>" alt="" width="200" height="230">                                                                          
                    
                    <div class="user-details">
                        
                        <div>
                            <span class="details">Membro nº:</span>
                            <span><?php if(isset($_REQUEST['id'])) echo ' '.$dadosModel[3]->ident; ?></span><br>

                            <span class="details-membros"> Estado Civil:</span>
                            <span><?php if(isset($_REQUEST['id'])) echo ' '.$dadosModel[3]->esta_civil; ?></span><br>

                            <span class="details-membros">Ministério:</span>
                            <span><?php if(isset($_REQUEST['id'])) echo ' '.$minist; ?></span><br>

                            <span class="details-membros">Telefone:</span>
                            <span><?php if(isset($_REQUEST['id'])) echo ' '.$dadosModel[3]->telefone; ?></span><br>

                            <span class="details-membros">Profissão:</span>
                            <span><?php if(isset($_REQUEST['id'])) echo ' '.$profissao; ?></span><br>

                            <span class="details-membros">Membro por:</span>
                            <span><?php if(isset($_REQUEST['id'])) echo ' '.$tipo_memb; ?></span><br>
              
                        </div>
                    </div>
                    <div class="user-details" style="margin-left: 20px;">
                        <div>
                            <span class="details">Estatus:</span>
                            <span><?php if(isset($_REQUEST['id'])) echo ' '.$dadosModel[3]->estado; ?></span><br>

                            <span class="details-membros">Gênero:</span>
                            <span><?php if(isset($_REQUEST['id'])) echo ' '.$dadosModel[3]->genero; ?></span><br>

                            <span class="details-membros">Função:</span>
                            <span><?php if(isset($_REQUEST['id'])) echo ' '.$funcao; ?></span><br>

                            <span class="details-membros">G. Sanguínio:</span>
                            <span><?php if(isset($_REQUEST['id'])) echo ' '.$dadosModel[3]->grupo_sang; ?></span><br>

                            <span class="details-membros">Sector:</span>
                            <span><?php if(isset($_REQUEST['id'])) echo ' '.$sector; ?></span><br>

                            <span class="details-membros">Data de Bap:</span>
                            <span><?php if(isset($_REQUEST['id'])) echo ' '.$data_bap; ?></span><br>
              
                        </div>                       
                    </div>
                </div>
                <span style="display: block; text-align: right;"><?php if(isset($_REQUEST['id'])) echo 'Último Endereço: '.$bairro.', Zona nº '.$zona.', Quarteirão nº '.$quarteirao.', Rua '.$rua.', Casa nº '.$casa; ?></span><br>    

            </div>
            
        </main>
        <script>
            window.onload = () => {
                console.log(document.querySelector("#table-page > tbody > tr:nth-child(1) > td:nth-child(3)").innerHTML)
            };
        getUniqueValuesFromColumn();
        </script>

        <script>
            /*
            $('#imprimir').click( function (){
                $('#container').printThis({

                    debug: false,
                    importCSS: true,
                    importStyle: false,
                    printContainer: true,
                    loadCSS: "file: ///C:/wamp64/www/app_covaq/style",
                    pageTitle: "Lista de membros",
                    removeInline: false,
                    printDelay: 333,
                    header: "<h1>Meu documento</h1>",
                    footer: "null",
                    formValues: true,
                    canvas: false,
                    base: false,
                    doctypeString: '<!DOCTYPE html>',
                    removeScripts: false,
                    copyTagClasses: false,


                });
            })
*/
        </script>
        <script>
            $('#imprimir').click( function (){
                alert('OKKK')
                var printme= document.getElementById('table-page');
                var wme = window.open("", "", "width=900 heigth=700");
                wme.document.write(printme.outerHTML);
                wme.document.close();
                wme.focus();
                wme.print();
                wme.close();
            })
        </script>
        
        <script src="text/javascript">

        

            function buscarNome(nome){
                $.ajax({
                    url: "membros",
                    method: "POST",
                    data: {nome:nome},
                    success: function(data){
                        $('.table-responsive').html(data);
                    }
                });
            }

            $(document).ready(function(){

                buscarNome();

                $('#buscar').keyup(function(){
                    var nome = $(this).val();
                    //alert(nome)
                    if(nome =! ''){
                        buscarNome(nome);
                    }
                    else{
                        buscarNome();
                    }
                });

            });

        </script>

</body>
</html>