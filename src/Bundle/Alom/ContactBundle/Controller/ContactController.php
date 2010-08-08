<?php

namespace Bundle\Alom\ContactBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller;
use Symfony\Components\HttpFoundation\Response;

/**
 * Contact controller
 *
 * @author     Alexandre Salomé <alexandre.salome@gmail.com>
 */
class ContactController extends Controller
{
    /**
     * Edit a contact message
     */
    public function editAction()
    {
        return $this->render('ContactBundle:Contact:edit');
    }

    /**
     * Save a contact message
     */
    public function saveAction($contact)
    {
        $handler = $this->container->get('contact.handler');
        $handler->persistAndSend($contact);

        return $this->redirect('ContactBundle:Contact:confirmation');
    }

    /**
     * Confirm a sent message
     */
    public function confirmationAction()
    {
        return $this->render('ContactBundle:Contact:confirmation');
    }
}

class Contact
{
    public function getEmail()
    {
        return 'alexandre.salome@gmail.com';
    }
    public function getFullname()
    {
        return 'Alexandre Salomé';
    }
}