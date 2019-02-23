<?php
/**
 * Created by PhpStorm.
 * User: ahmed
 * Date: 2/16/19
 * Time: 2:20 AM
 */

namespace AppBundle\EventListener;


namespace AppBundle\EventListener;

use AppBundle\Entity\AddressBook;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\File\File;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use AppBundle\Service\FileUploader;

class AddressImageUploadListener
{
    private $uploader;
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(FileUploader $uploader, EntityManagerInterface $entityManager)
    {
        $this->uploader = $uploader;
        $this->entityManager = $entityManager;
    }

    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        $this->uploadFile($entity);
    }

    public function preUpdate(PreUpdateEventArgs $args)
    {
        $entity = $args->getEntity();

        if (!$entity instanceof AddressBook) {
            return;
        }

        $this->uploadFile($entity);
    }

    public function postLoad(LifecycleEventArgs $args)
    {

    }


    private function uploadFile($entity)
    {
        // upload only works for Product entities
        if (!$entity instanceof AddressBook) {
            return;
        }

        $file = $entity->getPicture();
        // only upload new files
        if ($file instanceof UploadedFile) {
            $fileName = $this->uploader->upload($file);
            $entity->setPicture($fileName);
        } elseif ($file instanceof File) {
            // prevents the full file path being saved on updates
            // as the path is set on the postLoad listener
            $entity->setPicture($file->getFilename());
        }
    }
}