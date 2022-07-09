<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blog extends CI_Controller
{

   public function __construct()
   {
      parent::__construct();

      $this->load->model('posting_model', 'posting', true);
      $this->load->model('category_model', 'category', true);
      if ($this->session->userdata('email') == "") {
         redirect('auth');
      }
      $this->load->helper('text');
   }

   public function index($page = null)
   {
      // $data['email'] = $this->session->userdata('email');
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      // $data['favicon']     = $this->identity->getIdentity();
      $data['title']       = 'Beranda';
      $data['navbar']      = $this->category->getCategory();
      // $data['banner']      = $this->banner->getBanner();
      $data['category']    = $this->category->getCategory();
      $data['post']        = $this->posting->getAllPosting($page);
      $data['popular']     = $this->posting->getMostPopular();
      $data['trending']    = $this->posting->getThread();
      $data['category']    = $this->category->getCategory();

      $data['total_rows']  = $this->posting->countPosting();
      $data['pagination']  = $this->posting->makePagination(
         base_url('blog/index'),
         3,
         $data['total_rows']
      );

      $data['page'] = 'blog';

      $this->load->view('templates_ibu/header', $data);
      $this->load->view('templates_ibu/sidebar');
      $this->load->view('templates_ibu/topbar', $data);
      $this->load->view('front/layouts/app', $data);
      $this->load->view('templates_ibu/footer');
   }

   public function category($category, $page = null)
   {
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      $data['favicon']     = $this->identity->getIdentity();
      $data['title']       = 'Kategori';
      $data['category']    = $this->category->getCategory();
      $data['post']        = $this->posting->getPostingByCategory($category, $page);
      $data['popular']     = $this->posting->getMostPopular();
      $data['trending']    = $this->posting->getThread();
      $data['category']    = $this->category->getCategory();

      $data['total_rows']  = $this->posting->countPosting($category);
      $data['pagination']  = $this->posting->makePagination(
         base_url("blog/category/$category/"),
         4,
         $data['total_rows']
      );

      $data['page'] = 'blog';
      $this->load->view('front/layouts/app', $data);
   }

   public function read($seo_title)
   {
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      $row = $this->posting->getPosting($seo_title);

      if ($row) {
         $data['posting']     = $row;
         $data['title']       = $row->title;
         // $data['favicon']     = $this->identity->getIdentity();
         // $data['banner']      = $this->banner->getBanner();
         $data['popular']     = $this->posting->getMostPopular();
         $data['trending']    = $this->posting->getThread();
         $data['category']    = $this->category->getCategory();
         $data['page']        = 'news-detail';
         $this->load->view('templates_ibu/header', $data);
         $this->load->view('templates_ibu/sidebar');
         $this->load->view('templates_ibu/topbar', $data);
         $this->load->view('front/layouts/app', $data);
         $this->load->view('templates_ibu/footer');
      } else {
         redirect(base_url('home'));
      }
   }
}

/* End of file Blog.php */
