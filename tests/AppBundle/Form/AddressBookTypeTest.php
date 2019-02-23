<?php

namespace Tests\AppBundle\Form;


use AppBundle\Entity\AddressBook;
use AppBundle\Form\AddressBookType;
use Symfony\Component\Form\Test\TypeTestCase;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Intl\Intl;

class AddressBookTypeTest extends TypeTestCase
{

    public function testSubmitValidData()
    {
        $formData = [
            'firstName' => 'Ahmed',
            'lastName' => 'Samir',
            'streetAndNumber' => 'Samir',
            'zip' => '545+6666',
            'city' => 'Cairo',
            'country' => 'CA',
            'phoneNumber' => '1222222222',
            'birthday' => [
                'year' => 1989,
                'month' => 5,
                'day' => 1
            ],
            'email' => 'xx@xx.com',
        ];
        $address = new AddressBook();
        $form = $this->factory->create(AddressBookType::class, $address);

        $newAddress = new AddressBook();
        $newAddress->setLastName($formData['lastName']);
        $newAddress->setFirstName($formData['firstName']);
        $newAddress->setStreetAndNumber($formData['streetAndNumber']);
        $newAddress->setCountry($formData['country']);
        $newAddress->setCity($formData['city']);
        $newAddress->setPhoneNumber($formData['phoneNumber']);
        $date = new \DateTime( );
        $date->setDate($formData['birthday']['year'], $formData['birthday']['month'], $formData['birthday']['day']);
        $date->setTime(00, 0, 0);
        $newAddress->setBirthday($date);
        $newAddress->setZip($formData['zip']);
        $newAddress->setEmail($formData['email']);

        $form->submit($formData);

        $this->assertTrue($form->isSynchronized());
        $this->assertTrue($form->isSubmitted());
        $this->assertEquals($newAddress, $address);
        $view = $form->createView();
        $children = $view->children;

        foreach (array_keys($formData) as $key) {
            $this->assertArrayHasKey($key, $children);
        }
    }

}