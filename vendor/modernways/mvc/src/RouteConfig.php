<?php
/**
 * Created by ModernWays.
 * Template: Jef Inghelbrecht
 * Date: 18/07/2015
 * Time: 20:53
 * The Front Controller consolidates all request handling by channeling requests
 * through a single handler object. This object can carry out common behavior,
 * which can be modified at runtime with decorators.
 * The handler then dispatches to command objects for behavior particular
 * to a request. (Martin Fowler)
 *
 * In our sample we intercept a get or a post as a usecase definition.
 * The usecase is first parse. Then a controller is dynamically created
 * and the appropriated method is called.
 */
namespace ModernWays\Mvc;
/**
 * Class RouteConfig
 * @package ModernWays\Mvc
 */
class RouteConfig
{

    protected $route; /* Use Case object */
    protected $namespace;
    protected $noticeBoard; /* log book for application feedback */

    public function setRoute($value)
    {
        $this->route = $value;
    }

    function __construct(
        $namespace,
        Route $route = null,
        \ModernWays\Dialog\Model\NoticeBoard $noticeBoard = null)
    {
        $this->route = $route;
        $this->namespace = $namespace;
        $this->noticeBoard = $noticeBoard;
    }

    public function invokeActionMethod()
    {
        // voer de actiemethode van de controller uit
        $controllerName = "{$this->namespace}\\Controller\\{$this->route->getEntity()}";
        $actionMethod = new \ReflectionMethod("{$this->namespace}\\Controller\\{$this->route->getEntity()}",
            $this->route->getAction());
        if (!class_exists($controllerName, true)) {

            if (!is_null($this->noticeBoard)) {
                $this->noticeBoard->startTimeInKey('Create Controller');
                $this->noticeBoard->setCaption("Creating the action controller '$controllerName'...");
                $this->noticeBoard->setText("The action controller '$controllerName' has not been defined.");
                $this->noticeBoard->end();
            }
            return false;
        }
        else {
            $reflection = new \ReflectionClass($controllerName);
            $controller =  $reflection->newInstance($this->route, $this->noticeBoard);

            if (!is_null($this->noticeBoard)) {
                $this->noticeBoard->startTimeInKey('Create Controller');
                $this->noticeBoard->setCaption("Creating the action controller '$controllerName'...");
                $this->noticeBoard->setText("The action controller '$controllerName' object has been created.");
                $this->noticeBoard->end();
            }
            return $actionMethod->invoke($controller);
        }
    }
}