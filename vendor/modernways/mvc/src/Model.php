<?php
/**
 * Created by PhpStorm.
 * User: Jef Inghelbrecht
 * Date: 22/01/2016
 * Time: 15:31
 */
namespace ModernWays\Mvc;

class Model
{
    protected $modelState;

    // each model has a list
    protected $list;


    /**
     * @return \ModernWays\AnOrmApart\NoticeBoard
     */
    public function getModelState()
    {
        return $this->modelState;
    }

    /**
     * @param null $modelState
     */
    public function setModelState(\ModernWays\AnOrmApart\NoticeBoard $modelState)
    {
        $this->modelState = $modelState;
    }

    /**
     * @return mixed
     */
    public function getList()
    {
        return $this->list;
    }

    /**
     * @param mixed $categories
     */
    public function setList($list)
    {
        $this->list = $list;
    }

    public function isValid()
    {
        // count if notices of type 'VALID'
        return true;
    }

    public function __construct(\ModernWays\AnOrmApart\NoticeBoard $modelState = null)
    {
        $this->modelState = $modelState;
    }

    protected function validRequired($value, $name, $displayName = null) {
        if (isset($value) && strlen($value) > 0) {
            return true;
        } else {
            if (!$this->modelState == null) {
                if ($displayName == null) {
                    $displayName = $name;
                }
                $this->modelState->start("$displayName is required field.");
                $this->modelState->setType('VALIDATION');
                $this->modelState->log();
            }
            return false;
        }
    }
}
