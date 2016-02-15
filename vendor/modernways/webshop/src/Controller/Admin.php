<?php
/**
 * Created by PhpStorm.
 * User: jefin
 * Date: 18/01/2016
 * Time: 21:06
 */
namespace ModernWays\Webshop\Controller;

class Admin extends \ModernWays\Mvc\Controller
{
    public function index()
    {
        return $this->view('Admin', 'Index', null);
    }
}