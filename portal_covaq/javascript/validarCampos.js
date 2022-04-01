
function validarCampos(){
    
    if(document.frmCad_membros.nome.value == ""){
        alert("Preencha o nome !");
        document.frmCad_membros.nome.focus();
        return false;
    }

    if(document.frmCad_membros.ident.value == ""){
        alert("Preencha o nº do B.I !");
        document.frmCad_membros.nome.focus();
        return false;
    }

    if(document.frmCad_membros.data_val.value == ""){
        alert("Preencha o data de validade");
        document.frmCad_membros.nome.focus();
        return false;
    }
}