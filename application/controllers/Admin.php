<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

   public function __construct()
   {
      parent::__construct();
      // is_login();
      $this->load->model('my_model', 'my', true);
      // $this->load->model('menu_model', 'menu', true);
      $this->load->model('category_model', 'category', true);
      // $this->load->model('album_model', 'album', true);
      // $this->load->model('admin_model', 'admin', true);
   }

   // public function index()
   // {

   //    $data['title'] = 'Dashboard';
   //    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
   //    $data['page'] = 'index';
   //    $data['total_posting'] = $this->my->countRows('posting');
   //    $data['total_album'] = $this->my->countRows('album');
   //    $data['total_gallery'] = $this->my->countRows('gallery');
   //    $data['total_category'] = $this->my->countRows('category');
   //    $data['total_banner'] = $this->my->countRows('banner');
   //    // $data['chart'] = $this->admin->areaChart();
   //    $data['pageChart'] = '_chart';
   //    $this->load->view('back/layouts/app', $data);
   // }

   // public function identity()
   // {
   //    $data['title'] = 'Identitas Web';
   //    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
   //    $data['page'] = 'web/identity';
   //    $data['datatable'] = 'web/identity-datatable';
   //    $this->load->view('back/layouts/app', $data);
   // }

   // public function contact()
   // {
   //    $data['title'] = 'Kontak';
   //    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
   //    $data['page'] = 'web/contact';
   //    $data['datatable'] = 'web/contact-datatable';
   //    $this->load->view('back/layouts/app', $data);
   // }

   // public function menu()
   // {
   //    $data['title'] = 'Menu';
   //    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
   //    $data['page'] = 'menu/menu';
   //    $data['datatable'] = 'menu/menu-datatable';
   //    $this->load->view('back/layouts/app', $data);
   // }

   // public function submenu()
   // {
   //    $data['title'] = 'Submenu';
   //    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
   //    $data['page'] = 'menu/submenu';
   //    $data['datatable'] = 'menu/submenu-datatable';
   //    $data['menu'] = $this->menu->getMenu();
   //    $this->load->view('back/layouts/app', $data);
   // }

   public function category()
   {
      $data['title'] = 'Kategori';
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      $data['page'] = 'article/category';
      $data['datatable'] = 'article/category-datatable';
      $this->load->view('back/layouts/app', $data);
   }

   public function posting()
   {
      $data['title'] = 'Posting';
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      $data['page'] = 'article/posting';
      $data['datatable'] = 'article/posting-datatable';
      $this->load->view('back/layouts/app', $data);
   }

   // public function album()
   // {
   //    $data['title'] = 'Album';
   //    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
   //    $data['page'] = 'media/album';
   //    $data['datatable'] = 'media/album-datatable';
   //    $this->load->view('back/layouts/app', $data);
   // }

   // public function gallery()
   // {
   //    $data['title'] = 'Galeri';
   //    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
   //    $data['page'] = 'media/gallery';
   //    $data['datatable'] = 'media/gallery-datatable';
   //    $data['album'] = $this->album->getAlbum();
   //    $this->load->view('back/layouts/app', $data);
   // }

   // public function banner()
   // {
   //    $data['title'] = 'Banner';
   //    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
   //    $data['page'] = 'media/banner';
   //    $data['datatable'] = 'media/banner-datatable';
   //    $this->load->view('back/layouts/app', $data);
   // }
}

/* End of file Admin.php */
