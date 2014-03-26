<?php
/**
 * Created by PhpStorm.
 * User: thmon
 * Date: 24/03/14
 * Time: 17:44
 */

namespace App\Controller;

use App\Entity\Person;
use Symfony\Component\HttpFoundation\Session\Session;

/**
 * Class PersonsController
 * @package App\Controller
 */
class PersonsController extends Controller
{
    /**
     * @return array
     */
    public function indexAction(array $persons)
    {
        return ['persons' => $persons];
    }

    public function showAction(Person $person)
    {
        return ['person' => $person];
    }

    /**
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function newAction()
    {
        $person = new Person();
        $form = $this->createBoundObjectForm($person, 'new');

        if ($form->isBound() && $form->isValid()) {
            $this->persist($person, true);
            $this->addFlash('success');

            return $this->redirectToRoute('app_persons_index');
        }

        return ['form' => $form->createView()];
    }
} 