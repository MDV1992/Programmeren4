<?php
/**
 * Created by PhpStorm.
 * User: jefin
 * Date: 8/08/2015
 * Time: 18:21
 */

namespace ModernWays\Mvc;
/**
 * Class Route
 * wff: noun-verb--clause_id
 * @package ModernWays\Helpers
 */
class Route
{
    private $entity;
    private $action;
    private $id;
    protected $clause;
    /* the url to be parsed, can be the name of the use case */
    protected $url;
    protected $noticeboard;

    /**
     * @return mixed
     */
    public function getEntity()
    {
        return $this->entity;
    }

    /**
     * @param mixed $entity
     */
    public function setEntity($entity)
    {
        $this->entity = $entity;
    }

    /**
     * @return mixed
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @param mixed $action
     */
    public function setAction($action)
    {
        $this->action = $action;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getClause()
    {
        return $this->clause;
    }

    /**
     * @param mixed $clause
     */
    public function setClause($clause)
    {
        $this->clause = $clause;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        if (isset($this->url)) {
            return $this->url;
        }
        return 'Home-Index--';
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    function __construct(\ModernWays\Dialog\Model\NoticeBoard $noticeBoard = null, $url = 'Home-Index--')
    {
        $this->noticeboard = $noticeBoard;
        // var_dump($_POST);
        // what action to take?
        // if uc (use case) is specified on querystring
        // change default action
        if (isset($_POST['uc'])) {
            $this->setUrl($_POST['uc']);
        } elseif (isset($_GET['uc'])) {
            // sommige acties komen via een get binnen op de url
            $this->setUrl($_GET['uc']);
        }
        else {
            // default action is home
            $this->setUrl($url);
        }
        $this->parseUseCaseUrl();
     }

    /* further specification of use case */

    public function isUrl()
    {
        return (!is_null($this->url));
    }

    public function isAction()
    {
        return (!is_null($this->action));
    }

    public function isClause()
    {
        return (!is_null($this->clause));
    }

    public function parseUseCaseUrl()
    {
        // look for Id
        $pos = strpos($this->url, '_');
        if ($pos !== false) {
            $this->id = substr($this->url, $pos + 1);
            $this->url = substr($this->url, 0, $pos);
        }
        // if no clause defined, add empty one
        // action from one - up to double --
        $pos = strpos($this->url, '--');
        if ($pos == false) {
            $this->url = $this->url . '--';
        }

        // look for action
        $pos = strpos($this->url, '--');
        $startPos = strpos($this->url, '-');
        $this->action = substr($this->url, $startPos + 1, $pos - $startPos - 1);

        // look for entity (table) name, up to first -
        $pos = strpos($this->url, '-');
        if ($pos !== false) {
            $this->entity = substr($this->url, 0, $pos);
        }

        // clause from double -- to end
        $pos = strpos($this->url, '--');
        if ($pos !== false) {
            $this->clause = substr($this->url, $pos + 2);
        }

        if (!is_null($this->noticeboard)) {
            $this->noticeboard->startTimeInKey('set Use Case');
            $this->noticeboard->setText("Entity = {$this->entity} / Action = {$this->action} / Clause = {$this->clause} / Id = {$this->id}");
            $this->noticeboard->setCaption("IsActionSet = {$this->isAction()}");
            $this->noticeboard->end();
        }
    }
}
