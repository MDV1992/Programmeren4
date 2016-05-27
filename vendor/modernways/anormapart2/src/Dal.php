<?php
/**
 * Dal Base class
 * @lastmodified 17 januari 2015
 * @author JI
 * @version 1.0
 */

// name of namespace should be semantically meaningfull:
// cover the domain of the code
namespace ModernWays\AnormApart;
class Dal
{
    protected $model;
    protected $provider;
    // log field
    protected $rowCount;
    // log getter and setter
    protected $modelShortClassName;
    protected $modelClassName;
    protected $modelClassFieldNames;
    protected $reflectModelClass;

    public function __construct(\ModernWays\AnOrmApart\Provider $provider)
    {
        $this->provider = $provider;
        $this->reflectModelClass = new \ReflectionClass($this->model);
        $this->modelShortClassName = $this->reflectModelClass->getShortName();
        $this->modelClassName = $this->reflectModelClass->getName();
        // alleen private velden en geen protected van onderliggende base klasse
        $this->modelClassFieldNames = $this->reflectModelClass->getProperties(\ReflectionProperty::IS_PRIVATE);
    }

    /**
     * @return \ModernWays\Mvc\IModel
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param \ModernWays\Mvc\IModel
     */
    public function setModel(\ModernWays\Mvc\IModel $model)
    {
        $this->model = $model;
    }

    /**
     * @return \ModernWays\AnOrmApart\Provider
     */
    public function getProvider()
    {
        return $this->provider;
    }

    /**
     * @param \ModernWays\AnOrmApart\Provider
     */
    public function setProvider($provider)
    {
        $this->provider = $provider;
    }

    /**
     * @return mixed
     */
    public function getRowCount()
    {
        return $this->rowCount;
    }

    /**
     * @param mixed $rowCount
     */
    public function setRowCount($rowCount)
    {
        $this->rowCount = $rowCount;
    }

    public function createOne()
    {
        // build stored procedure paramaterlist
        $parameterList = '';
        foreach ($this->modelClassFieldNames as $fieldName) {
            if ($fieldName->getName() == 'id') {
                $parameterList .= '@pId, ';
            } else {
                $parameterName = ucfirst($fieldName->getName());
                $parameterList = $parameterList . ":p{$parameterName}, ";
            }
        }
        $parameterList = rtrim($parameterList, ', ');
        // build prepared statement sql statement
        $sqlString = "CALL {$this->modelShortClassName}Insert({$parameterList})";

        $result = false;
        if (!$this->model->isValid()) {
            $this->model->getModelState()->modelInvalidated($this);
        } else {
            if (!$this->provider->isConnected()) {
                $this->provider->open();
            }
            if ($this->provider->isConnected()) {
                try {
                    // Prepare stored procedure call
                    $preparedStatement = $this->provider->getPdo()->prepare($sqlString);
                    // so we cannot use bindParam that requires a variable by value
                    // if you want to use a variable, use then bindParam
                    foreach ($this->modelClassFieldNames as $fieldName) {
                        if (!($fieldName->getName() == 'id')) {
                            $getMethodName = ucfirst($fieldName->getName());
                            $reflectionMethod = new \ReflectionMethod($this->modelClassName, "get{$getMethodName}");
                            $value = $reflectionMethod->invoke($this->model);
                            switch (gettype($value)) {
                                case 'boolean' :
                                    $paramType = \PDO::PARAM_BOOL;
                                    break;
                                case 'integer' :
                                    $paramType = \PDO::PARAM_INT;
                                    break;
                                case 'NULL' :
                                    $paramType = \PDO::PARAM_STR;
                                    $value = '';
                                    break;
                                default :
                                    $paramType = \PDO::PARAM_STR;
                                    break;
                            }
                            $preparedStatement->bindValue(":p{$getMethodName}",
                                $value, $paramType);
                            // echo $reflectionMethod->invoke($this->model);
                        }
                    }
                    // Returns true on success or false on failure
                    $result = $preparedStatement->execute();
                    $this->rowCount = $preparedStatement->rowCount();
                    if ($result) {
                        // fetch the output
                        $this->model->setId($this->provider->getPdo()->query('select @pId')->fetchColumn());
                        $this->model->getModelState()->crudNotice('CreateOne', true, $this,
                            null, $preparedStatement->errorInfo());
                        $result = true;
                    } else {
                        $this->model->getModelState()->crudNotice('CreateOne', false, $this,
                            null, $preparedStatement->errorInfo());
                    }
                } catch (\PDOException $e) {
                    $this->model->getModelState()->crudNotice('CreateOne', false, $this, $e, null);
                }
            } else {
                $this->model->getModelState()->disconnected($this->provider);
            }
        }
        return $result;
    }

