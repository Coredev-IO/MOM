<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */


	public function index()
	{
		$this->load->helper('url');

		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library("email");

		//cargamos la libreria email de ci
		$this->load->library("email");
		$this->load->helper('url');
		$this->load->view('home');
		//configuracion para gmail
		$configGmail = array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.gmail.com',
			'smtp_port' => 465,
			'smtp_user' => 'octavio150@gmail.com',
			'smtp_pass' => '22120422150@150@',
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'newline' => "\r\n"
		);


		$this->form_validation->set_rules('nombre', 'nombre', 'required|max_length[1000]');
		$this->form_validation->set_rules('tel', 'tel', 'required');
		$this->form_validation->set_rules('mail', 'mail', 'required|valid_email|max_length[300]');
		$this->form_validation->set_rules('asunto', 'asunto', 'required|max_length[1000]');
		$this->form_validation->set_rules('mensaje', 'mensaje', 'required|max_length[4000]');



		if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{
			// redirect('welcome');
		}
		else // passed validation proceed to post success logic
		{
			// build array for the model


			$nombre = set_value('nombre');
			$mail = set_value('mail');
			$tel = set_value('tel');
			$asunto = set_value('asunto');
			$mensaje = set_value('mensaje');


			$this->email->initialize($configGmail);

			$this->email->from('Contacto MOM');
			$this->email->to($mail);
			$this->email->subject('CONTACTO MOM: '.$asunto);
			$this->email->message('<b>Gracias por tu interés en MOM. En breve un representante se pondrá en contacto contigo.</b><br><p><hr></p><b>Nombre:</b> '.$nombre.'<br><b>Correo:</b> '.$mail.'<br><b>Telefono:</b> '.$tel.'<br><b>Asusnto:</b> '.$asunto.'<br><b>Mensaje:</b> '.$mensaje);
			$this->email->send();

			//
			// $this->email->initialize($configGmail);
			//
			// $this->email->from('Contacto Panase');
			// $this->email->to("panase.contacto@gmail.com");
			// $this->email->subject('CONTACTO MON: '.$asunto);
			// $this->email->message('<b>Nuevo correo de contacto.</b><br><p><hr></p><b>Nombre:</b> '.$nombre.'<br><b>Correo:</b> '.$mail.'<br><b>Telefono:</b> '.$tel.'<br><b>Asusnto:</b> '.$asunto.'<br><b>Mensaje:</b> '.$mensaje);
			// $this->email->send();

			redirect('home/mail');

		}



	}

	public function mail(){
		$this->load->helper('url');
		$this->load->view('mail');
	}









}
