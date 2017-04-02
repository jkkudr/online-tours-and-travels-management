<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of pdf_helper
 *
 * @author Majeed
 */
class pdf_helper extends CI_Controller {
    //put your code here
    
    function prep_pdf($orientation = 'portrait')
{
    $CI = & get_instance();
    
    $CI->cezpdf->selectFont(base_url() . '/fonts');    
    
    $all = $CI->cezpdf->openObject();
    $CI->cezpdf->saveState();
    $CI->cezpdf->setStrokeColor(0,0,0,1);
    if($orientation == 'portrait') {
        $CI->cezpdf->ezSetMargins(50,70,50,50);
        $CI->cezpdf->ezStartPageNumbers(500,28,8,'','{PAGENUM}',1);
        $CI->cezpdf->line(20,40,578,40);
        $CI->cezpdf->addText(50,32,8,'Printed on ' . date('m/d/Y h:i:s a'));
        $CI->cezpdf->addText(50,22,8,'PDF Tutorial - www.code2learn.com');
    }
    else {
        $CI->cezpdf->ezStartPageNumbers(750,28,8,'','{PAGENUM}',1);
        $CI->cezpdf->line(20,40,800,40);
        $CI->cezpdf->addText(50,32,8,'Printed on ' . date('m/d/Y h:i:s a'));
        $CI->cezpdf->addText(50,22,8,'PDF Tutorial - www.code2learn.com');
    }
    $CI->cezpdf->restoreState();
    $CI->cezpdf->closeObject();
    $CI->cezpdf->addObject($all,'all');
}
}