<?php
/**
 * Created by Modern Ways.
 * User: Jef Inghelbrecht
 * Date: 9/08/2015
 * Time: 15:53
 */
namespace ModernWays\Mvc;

class Controller
{
    protected $route;
    protected $noticeBoard;

    /**
     * @param mixed $noticeBoard
     */
    public function setNoticeBoard(\ModernWays\Dialog\Model\NoticeBoard $noticeBoard)
    {
        $this->noticeBoard = $noticeBoard;
    }

    public function __construct(Route $route = null, \ModernWays\Dialog\Model\NoticeBoard $noticeBoard = null)
    {
        // log for Application
        $this->noticeBoard = $noticeBoard;
        $this->route = $route;
        $this->setup();

    }

    public function __destruct()
    {
    }

    public function view($entity = null, $action = null, $model)
    {
/*        $vendorDir = dirname(dirname(dirname(dirname(__FILE__))));
        $viewLocations = array(
            'ModernWays\\Dialog\\' => $vendorDir . '/modernways/dialog/src',
            'ModernWays\\MvcTest\\' => $vendorDir . '/modernways/mvc/tests'
        );
        $viewLocation = $viewLocations['ModernWays\\Dialog\\'];*/

        if (is_null($entity)) {
            $entity = $this->route->getEntity();
        }
        if (is_null($action)) {
            $action = $this->route->getAction();
        }
        $modelNoticeBoard = $this->noticeBoard;
        // var_dump($modelNoticeBoard);
        $appStateView = function () use ($modelNoticeBoard) {
            $model = $modelNoticeBoard;
            if (get_parent_class($modelNoticeBoard)) {
                $className = get_parent_class($modelNoticeBoard);
            } else {
                $className = get_class($modelNoticeBoard);
            }
            $reflector = new \ReflectionClass($className);
            $viewLocation = dirname(dirname($reflector->getFileName()));
            include("{$viewLocation}/View/NoticeBoard.php");
        };
        $partialView = function ($entity, $action, $model = null) {
            // if no model is specified, assume view is near to controller class
            if ($model == null) {
                $reflector = new \ReflectionClass(get_class($this));
                $viewLocation = dirname(dirname($reflector->getFileName()));
            } else {
                $reflector = new \ReflectionClass(get_class($model));
                $viewLocation = dirname(dirname($reflector->getFileName()));
            }
            include("{$viewLocation}/View/{$entity}/{$action}.php");
        };
        return function () use ($entity, $action, $model, $partialView, $appStateView) {
            // if no model is specified, assume view is near to controller class
            if ($model == null) {
                $reflector = new \ReflectionClass(get_class($this));
                $viewLocation = dirname(dirname($reflector->getFileName()));
            } else {
                $reflector = new \ReflectionClass(get_class($model));
                $viewLocation = dirname(dirname($reflector->getFileName()));
            }
            include("{$viewLocation}/View/{$entity}/{$action}.php");
        };
    }

    // virtual function can be overwritten by inheriting class
    public function setup()
    {
    }
}