    public function readingAll($storedProcedureName = 'SelectAll')
    {
        $result = false;
        if (!$this->provider->isConnected()) {
            $this->provider->open();
        }
        if ($this->provider->isConnected()) {
            try {
                // Prepare stored procedure call
                $preparedStatement = $this->provider->getPdo()->
                prepare("CALL {$this->modelShortClassName}{$storedProcedureName}()");
                $preparedStatement->execute();
                $this->rowCount = $preparedStatement->rowCount();
                $this->model->setList($preparedStatement->fetchAll());
                if ($this->model->getList()) {
                    $this->model->getModelState()->crudNotice('ReadingAll', true, $this,
                        null, $preparedStatement->errorInfo());
                } else {
                    $this->model->getModelState()->crudNotice('ReadingAll', false, $this,
                        null, $preparedStatement->errorInfo());
                }
            } catch (\PDOException $e) {
                $this->model->getModelState()->crudNotice('ReadingAll', false, $this, $e);
            }
        } else {
            $this->model->getModelState()->notconnected($this->provider);
        }
        return $result;
    }

    public function readingOne()
    {
        $result = false;
        if (!$this->provider->isConnected()) {
            $this->provider->open();
        }
        if ($this->provider->isConnected()) {
            try {
                // Prepare stored procedure call
                $preparedStatement = $this->provider->getPdo()->
                prepare("CALL {$this->modelShortClassName}SelectOne(:pId)");
                // so we cannot use bindParam that requires a variable by value
                // if you want to use a variable, use then bindParam
                $preparedStatement->bindValue(':pId', $this->model->getId(), \PDO::PARAM_INT);
                $preparedStatement->execute();
                // fetch the output
                $array = $preparedStatement->fetch(\PDO::FETCH_ASSOC);

                if ($array) {
                    foreach ($this->modelClassFieldNames as $fieldName) {
                        $columnName = ucfirst($fieldName->getName());
                        $reflectionMethod = new \ReflectionMethod($this->modelClassName, "set{$columnName}");
                        $reflectionMethod->invoke($this->model, $array[$columnName]);
                        // echo $reflectionMethod->invoke($this->model);
                    }
                    $this->model->getModelState()->crudNotice("ReadingOne Id {$this->model->getId()}", true, $this,
                        null, $preparedStatement->errorInfo());
                    //Since column in the where must be primary key
                    // rowCount() should return 1. Can be used as validation.
                    $this->rowCount = $preparedStatement->rowCount();
                    $result = ($preparedStatement->rowCount() == 1);
                } else {
                    $this->model->getModelState()->crudNotice("ReadingOne Id {$this->model->getId()}", false, $this,
                        null, $preparedStatement->errorInfo());
                }
            } catch (\PDOException $e) {
                $this->model->getModelState()->crudNotice("ReadingOne Id {$this->model->getId()}", true, $this, $e);
            }
        } else {
            $this->model->getModelState()->notconnected($this->provider);
        }

        return $result;
    }

    public function DeleteOne()
    {
        $result = false;
        if (!$this->provider->isConnected()) {
            $this->provider->open();
        }
        if ($this->provider->isConnected()) {
            try {
                // Prepare stored procedure call
                $preparedStatement = $this->provider->getPdo()->
                prepare("CALL {$this->modelShortClassName}Delete(:pId)");
                // so we cannot use bindParam that requires a variable by value
                // if you want to use a variable, use then bindParam
                $preparedStatement->bindValue(':pId', $this->model->getId(), \PDO::PARAM_INT);
                $result = $preparedStatement->execute();
                $this->rowCount = $preparedStatement->rowCount();
                if ($result) {
                    if ($this->rowCount > 0) {
                        $this->model->getModelState()->crudNotice("Delete Id = {$this->model->getId()}", true, $this,
                            null, $preparedStatement->errorInfo());
                    } else {
                        $this->model->getModelState()->crudNotice("Delete Id = {$this->model->getId()}", false, $this,
                            null, $preparedStatement->errorInfo());
                    }
                } else {
                    $this->model->getModelState()->crudNotice("Delete Id = {$this->model->getId()}", false, $this,
                        null, $preparedStatement->errorInfo());
                }
            } catch (\PDOException $e) {
                $this->model->getModelState()->crudNotice("Delete Id = {$this->model->getId()}", true, $this, $e);
            }
        } else {
            $this->model->getModelState()->notconnected($this->provider);
        }
        return $result;
    }

