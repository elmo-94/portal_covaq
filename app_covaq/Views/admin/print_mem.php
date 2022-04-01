<?php
    include("fpdf/fpdf.php");
    //include("app_covaq/Model/admin/membrosModel.php");


    //$sql="select * from dizimos order by id_diz desc";
    $consulta=$this->dados2;// as $row //$this->Model->listar();//$mysqli->query($sql) or die ($mysqli->error);

    //print_r($consulta);exit;

    //$disimo = $consulta->fetch_array();

    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(190,10,utf8_decode('Relatório de Dizimos'),0,0,"C");
    $pdf->Ln(15);

    $pdf->SetFont('Arial','I',10);

    $pdf->Cell(50,7,"Código",1,0,"C");
    $pdf->Cell(40,7,"Nome completo",1,0,"C");
    $pdf->Cell(40,7,"Tipo",1,0,"C");
    $pdf->Cell(40,7,"Gênero",1,0,"C");
    $pdf->Ln();

    foreach($consulta as $row){ 

        $pdf->Cell(50,7,($row->ident),1,0,"C");
        $pdf->Cell(40,7,($row->nome),1,0,"C");
        $pdf->Cell(40,7,($row->tipo),1,0,"C");
        $pdf->Cell(40,7,($row->genero),1,0,"C");
        $pdf->Ln();
    }
    
    $pdf->Output();

?>