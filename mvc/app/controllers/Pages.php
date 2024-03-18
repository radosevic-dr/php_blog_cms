<?php
class Pages extends Controller {
  private $postModel;
  public function __construct(){
    $this->postModel = $this->model('Post');
  }

  public function index(){
    $data = [
      'title' => "Homepage"
    ];
    $this->view('pages/index', $data);
  }

  public function about(){
    $data = [
      'title' => 'About us',
      'description' => 'Praesent tristique magna sit amet purus gravida quis blandit. Feugiat in ante metus dictum at tempor. Adipiscing elit duis tristique sollicitudin. Nulla facilisi cras fermentum odio eu feugiat. Vitae turpis massa sed elementum tempus. Urna nunc id cursus metus aliquam. Id nibh tortor id aliquet lectus. Purus sit amet volutpat consequat mauris. Nibh cras pulvinar mattis nunc sed blandit. In ornare quam viverra orci sagittis eu volutpat odio. Aliquam ut porttitor leo a. Viverra nam libero justo laoreet sit. Libero enim sed faucibus turpis in eu mi.'
    ];
    $this->view('pages/about', $data);
  }
}