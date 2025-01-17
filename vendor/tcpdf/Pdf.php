<?php 
require  ROOT . DS . 'vendor' . DS . 'tcpdf'. DS .'tcpdf.php';
class Pdf extends TCPDF
{
    function __construct()
    {
        parent::__construct();
        mb_internal_encoding('UTF-8');
    }
    public function Header() {
        
        // logo debe estar en webroot/img
        $image_file = WWW_ROOT.'img'.DS.'librarylogo.png';
        //echo $image_file;
        $this->Image($image_file, 15, 2, 20, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('helvetica', 'B', 11);
        // Title
        $this->Cell(0, 5, 'SISTEMA NACIONAL ACME NADAREMOS -DORIS-', 0, false, 'C', 0, '', 0, false, 'M', 'M');
        $this->SetFont('helvetica', 'I', 10);
        $this->Ln();//Salto de linea
        $this->Cell(0, 5, 'Barranquilla - Atlantico', 0, false, 'C', 0, '', 0, false, 'M', 'M');
        $this->Ln();//Salto de linea
        $this->Cell(0, 5, 'Tel: (+57)00232154', 0, false, 'C', 0, '', 0, false, 'M', 'M');
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $user='sjimenez';
        $fecha=date('d-m-Y H:i');
        $texto='Fecha de impresión:'.$fecha.' impreso por '.$user;
        $this->Cell(0, 10, $texto.' Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }

}//end class
/* application/libraries/Pdf.php */
?>