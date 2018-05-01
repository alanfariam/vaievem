<?php
class homeController extends controller {

    $anuncios = new Snuncios();

    public function index() {
        $dados = array();
        $this->loadView('home');
    }
}