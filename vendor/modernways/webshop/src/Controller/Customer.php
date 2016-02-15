<?php
/**
 * Created by PhpStorm.
 * User: Jef Inghelbrecht
 * Date: 27/12/2015
 * Time: 22:57
 */
namespace ModernWays\Webshop\Controller;

class Customer extends \ModernWays\Mvc\Controller
{
    public function creatingOne()
    {
        $model = new \ModernWays\Webshop\Model\Customer($this->noticeBoard);
        $provider = new \ModernWays\AnOrmApart\Provider('WebwinkelOVH', $this->noticeBoard);
        $dal = new \ModernWays\Webshop\Dal\Customer($model, $provider);
        $dal->readingAll();
        return $this->view('Customer', 'CreatingOne', $model);
    }

    public function createOne()
    {
        // var_dump($_POST);
        $model = new \ModernWays\Webshop\Model\Customer($this->noticeBoard);
        $provider = new \ModernWays\AnOrmApart\Provider('WebwinkelOVH', $this->noticeBoard);
        $dal = new \ModernWays\Webshop\Dal\Customer($model, $provider);
        $model->setNickName(filter_input(INPUT_POST, 'Customer-NickName', FILTER_SANITIZE_STRING));
        $model->setFirstName(filter_input(INPUT_POST, 'Customer-FirstName', FILTER_SANITIZE_STRING));
        $model->setLastName(filter_input(INPUT_POST, 'Customer-LastName', FILTER_SANITIZE_STRING));
        $model->setAddress1(filter_input(INPUT_POST, 'Customer-Address1', FILTER_SANITIZE_STRING));
        $model->setAddress2(filter_input(INPUT_POST, 'Customer-Address2', FILTER_SANITIZE_STRING));
        $model->setCity(filter_input(INPUT_POST, 'Customer-City', FILTER_SANITIZE_STRING));
        $model->setRegion(filter_input(INPUT_POST, 'Customer-Region', FILTER_SANITIZE_STRING));
        $model->setPostalCode(filter_input(INPUT_POST, 'Customer-PostalCode', FILTER_SANITIZE_STRING));
        $model->setIdCountry(filter_input(INPUT_POST, 'Customer-IdCountry', FILTER_SANITIZE_STRING));
        $model->setPhone(filter_input(INPUT_POST, 'Customer-Phone', FILTER_SANITIZE_STRING));
        $model->setMobile(filter_input(INPUT_POST, 'Customer-Mobile', FILTER_SANITIZE_STRING));
        $dal->createOne();
        // Refresh list
        $dal->readingAll();
        return $this->view('Customer', 'CreatingOne', $model);
    }

    public function editing()
    {
        $model = new \ModernWays\Webshop\Model\Customer($this->noticeBoard);
        $provider = new \ModernWays\AnOrmApart\Provider('WebwinkelOVH', $this->noticeBoard);
        $dal = new \ModernWays\Webshop\Dal\Customer($model, $provider);
        $dal->readingAll();
        return $this->view('Customer', 'Editing', $model);
    }

    public function readingOne()
    {
        $model = new \ModernWays\Webshop\Model\Customer($this->noticeBoard);
        $provider = new \ModernWays\AnOrmApart\Provider('WebwinkelOVH', $this->noticeBoard);
        $dal = new \ModernWays\Webshop\Dal\Customer($model, $provider);
        $model->setId($this->route->getId());
        $dal->readingAll();
        $dal->readingOne();
        return $this->view('Customer', 'ReadingOne', $model);
    }

    public function updatingOne()
    {
        $model = new \ModernWays\Webshop\Model\Customer($this->noticeBoard);
        $provider = new \ModernWays\AnOrmApart\Provider('WebwinkelOVH', $this->noticeBoard);
        $dal = new \ModernWays\Webshop\Dal\Customer($model, $provider);
        $model->setId(filter_input(INPUT_POST, 'Customer-Id', FILTER_SANITIZE_NUMBER_INT));
        $dal->readingOne();
        $dal->readingAll();
        return $this->view('Customer', 'UpdatingOne', $model);
    }

    public function deleteOne()
    {
        $model = new \ModernWays\Webshop\Model\Customer($this->noticeBoard);
        $provider = new \ModernWays\AnOrmApart\Provider('WebwinkelOVH', $this->noticeBoard);
        $dal = new \ModernWays\Webshop\Dal\Customer($model, $provider);
        $model->setId(filter_input(INPUT_POST, 'Customer-Id', FILTER_SANITIZE_NUMBER_INT));
        $dal->deleteOne();
        $dal->readingAll();
        return $this->view('Customer', 'Editing', $model);
    }

    public function updateOne()
    {
        $model = new \ModernWays\Webshop\Model\Customer($this->noticeBoard);
        $provider = new \ModernWays\AnOrmApart\Provider('WebwinkelOVH', $this->noticeBoard);
        $dal = new \ModernWays\Webshop\Dal\Customer($model, $provider);
        $model->setId(filter_input(INPUT_POST, 'Customer-Id', FILTER_SANITIZE_NUMBER_INT));
        $model->setNickName(filter_input(INPUT_POST, 'Customer-NickName', FILTER_SANITIZE_STRING));
        $model->setFirstName(filter_input(INPUT_POST, 'Customer-FirstName', FILTER_SANITIZE_STRING));
        $model->setLastName(filter_input(INPUT_POST, 'Customer-LastName', FILTER_SANITIZE_STRING));
        $model->setAddress1(filter_input(INPUT_POST, 'Customer-Address1', FILTER_SANITIZE_STRING));
        $model->setAddress2(filter_input(INPUT_POST, 'Customer-Address2', FILTER_SANITIZE_STRING));
        $model->setCity(filter_input(INPUT_POST, 'Customer-City', FILTER_SANITIZE_STRING));
        $model->setRegion(filter_input(INPUT_POST, 'Customer-Region', FILTER_SANITIZE_STRING));
        $model->setPostalCode(filter_input(INPUT_POST, 'Customer-PostalCode', FILTER_SANITIZE_STRING));
        $model->setIdCountry(filter_input(INPUT_POST, 'Customer-IdCountry', FILTER_SANITIZE_STRING));
        $model->setPhone(filter_input(INPUT_POST, 'Customer-Phone', FILTER_SANITIZE_STRING));
        $model->setMobile(filter_input(INPUT_POST, 'Customer-Mobile', FILTER_SANITIZE_STRING));
        $dal->updateOne();
        $dal->readingAll();
        // read modified record again
        $dal->readingOne();
        return $this->view('Customer', 'ReadingOne', $model);
    }
}
