<?php
/**
 * Created by PhpStorm.
 * User: thmon
 * Date: 24/03/14
 * Time: 17:44
 */

namespace App\Controller;

use App\Entity\Tag;


/**
 * Class TagsController
 * @package App\Controller
 */
class TagsController extends Controller
{
    /**
     * @param array $tags
     * @return array
     */
    public function indexAction(array $tags)
    {
        return ['tags' => $tags];
    }

    /**
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function newAction()
    {
        $tag = new Tag();
        $form = $this->createBoundObjectForm($tag, 'new');

        if ($form->isBound() && $form->isValid()) {
            $this->persist($tag, true);
            $this->addFlash('success');

            return $this->redirectToRoute('app_tags_index');
        }

        return ['form' => $form->createView()];
    }
} 