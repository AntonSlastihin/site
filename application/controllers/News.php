<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class News extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->model('news_model');
			// подключение к модулю model/news_model 
		}
		public function index(){
			$data['title'] = "Все новости!";
			$data['news'] = $this->news_model->getNews();
			$this->load->view('templates/header', $data);
			$this->load->view('news/index', $data);
			$this->load->view('templates/footer');
		}
		public function view($id = false){
			$base = $this->news_model->getId($id);
			if (empty($base)){
				show_404();
			}
			$data['title'] = $base['title'];
			$data['text'] = $base['text'];
			$this->load->view('templates/header', $data);
			$this->load->view('news/view', $data);
			$this->load->view('templates/footer');
		}
		public function create(){
			$data['title'] = 'Добавить пост';

			$this->load->view('templates/header', $data);
			$this->load->view('news/create', $data);

			if ($this->input->post('slug') && $this->input->post('title') &&
				$this->input->post('text')){
				$slug = htmlentities($this->input->post('slug'));
				$title = htmlentities($this->input->post('title'));
				$text = htmlentities($this->input->post('text'));

				if ($this->news_model->setNews($slug, $title, $text)){
					$this->load->view("news/success");
				}
			}

			$this->load->view('templates/footer');
		}

		public function edit($id = FALSE){
			$data['title'] = "Edit post";

			$this->load->view('templates/header');

			 if ($this->input->post('slug') && $this->input->post('title') && $this->input->post('text')){

			 	$slug = htmlentities($this->input->post('slug'));
				$title = htmlentities($this->input->post('title'));
				$text = htmlentities($this->input->post('text'));
				$id   = htmlentities($this->input->post('id'));

			 	if ($this->news_model->updatePost($slug, $title, $text, $id)){
				 	$this->load->view('news/success');
				 	$this->load->view('templates/footer');
				 	return true;
				}
				print "error";
			}

			if ($data['news_item'] = $this->news_model->getId($id)){
				//если slug в бд не найден то 404
				$data['title_news'] = $data['news_item']['title'];
				$data['content_news']  = $data['news_item']['text'];
				$data['slug_news'] = $data['news_item']['slug'];
				$data['id_news'] = $data['news_item']['id'];
		
				$this->load->view('templates/header', $data);
				$this->load->view('news/edit', $data);
				$this->load->view('templates/footer');

				return;
			} 
			show_404();
			//return massive from base 1
		}
		public function delete($id = false){
			$this->load->helper('url');
			if ($this->news_model->deletePost($id)){
       			 redirect('news/');
			}
			show_404();
		}
	}