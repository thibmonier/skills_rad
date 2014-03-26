<?php
/**
 * Created by PhpStorm.
 * User: thmon
 * Date: 24/03/14
 * Time: 17:44
 */

namespace App\Controller;

use App\Entity\Technology;
use Symfony\Component\HttpFoundation\Session\Session;

/**
 * Class ProjectsController
 * @package App\Controller
 */
class TechnologiesController extends Controller
{
    /**
     * @param array $technologies
     * @return array
     */
    public function indexAction(array $technologies)
    {
        return ['technologies' => $technologies];
    }

    public function showAction(Technology $technology)
    {
        return ['technology' => $technology];
    }

    /**
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function newAction()
    {
        $technology = new Technology();
        $form = $this->createBoundObjectForm($technology, 'new');

        if ($form->isBound() && $form->isValid()) {
            $this->persist($technology, true);
            $this->addFlash('success');

            return $this->redirectToRoute('app_technologies_index');
        }

        return ['form' => $form->createView()];
    }
} 