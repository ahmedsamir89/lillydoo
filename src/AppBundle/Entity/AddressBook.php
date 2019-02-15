<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * AddressBook
 *
 * @ORM\Table(name="address_book")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AddressBookRepository")
 */
class AddressBook
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="firstName", type="string", length=255)
     * @Assert\NotBlank
     * @Assert\Type("string")
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="lastName", type="string", length=255)
     * @Assert\NotBlank
     * @Assert\Type("string")
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="streetAndNumber", type="string", length=255)
     * @Assert\NotBlank
     */
    private $streetAndNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="zip", type="string", length=255)
     * @Assert\NotBlank
     */
    private $zip;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255)
     * @Assert\NotBlank
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=255)
     * @Assert\NotBlank
     * @Assert\Country
     */
    private $country;

    /**
     * @var string
     *
     * @ORM\Column(name="phoneNumber", type="string", length=255)
     * @Assert\NotBlank
     */
    private $phoneNumber;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birthday", type="date")
     * @Assert\NotBlank
     * @Assert\Date
     */
    private $birthday;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, unique=true)
     * @Assert\NotBlank
     * @Assert\Email
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="picture", type="string", length=255, nullable=true)
     * @Assert\Image
     */
    private $picture;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }


    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     * @return AddressBook
     */
    public function setFirstName(string $firstName): AddressBook
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     * @return AddressBook
     */
    public function setLastName(string $lastName): AddressBook
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @return string
     */
    public function getStreetAndNumber(): string
    {
        return $this->streetAndNumber;
    }

    /**
     * @param string $streetAndNumber
     * @return AddressBook
     */
    public function setStreetAndNumber(string $streetAndNumber): AddressBook
    {
        $this->streetAndNumber = $streetAndNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getZip(): string
    {
        return $this->zip;
    }

    /**
     * @param string $zip
     * @return AddressBook
     */
    public function setZip(string $zip): AddressBook
    {
        $this->zip = $zip;
        return $this;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param string $city
     * @return AddressBook
     */
    public function setCity(string $city): AddressBook
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @param string $country
     * @return AddressBook
     */
    public function setCountry(string $country): AddressBook
    {
        $this->country = $country;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    /**
     * @param string $phoneNumber
     * @return AddressBook
     */
    public function setPhoneNumber(string $phoneNumber): AddressBook
    {
        $this->phoneNumber = $phoneNumber;
        return $this;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getBirthday(): \DateTimeInterface
    {
        return $this->birthday;
    }

    /**
     * @param \DateTimeInterface $birthday
     * @return AddressBook
     */
    public function setBirthday(\DateTimeInterface $birthday): AddressBook
    {
        $this->birthday = $birthday;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return AddressBook
     */
    public function setEmail(string $email): AddressBook
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getPicture(): string
    {
        return $this->picture;
    }

    /**
     * @param string $picture
     * @return AddressBook
     */
    public function setPicture(string $picture): AddressBook
    {
        $this->picture = $picture;
        return $this;
    }
    
}

