<?php


class Item_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();

	}

	public function add_item($name, $price, $qty, $image)
	{
		$data = array(
			'name' => $name,
			'qty' => $qty,
			'price' => $price,
			'image_path' => $image,
			'status' => 1
		);

		return $this->db->insert('items', $data);
	}

	public function update_item($id, $name, $price, $qty, $image)
	{
		$data = array(
			'name' => $name,
			'qty' => $qty,
			'price' => $price,
			'image_path' => $image,
			'status' => 1
		);

		$this->db->where('id', $id);
		return $this->db->update('items', $data);
	}

	public function get_all()
	{
		$query = $this->db->get('items');
		return $query->result();
	}

	public function get_item($id)
	{
		$query = $this->db->where('id', $id)->get('items');
		return $query->row();
	}

}
