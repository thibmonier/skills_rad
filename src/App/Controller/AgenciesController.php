<?php
/**
 * Created by PhpStorm.
 * User: thmon
 * Date: 24/03/14
 * Time: 17:44
 */

namespace App\Controller;

use App\Entity\Agency;
use Symfony\Component\HttpFoundation\Session\Session;

/**
 * Class AgenciesController
 * @package App\Controller
 */
class AgenciesController extends Controller
{
    /**
     * @return array
     */
    public function indexAction(array $agencies)
    {
        return ['agencies' => $agencies];
    }

    public function showAction(Agency $agency)
    {
        return ['$agency' => $agency];
    }

    /**
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function newAction()
    {
        $agency = new Agency();
        $form = $this->createBoundObjectForm($agency, 'new');

        if ($form->isBound() && $form->isValid()) {
            $this->persist($agency, true);
            $this->addFlash('success');

            return $this->redirectToRoute('app_agencies_index');
        }

        return ['form' => $form->createView()];
    }
} 