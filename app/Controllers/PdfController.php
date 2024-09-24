<?php 
namespace App\Controllers;


use App\Models\ISolComprasModel;
use App\Models\SolCompraModel;
use CodeIgniter\Controller;
use App\Libraries\Pdf;

class PdfController extends Controller
{
    private $ipedmodel;
    private $pedmodel;
    

    public function __construct()
    {   
       $this->ipedmodel = new ISolComprasModel();
       $this->pedmodel = new SolCompraModel();
    }

   // public function index($codped) 
	// {

    //    $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
    //    $pdf->SetTitle('Pdf Example');
    //    $pdf->SetHeaderMargin(30);
    //    $pdf->SetTopMargin(20);
    //    $pdf->setFooterMargin(20);
    //    $pdf->SetAutoPageBreak(true);
    //    $pdf->SetAuthor('Author');
    //    $pdf->SetDisplayMode('real', 'default');
    //    $pdf->Write(5, 'CodeIgniter TCPDF Integration');
    //    $pdf->Output('pdfexample.pdf', 'I');
    // }
    function htmlToPDF($numped){
        $ped = $this->pedmodel->getRow($numped);
        $iped = $this->ipedmodel->getRow($numped);  
       
        $res['res'] = $ped;
        $res['results']     = $iped;

        $dompdf = new \Dompdf\Dompdf(); 

        $dompdf->loadHtml(view('generate_pdf',$res));
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->set_option('defaultMediaType', 'all');
        $dompdf->set_option('isFontSubsettingEnabled', true);
        $dompdf->set_option('isPhpEnabled', true);
        $dompdf->set_option('isRemoteEnabled', true);
        $dompdf->render();
        $dompdf->stream();
    }

    function htmlToPDF1($numped){
        $ped = $this->pedmodel->getRow($numped);
        $iped = $this->ipedmodel->getRow($numped);  
       
        $res['res'] = $ped;
        $res['results']     = $iped;

        $dompdf = new \Dompdf\Dompdf(); 

        $dompdf->loadHtml(view('gerar_pdf_final',$res));
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->set_option('defaultMediaType', 'all');
        $dompdf->set_option('isFontSubsettingEnabled', true);
        $dompdf->set_option('isPhpEnabled', true);
        $dompdf->set_option('isRemoteEnabled', true);
        $dompdf->render();
        $dompdf->stream();
    }
}