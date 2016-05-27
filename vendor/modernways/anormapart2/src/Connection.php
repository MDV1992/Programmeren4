<?php
/**
Connection class
@since 10 april 2012
@lastmodified 15 april 2015
@author JI
@version 1.0
 */

// name of namespace should be semantically meaningfull:
// cover the domain of the code
namespace ModernWays\AnOrmApart;

class Connection
{
    // design means identifying data and methods
    protected $noticeBoard;
    protected $databaseName;
    protected $pdo;
    protected $userName;
    protected $hostName;
    protected $password;

    /**
     * @return mixed
     */
    public function getNoticeBoard()
    {
        return $this->noticeBoard;
    }

    /**
     * @param mixed $noticeBoard
     */
    public function setNoticeBoard(\ModernWays\AnOrmApart\NoticeBoard $noticeBoard)
    {
        $this->noticeBoard = $noticeBoard;
    }

    /**
     * @return mixed
     */
    public function getDatabaseName()
    {
        return $this->databaseName;
    }

    /**
     * @param mixed $databaseName
     */
    public function setDatabaseName($databaseName)
    {
        $this->databaseName = $databaseName;
    }

    /**
     * @return \PDO
     */
    public function getPdo()
    {
        return $this->pdo;
    }

    /**
     * @param \PDO
     */
    public function setPdo($pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @return mixed
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * @param mixed $userName
     */
    public function setUserName($userName)
    {
        $this->userName = $userName;
    }

    /**
     * @return mixed
     */
    public function getHostName()
    {
        return $this->hostName;
    }

    /**
     * @param mixed $hostName
     */
    public function setHostName($hostName)
    {
        $this->hostName = $hostName;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function isConnected()
    {
        return ($this->pdo ? TRUE : false);
    }

    // constructor wordt uitgevoerd met
    // het new keyword
    public function __construct(\ModernWays\AnOrmApart\NoticeBoard $noticeBoard)
    {
        $this->noticeBoard = $noticeBoard;
    }

    /**
     * Maakt een connectie met de database
     * @return Bool true als de connectie is gelukt, false als mislukt
     */
    public function open()
    {
        if ($this->pdo)
        {
           $this->noticeBoard->Connected($this);
        }
        else
        {
            try
            {
                $connectionString =
                    "mysql:host={$this->hostName};dbname={$this->databaseName}";
                // je moet aangeven dat de PDO klasse in de root namespace
                // gezocht moet worden in niet in MyBib\Dal
                $this->pdo = new \PDO($connectionString, $this->userName, $this->password);
                $this->noticeBoard->Connected($this);
            }
            catch (\PDOException $e)
            {
                $this->noticeBoard->ConnectionFailed($this, $e);
            }
        }
        return (!is_null($this->pdo));
    }

    public function close()
    {
        // $this->log->clear();
        $this->noticeBoard->startTimeInKey('close connection');
        if (is_null($this->pdo))
        {
            $this->noticeBoard->Disconnected($this);
        }
        else
        {
            $this->pdo = NULL;
            $this->noticeBoard->Disconnected($this);
        }
    }
}