    public function updateOne()
    {
        // build stored procedure paramaterlist
        $parameterList = '';
        foreach ($this->modelClassFieldNames as $fieldName) {
            $parameterName = ucfirst($fieldName->getName());
            $parameterList = $parameterList . ":p{$parameterName}, ";
        }
        $parameterList = rtrim($parameterList, ', ');
        // build prepared statement sql statement
        $sqlString = "CALL {$this->modelShortClassName}Update({$parameterList})";

        $result = false;
        if (!$this->model->isValid()) {
            $this->model->getModelState()->modelInvalidated($this);
        } else {
            if (!$this->provider->isConnected()) {
                $this->provider->open();
            }
            if ($this->provider->isConnected()) {
                try {
                    // Prepare stored procedure call
                    $preparedStatement = $this->provider->getPdo()->prepare($sqlString);
                    // so we cannot use bindParam that requires a variable by value
                    // if you want to use a variable, use then bindParam
                    foreach ($this->modelClassFieldNames as $fieldName) {
                        $getMethodName = ucfirst($fieldName->getName());
                        $reflectionMethod = new \ReflectionMethod($this->modelClassName, "get{$getMethodName}");
                        $value = $reflectionMethod->invoke($this->model);
                        switch (gettype($value)) {
                            case 'boolean' :
                                $paramType = \PDO::PARAM_BOOL;
                                break;
                            case 'integer' :
                                $paramType = \PDO::PARAM_INT;
                                break;
                            case 'NULL' :
                                $paramType = \PDO::PARAM_STR;
                                $value = '';
                                break;
                            default :
                                $paramType = \PDO::PARAM_STR;
                                break;
                        }
                        $preparedStatement->bindValue(":p{$getMethodName}",
                            $value, $paramType);
                    }
                    // Returns true on success or false on failure
                    $result = $preparedStatement->execute();
                    $this->rowCount = $preparedStatement->rowCount();
                    if ($result) {
                        $this->model->getModelState()->crudNotice('UpdateOne', true, $this,
                            null, $preparedStatement->errorInfo());
                        $result = true;
                    } else {
                        $this->model->getModelState()->crudNotice('UpdateOne', false, $this,
                            null, $preparedStatement->errorInfo());
                    }
                } catch (\PDOException $e) {
                    $this->model->getModelState()->crudNotice('UpdateOne', false, $this, $e, null);
                }
            } else {
                $this->model->getModelState()->disconnected($this->provider);
            }
        }
        return $result;
    }

    public function reading($tableName, $SqlString = null,
                            $whereString = null, $isStoredProcedure = false)
    {
        $list = null;
        if (!$this->provider->isConnected()) {
            $this->provider->open();
        }
        if ($this->provider->isConnected()) {
            try {
                if ($isStoredProcedure) {
                    $selectStatement = "CALL {$SqlString}(";
                    // parameterlist
                    if (!($whereString == null)) {
                        $whereString = str_replace(' ', '', $whereString);
                        $where = explode('=', $whereString);

                        $selectStatement .= " :p{$where[0]}";

                    }
                    $selectStatement .= ')';
                } else {
                    $selectColumnsString = str_replace(' ', '', $SqlString);
                    $selectColumns = explode(',', $selectColumnsString);
                    $selectStatement = 'SELECT ';
                    foreach ($selectColumns as $column) {
                        $selectStatement .= ucfirst($column) . ', ';
                    }
                    $selectStatement = rtrim($selectStatement, ', ');
                    $selectStatement .= " FROM {$tableName}";
                    if (!($whereString == null)) {
                        $whereString = str_replace(' ', '', $whereString);
                        $where = explode('=', $whereString);

                        $selectStatement .= "WHERE {$where[0]} = :p{$where[0]}";

                    }
                }
                // Prepare stored procedure call
                $preparedStatement = $this->provider->getPdo()->prepare($selectStatement);
                if (!($whereString == null)) {
                    $whereString = str_replace(' ', '', $whereString);
                    $where = explode('=', $whereString);
                    $preparedStatement->bindValue(":p{$where[0]}", $where[1], $this->getParameterType($where[1]));
                }
                $preparedStatement->execute();
                $this->rowCount = $preparedStatement->rowCount();
                $list = $preparedStatement->fetchAll();
                if ($list) {
                    $this->model->getModelState()->crudNotice("Reading $tableName SELECT $SqlString", true, $this,
                        null, $preparedStatement->errorInfo());
                } else {
                    $this->model->getModelState()->crudNotice("Reading $tableName SELECT $SqlString", false, $this,
                        null, $preparedStatement->errorInfo());
                }
            } catch (\PDOException $e) {
                $this->model->getModelState()->crudNotice("Reading $tableName SELECT $SqlString", false, $this, $e);
            }
        } else {
            $this->model->getModelState()->notconnected($this->provider);
        }
        return $list;
    }

    private function getParameterType($value)
    {
        switch (gettype($value)) {
            case 'boolean' :
                $paramType = \PDO::PARAM_BOOL;
                break;
            case 'integer' :
                $paramType = \PDO::PARAM_INT;
                break;
            case 'NULL' :
                $paramType = \PDO::PARAM_STR;
                $value = '';
                break;
            default :
                $paramType = \PDO::PARAM_STR;
                break;
        }
        return $paramType;
    }
}



