<?php


class ItemController extends CI_Controller
{

//	All Items in list
	public function index()
	{
		$user = $this->ion_auth->user()->row();
		$this->load->model('item_model');
		$items = $this->item_model->get_all();
		$this->load->view('items/all', ['user' => $user, 'items' => $items]);
	}

	//	All Items in list
	public function new_item()
	{
		$user = $this->ion_auth->user()->row();
		$this->load->view('items/new', ['user' => $user]);
	}

	public function edit_item()
	{
		$id = $this->uri->segment(3);
		$user = $this->ion_auth->user()->row();
		$this->load->model('item_model');
		$item = $this->item_model->get_item($id);
		$this->load->view('items/edit', ['user' => $user, 'item' => $item]);
	}


	public function save_item()
	{
		$this->form_validation->set_rules('name', 'Item Name', 'trim|required|is_unique[items.name]');
		$this->form_validation->set_rules('qty', 'Item Quantity', 'trim|required|numeric');
		$this->form_validation->set_rules('price', 'Item Price', 'trim|required|numeric');

		if ($this->form_validation->run() == true) {


			$config['upload_path'] = './public/uploads/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = 100;
			$config['max_width'] = 1024;
			$config['max_height'] = 768;

			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('userfile')) {
				$error = array('error' => $this->upload->display_errors());
				$this->session->set_flashdata('errors', $error);

			} else {
				$file_data = $this->upload->data();

				$this->load->model('item_model');

				$name = $this->input->post('name');
				$qty = $this->input->post('qty');
				$price = $this->input->post('price');
				$file = $file_data['file_name'];


				$this->item_model->add_item($name, $price, $qty, $file);
				$this->session->set_flashdata('success', 'Item Added Successfully');
			}

		} else {
			$this->session->set_flashdata('errors', validation_errors());
		}

		redirect(site_url('items/new'));
	}

	public function update_item()
	{
		$id = $this->input->post('id');
		$this->form_validation->set_rules('name', 'Item Name', 'trim|required|edit_unique[items.name.' . $id . ']');
		$this->form_validation->set_message('edit_unique','Name is already Taken : '.$this->input->post('name'));
		$this->form_validation->set_rules('qty', 'Item Quantity', 'trim|required|numeric');
		$this->form_validation->set_rules('price', 'Item Price', 'trim|required|numeric');

		$file_name = $this->input->post('image_path');
		$validation_ok = true;
		if (!empty($_FILES['userfile']['name'])) {
			$config['upload_path'] = './public/uploads/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = 100;
			$config['max_width'] = 1024;
			$config['max_height'] = 768;

			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('userfile')) {
				$error = array('error' => $this->upload->display_errors());
				$this->session->set_flashdata('errors', $error);
				$validation_ok = false;
			} else {
				$file_data = $this->upload->data();
				$file_name = $file_data['file_name'];
			}
		}
		if ($this->form_validation->run() == true) {

			$this->load->model('item_model');

			$name = $this->input->post('name');
			$qty = $this->input->post('qty');
			$price = $this->input->post('price');
			$file = $file_name;


			$this->item_model->update_item($id,$name, $price, $qty, $file);
			$this->session->set_flashdata('success', 'Item Updated Successfully');

		} else {
			$this->session->set_flashdata('errors', validation_errors());
		}

		redirect(site_url('items/edit/'.$id));
	}

}
