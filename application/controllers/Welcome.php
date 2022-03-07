<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
		parent::__construct();
		//Validación del formulario
		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');

		$this->load->model('crud_model'); //creamos el modelo del CRUD
	}

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function insert(){
		if($this->input->is_ajax_request()){ //Condición si tengo una solicitud de AJAX
	
			$this->form_validation->set_rules('folio', 'folio', 'required');
			$this->form_validation->set_rules('empresa', 'empresa', 'required');
			$this->form_validation->set_rules('correo', 'Correo', 'required|valid_email'); //required|valid_email valida email
			//echo "yes";

			if ($this->form_validation->run() == FALSE)
			{
				$data = array('responce' => 'error', 'message' =>validation_errors());
			}
			else
			{
				$ajax_data = $this->input->post();
				if($this->crud_model->insert_entry($ajax_data)){ //toma del modelo de crud con su clase insert de los datos de ajax
					$data = array('responce' => 'success', 'message' => 'Se ha guardado la factura'); //valida que lleguen los datos de ajax
				}else{
					$data = array('responce' => 'error', 'message' => 'error');
				}
				
			}

		}else{
			echo "No direct script access allowed";
		}

		echo json_encode($data); //el array lo volvemos un JSON
	}

	public function fetch(){ //Buscamos mostrar los datos
		if ($this->input->is_ajax_request()){
			$posts = $this->crud_model->get_entries();
			echo json_encode($posts);
		}
	}

	public function delete(){
		if ($this->input->is_ajax_request()){
			$del_id = $this->input->post('del_id');

			if($this->crud_model->delete_entry($del_id)){
				$data = array('responce' =>"success");
			}else{
				$data = array('respnce' =>"error");
			}

		}

		echo json_encode($data);

	}


	public function edit() //con funcion edit, tomamos el edit y lo ajustamos para mandar los datos que consultara y seleccionara
	{
		if ($this->input->is_ajax_request()) {
			$this->input->post('edit_id');

			$edit_id = $this->input->post('edit_id');

			if ($post = $this->crud_model->single_entry($edit_id)) {
				$data = array('response' => "success", 'post' => $post);
			} else {
				$data = array('response' => "error", 'message' => "failed");
			}
		}
		echo json_encode($data);
		
	}
	public function update(){
		if($this->input->is_ajax_request()){ 
			$this->form_validation->set_rules('edit_folio', 'folio', 'required');
			$this->form_validation->set_rules('edit_empresa', 'empresa', 'required');
			$this->form_validation->set_rules('edit_correo', 'Correo', 'required|valid_email'); 
			//echo "yes";

			if ($this->form_validation->run() == FALSE)
			{
				$data = array('responce' => 'error', 'message' =>validation_errors());
			}
			else
			{
				$data['id'] = $this->input->post('edit_id');
				$data['folio'] = $this->input->post('edit_folio');
				$data['empresa'] = $this->input->post('edit_empresa');
				$data['correo'] = $this->input->post('edit_correo');
				if($this->crud_model->update_entry($data)){ 
					$data = array('responce' => 'success', 'message' => 'Datos actualizados'); 
				}else{
					$data = array('responce' => 'error', 'message' => 'error');
				}
				
			}

		}else{
			echo "No direct script access allowed";
		}

		echo json_encode($data); 
	}
	
}
?>
