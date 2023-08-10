<?php

class About extends Controller
{
    function index()
    {
        $data['page_title'] = 'Über uns...';        
        $this->view('about', $data);
    }

    
}