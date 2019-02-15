<?php
/**
 * Created by PhpStorm.
 * User: ahmed
 * Date: 2/16/19
 * Time: 12:14 AM
 */

namespace Tests\AppBundle\Entity;


use AppBundle\Entity\AddressBook;
use Symfony\Bundle\FrameworkBundle\Tests\TestCase;

class AddressBookTest extends TestCase
{

    /**
     * @param $firstName
     * @param $lastName
     * @param $street
     * @param $zip
     * @param $city
     * @param $country
     * @param $phone
     * @param $birthday
     * @param $email
     * @param $pic
     * @dataProvider getTestData
     */
    public function testAtttibutes($firstName, $lastName, $street, $zip, $city, $country, $phone, $birthday, $email, $pic)
    {
        $addressBook = new AddressBook();
        $addressBook->setFirstName($firstName);
        $addressBook->setLastName($lastName);
        $addressBook->setStreetAndNumber($street);
        $addressBook->setZip($zip);
        $addressBook->setCity($city);
        $addressBook->setCountry($country);
        $addressBook->setPhoneNumber($phone);
        $addressBook->setBirthday($birthday);
        $addressBook->setEmail($email);
        $addressBook->setPicture($pic);

        $this->assertEquals($firstName, $addressBook->getFirstName());
        $this->assertEquals($lastName, $addressBook->getLastName());
        $this->assertEquals($street, $addressBook->getStreetAndNumber());
        $this->assertEquals($zip, $addressBook->getZip());
        $this->assertEquals($city, $addressBook->getCity());
        $this->assertEquals($country, $addressBook->getCountry());
        $this->assertEquals($phone, $addressBook->getPhoneNumber());
        $this->assertEquals($birthday, $addressBook->getBirthday());
        $this->assertEquals($email, $addressBook->getEmail());
        $this->assertEquals($pic, $addressBook->getPicture());
    }

    public function getTestData(): array
    {
        return [
            ['ahmed',
                'samir',
                '10th district',
                '00202', 'Cairo',
                'Egypt',
                '0025663226',
                new \DateTime(),
                'ahmed@example.com',
                '']
        ];
    }
}