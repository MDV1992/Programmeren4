<?php
/**
 * Created by PhpStorm.
 * User: jefin
 * Date: 23/01/2016
 * Time: 10:18
 */
namespace ModernWays\AnOrmApart;

class NoticeBoard extends \ModernWays\Dialog\Model\NoticeBoard
{
    public function connected(\ModernWays\AnOrmApart\Connection $connection) {
        $this->startTimeInKey('Connection');
        $this->setCaption('Open connection');
        $this->setCode('Geen');
        $this->setCodeDriver(''); // for SQL or other provider code
        $this->setClassName('Connection');
        $this->setContext('Geen');
        $this->setDebugInfo('Geen');
        $this->setText("Connectie met {$connection->getHostName()} met {$connection->getDatabaseName()} is gelukt.");
        $this->setType('DAL');
        $this->Log();
    }

    public function connectionFailed(\ModernWays\AnOrmApart\Connection $connection, \PDOException $e) {
        $this->startTimeInKey('Connection');
        $this->setCaption('Open connection');
        $this->setCode($e->getCode());
        $this->setCodeDriver(''); // for SQL or other provider code
        $this->setClassName('Connection');
        // $this->setContext(serialize($e->getTrace()));
        $this->setDebugInfo($e->getMessage());
        $this->setText("Connectie met {$connection->getHostName()} met {$connection->getDatabaseName()} is mislukt.");
        $this->setType('DAL');
        $this->Log();
    }

    public function disconnected(\ModernWays\AnOrmApart\Connection $connection) {
        $this->startTimeInKey('Connection');
        $this->setCaption('Close connection');
        $this->setCode('Geen');
        $this->setCodeDriver(''); // for SQL or other provider code
        $this->setClassName('Connection');
        $this->setContext('Geen');
        $this->setDebugInfo('Geen');
        $this->setText("Connectie met {$connection->getHostName()} met {$connection->getDatabaseName()} is verbroken.");
        $this->setType('DAL');
        $this->Log();
    }

    public function notconnected(\ModernWays\AnOrmApart\Connection $connection) {
        $this->startTimeInKey('Connection');
        $this->setCaption('Use connection');
        $this->setCode('Geen');
        $this->setCodeDriver(''); // for SQL or other provider code
        $this->setClassName('Connection');
        $this->setContext('Geen');
        $this->setDebugInfo('Geen');
        $this->setText("Niet verbonden met {$connection->getHostName()} met {$connection->getDatabaseName()}.");
        $this->setType('DAL');
        $this->Log();
    }


    public function crudNotice($method = 'CRUD', $succes = false, \ModernWays\AnOrmApart\Dal $dal,
                            \PDOException $e = null, $sQLErrorInfo = null) {
        $this->startTimeInKey($method);
        $this->setCaption($method);
        $this->setCode($e == null ? $sQLErrorInfo == 0 ? 'Geen' : $sQLErrorInfo[0] : $e->getCode());
        $this->setCodeDriver($sQLErrorInfo == null ? 'Geen' : $sQLErrorInfo[1]); // for SQL or other provider code
        $this->setClassName(get_class($dal));
        $this->setContext($e == null ? $sQLErrorInfo == 0 ? 'Geen' : 'SQL feedback' : 'try catch feedback');
        $this->setDebugInfo($e == null ? $sQLErrorInfo == 0 ? 'Geen' : $sQLErrorInfo[2] : $e->getMessage());
        $className = get_class($dal);
        if ($succes) {
            $this->setText("CRUD methode $method voor tabel {$className} is gelukt.");
        }
        else {
            $this->setText("CRUD methode $method voor tabel {$className} is niet gelukt.");
        }
        $this->setType('DAL');
        $this->Log();
    }

    public function modelInvalidated ($dal) {
        $this->startTimeInKey('Model Invalidated');
        $this->setCaption('Model Invalidated');
        $this->setCode('Geen');
        $this->setCodeDriver(''); // for SQL or other provider code
        $this->setClassName(get_class($dal));
        $this->setContext('Geen');
        $this->setDebugInfo('Geen');
        $this->setText("Zie modelState voor meer informatie");
        $this->setType('DAL');
        $this->Log();
    }

}