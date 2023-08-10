<?php

class Home extends Controller
{
    function index()
    {       
        
        $data['page_title'] = 'Startseite';        
        $this->view('home', $data);
    }   
}
