<?php
/**
 * Created by PhpStorm.
 * User: jefin
 * Date: 27/12/2015
 * Time: 22:57
 */
namespace ModernWays\MvcTest\Controller;

class Home extends \ModernWays\Mvc\Controller
{
    public function Index()
    {
        $this->setModel(new \ModernWays\MvcTest\Model\Index());
        return $this->view('Home','Index');
    }

    public function Hello()
    {
        $this->setModel(new \ModernWays\MvcTest\Model\Hello());
        return $this->view('Home','Hello');
    }
}
