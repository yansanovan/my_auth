<?php
use Dompdf\Dompdf;
Class Pdf 
{

	protected $ci;
	function __construct()
	{
		$this->ci =& get_instance();
	}
	function generate($view, $data = array())
	{
		// instantiate and use the dompdf class

		$dompdf = new Dompdf();
		$html = $this->ci->load->view($view, $data, TRUE);

		$dompdf->loadHtml($html);
		$dompdf->setPaper('F4', 'portrait');
		$dompdf->render();
		$dompdf->stream('laporan',  array('Attachment' => FALSE ));
		exit(0);
	}                           
}