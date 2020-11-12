<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class News_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}
		public function getNews($slug = FALSE){
			if ($slug === FALSE){
				$query = $this->db->get('news');
				return $query->result_array();
			}
			$query = $this->db->get_where('news', array('slug'=>$slug));
			return $query->row_array();
		}
		public function setNews($slug, $title, $text){
			$data = array(
				"title" => $title,
				"slug" => $slug, 
				"text" => $text
			);
			return $this->db->insert('news', $data);
		}
		public function updatePost($slug, $title, $text, $id){
			$data = array(
				"title" => $title,
				"slug" => $slug, 
				"text" => $text
			);
			$builder = $this->db->where('id', $id);
			return $builder->update('news', $data);
		}
		public function getId($id = false){
			if ($id === FALSE){
				$query = $this->db->get('news');
				return $query->result_array();
			}
			$query = $this->db->get_where('news', array('id'=>$id));
			return $query->row_array();
		}
		public function deletePost($id = false){
			// удаляет по id
			return $this->db->delete('news', ['id'=>$id]);
		}
	}
