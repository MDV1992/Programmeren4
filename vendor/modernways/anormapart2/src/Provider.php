<?php
/**
 * Created by Modern Ways.
 * Template: Jef Inghelbrecht
 * Date: 21/07/2015
 * Time: 11:21
 */
namespace ModernWays\AnOrmApart;

class Provider extends Connection
{
    private $name;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    public function __construct($name, \ModernWays\AnOrmApart\NoticeBoard $noticeBoard)
    {
        parent::__construct($noticeBoard);
        $this->name = $name;
        switch ($this->name) {
            case 'WebwinkelLokaal' :
                $this->databaseName = 'webshop';
                $this->password = 'higgS4oXford';
                $this->userName = 'root';
                $this->hostName = 'localhost:3306';
                break;
            case 'MikMakLocalMobielePC' :
                $this->databaseName = 'MikMak';
                $this->password = '!riE@zes13';
                $this->userName = 'root';
                $this->hostName = 'localhost:3306';
                break;
            case 'MembershipMobielePC' :
                $this->databaseName = 'Membership';
                $this->password = '!riE@zes13';
                $this->userName = 'root';
                $this->hostName = 'localhost:3306';
                break;
            case 'WebwinkelOVH' :
                $this->databaseName = 'Webshop';
                $this->password = 'cErepovec/';
                $this->userName = 'c11791';
                $this->hostName = 'studyplanit.com:3306';
                break;
            default :
                $this->databaseName = 'MikMak';
                $this->password = 'cErepovec/';
                $this->userName = 'c11791';
                $this->hostName = 'studyplanit.com:3306';
                break;
        }
    }

}


