<?php
/**
 * Created by PhpStorm.
 * User: maybourne
 * Date: 31/07/16
 * Time: 22:49
 */
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\ProfileType;
use AppBundle\Entity\Profile;

class MainController extends Controller
{

    /**
     * @Route("/", name="app_menu")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('@App/menu/menu.html.twig', []);
    }

    /**
     * @Route("/profile/show", name="app_profile_show")
     */
    public function showProfileAction(Request $request)
    {
        $form = $this->createForm(ProfileType::class);

        // replace this example code with whatever you need
        return $this->render('@App/menu/profile.html.twig', [
            'form' => $form->createView(),
            'disabled' => true
        ]);
    }

    /**
     * @Route("/profile/edit", name="app_profile_edit")
     *
     * @method ({"GET", "POST"})
     */
    public function editProfileAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $profile = $em->find('AppBundle\Entity\Profile', 1);

        if (!$profile) {
            $profile = new Profile();
        }
        $form = $this->createForm(ProfileType::class, $profile);

        $form->handleRequest($request);

        if ($request->isMethod('POST')) {
            if ($form->isValid()) {
                $em->persist($profile);
                $em->flush();
            }
        }

        return $this->render('@App/menu/profile.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/dashboard", name="app_dashboard")
     */
    public function showDashboardAction(Request $request)
    {
        return $this->render('@App/menu/dashboard.html.twig', []);
    }

    /**
     * @Route("/settings/show", name="app_settings_show")
     */
    public function showSettingsAction(Request $request)
    {
        return $this->render('@App/menu/settings.html.twig', []);
    }

    /**
     * @Route("/settings/edit", name="app_settings_edit")
     */
    public function editSettingsAction(Request $request)
    {
        return $this->render('@App/menu/settings.html.twig', []);
    }
}