<?php

namespace AppBundle\Controller;

use AppBundle\Entity\AddressBook;
use AppBundle\Form\AddressBookType;
use AppBundle\Repository\AddressBookRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Translation\TranslatorInterface;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * @param EntityManagerInterface $entityManager
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(EntityManagerInterface $entityManager, Request $request)
    {
        $query = $entityManager->createQuery("SELECT a FROM " . AddressBook::class . " a");
        $pagination = $this->get('knp_paginator')->paginate($query, $request->query->getInt('page', 1), 10);
        return $this->render('default/index.html.twig', [
            'addresses' => $pagination
        ]);
    }

    /**
     * @param Request $request
     * @param TranslatorInterface $translator
     * @Route("/new", name="create_new_address")
     * @param EntityManagerInterface $entityManager
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function newAction(Request $request, TranslatorInterface $translator, EntityManagerInterface $entityManager)
    {
        $form = $this->createForm(AddressBookType::class);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($form->getData());
            $entityManager->flush();
            $this->addFlash('success', $translator->trans('address_create'));
            return $this->redirectToRoute('homepage');
        }
        return $this->render("default/new.html.twig", [
            'form' => $form->createView()
        ]);
    }


    /**
     * @param AddressBook $addressBook
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @Route("/address/{id}/edit", name="address_edit")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function editAction(AddressBook $addressBook, Request $request, EntityManagerInterface $entityManager, TranslatorInterface $translator)
    {
        $image = $addressBook->getPicture();
        $form = $this->createForm(AddressBookType::class, $addressBook);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            if(empty($addressBook->getPicture())) {
                $addressBook->setPicture($image);
            }
            $entityManager->persist($addressBook);
            $entityManager->flush();
            $this->addFlash('success', $translator->trans('address_edit'));
            return $this->redirectToRoute('homepage');
        }
        return $this->render("default/edit.html.twig", [
            'form' => $form->createView(),
            'address' => $addressBook
        ]);
    }

    /**
     * @Route("/address/{id}/delete", name="address_delete")
     * @param AddressBook $addressBook
     * @param EntityManagerInterface $entityManager
     * @param TranslatorInterface $translator
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deleteAction(AddressBook $addressBook, EntityManagerInterface $entityManager, TranslatorInterface $translator)
    {
        $entityManager->remove($addressBook);
        $entityManager->flush();
        $this->addFlash('success', $translator->trans('address_edit'));
        return $this->redirectToRoute('homepage');
    }
}
