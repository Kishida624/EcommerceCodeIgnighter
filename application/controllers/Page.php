<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->Model('Articles_model');
    }

    public function index($page = null)
    {
        $this->goOut($page);
        $page = $this->Articles_model->getOnePage($page, $this->my_lang);
        $this->goOut($page);
        $data = array();
        $head = array();
        $head['title'] = $page['name'];
        $head['description'] = character_limiter(strip_tags(trim($page['content'])), 120);
        $head['keywords'] = str_replace(" ", ",", $data['name']);
        $data['content'] = $page['content'];
        $this->render('dynPage', $head, $data);
    }

    private function goOut($page)
    {
        if ($page == null)
            redirect();
    }

}
