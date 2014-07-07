<?php
/**
 * Created by PhpStorm.
 * User: thmon
 * Date: 24/03/14
 * Time: 17:44
 */

namespace App\Controller;

use App\Entity\Project;

/**
 * Class ProjectsController
 * @package App\Controller
 */
class ProjectsController extends Controller
{
    /**
     * @param  array $projects
     * @return array
     */
    public function indexAction(array $projects)
    {
        return ['projects' => $projects];
    }

    /**
     * @param Project $project
     * @return array
     */
    public function showAction(Project $project)
    {
        return ['project' => new Project];
    }

    /**
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function newAction()
    {
        $project = new Project();
        $form = $this->createBoundObjectForm($project, 'new');

        if ($form->isBound() && $form->isValid()) {
            $this->persist($project, true);
            $this->addFlash('success');

            return $this->redirectToRoute('app_projects_index');
        }

        return ['form' => $form->createView()];
    }

    /**
     * @param Project $project
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function editAction(Project $project)
    {
        $form = $this->createBoundObjectForm($project, 'edit');

        if ($form->isBound() && $form->isValid()) {
            $this->persist($project, true);
            $this->addFlash('success');

            return $this->redirectToRoute('app_projects_index');
        }

        return ['form' => $form->createView()
            , 'project' => $project];
    }
} 