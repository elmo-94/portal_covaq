<?php
    include("fpdf/fpdf.php");
    include("Model/conexao.php");


    $sql="select * from dizimos order by id_diz desc";
    $consulta = $mysqli->query($sql);// $consulta->fetch_array();//$mysqli->query($sql) or die ($mysqli->error);

    $disimo = $consulta->fetch_array();

    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(190,10,utf8_decode('Relatório de Dizimos'),0,0,"C");
    $pdf->Ln(15);

    $pdf->SetFont('Arial','I',10);
    $pdf->Cell(50,7,"Membro",1,0,"C");
    $pdf->Cell(40,7,"Mês",1,0,"C");
    $pdf->Cell(40,7,"Semana",1,0,"C");
    $pdf->Cell(40,7,"Valor",1,0,"C");
    $pdf->Ln();

    while($row = $consulta->fetch_array()){
        $pdf->Cell(50,7,utf8_decode($row["membro"]),1,0,"C");
        $pdf->Cell(40,7,$row["mes"],1,0,"C");
        $pdf->Cell(40,7,$row["semana"],1,0,"C");
        $pdf->Cell(40,7,$row["valor"],1,0,"C");
        $pdf->Ln();
    }
    
    $pdf->Output();

?>