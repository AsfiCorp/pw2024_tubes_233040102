<!-- require_once 'pdf_report/fpdf.php'; -->
<?php
// ob_start();
require_once 'pdf_report/fpdf.php';
require 'config/database.php';

$query="SELECT category_id, title, author_id FROM posts ORDER BY date_time DESC" ;
$posts=mysqli_query($connection,$query);

ob_end_clean(); //    the buffer and never prints or returns anything.
ob_start(); // it starts buffering

// Colored table
function FancyTable($header, $data, $pdf)
{
    // Colors, line width and bold font
    $pdf->SetFillColor(255,0,0);
    $pdf->SetTextColor(255);
    $pdf->SetDrawColor(128,0,0);
    $pdf->SetLineWidth(.3);
    $pdf->SetFont('','B');
    // Header
    $w = array(22, 150, 20);
    for($i=0;$i<count($header);$i++)
        $pdf->Cell($w[$i],7,$header[$i],1,0,'C',true);
    $pdf->Ln();
    // Color and font restoration
    $pdf->SetFillColor(224,235,255);
    $pdf->SetTextColor(0);
    $pdf->SetFont('');
    // Data
    $fill = false;
    
    // while ($post = mysqli_fetch_assoc($posts)) {
        
    // }
    // echo "<script>console.log('Debug Objects: " . mysqli_num_rows($row) . "' );</script>";
    while($post = mysqli_fetch_assoc($data))
    {
        $pdf->Cell($w[0],6,$post['category_id'],'LR',0,'L',$fill);
        $pdf->Cell($w[1],6,$post['title'],'LR',0,'L',$fill);
        $pdf->Cell($w[2],6,$post['author_id'],'LR',0,'R',$fill);
        $pdf->Ln();
        $fill = !$fill;
    }
    // Closing line
    $pdf->Cell(array_sum($w),0,'','T');
}



$pdf = new FPDF();
// Column headings
$header = array('Kategori', 'Title', 'Author');
// Data loading

// $header = array($row['title'], 'Capital', 'Area (sq km)');
$pdf->SetFont('Arial','',14);
$pdf->AddPage();
FancyTable($header,$posts,$pdf);
$pdf->Output();
ob_end_flush(); 
?>