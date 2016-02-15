<?php
/**
 * Created by PhpStorm.
 * User: jefin
 * Date: 25/01/2016
 * Time: 21:48
 */
namespace ModernWays\Webshop\Model;

class Customer extends \ModernWays\Mvc\Model
{
    private $nickName;
    private $firstName;
    private $lastName;
    private $address1;
    private $address2;
    private $city;
    private $region;
    private $postalCode;
    private $idCountry;
    private $phone;
    private $mobile;
    private $id;

    protected $customerList;

    /**
     * @return mixedp
     */
    public function getNickName()
    {
        return $this->nickName;
    }

    /**
     * @param mixed $nickName
     */
    public function setNickName($nickName)
    {
        if($this->validRequired($nickName, "NickName"))
        {

        }

        $this->nickName = $nickName;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName)
    {
        if($this->validRequired($firstName, "FirstName"))
        {

        }
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName)
    {
        if($this->validRequired($lastName, "LastName"))
        {

        }
    }

    /**
     * @return mixed
     */
    public function getAddress1()
    {
        return $this->address1;
    }

    /**
     * @param mixed $address1
     */
    public function setAddress1($address1)
    {
        if($this->validRequired($address1, "Address1"))
        {

        }
    }

    /**
     * @return mixed
     */
    public function getAddress2()
    {
        return $this->address2;
    }

    /**
     * @param mixed $address2
     */
    public function setAddress2($address2)
    {
        $this->address2 = $address2;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city)
    {
        if($this->validRequired($city, "City"))
        {

        }
    }

    /**
     * @return mixed
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * @param mixed $region
     */
    public function setRegion($region)
    {
        $this->region = $region;
    }

    /**
     * @return mixed
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * @param mixed $postalCode
     */
    public function setPostalCode($postalCode)
    {
        if($this->validRequired($postalCode, "PostalCode"))
        {

        }
    }

    /**
     * @return mixed
     */
    public function getIdCountry()
    {
        return $this->idCountry;
    }

    /**
     * @param mixed $idCountry
     */
    public function setIdCountry($idCountry)
    {
        if($this->validRequired($idCountry, "IdCountry"))
        {

        }
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * @param mixed $mobile
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;
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
    public function getCustomerList()
    {
        return $this->customerList;
    }

    /**
     * @param mixed $customerList
     */
    public function setCustomerList($customerList)
    {
        $this->customerList = $customerList;
    }



}
?>