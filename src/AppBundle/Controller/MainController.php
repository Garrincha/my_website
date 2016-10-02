<?php
/**
 * Created by PhpStorm.
 * User: maybourne
 * Date: 31/07/16
 * Time: 22:49
 */

namespace AppBundle\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class MainController extends Controller
{
    /**
     * @Route("/", name="app_menu")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('@App/menu/menu.html.twig',[]);
    }

    /**
     * @Route("/profile", name="app_profile")
     */
    public function editProfileAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('@App/menu/profile.html.twig',[]);
    }

    /**
     * @Route("/dashboard", name="app_dashboard")
     */
    public function showDashboardAction(Request $request)
    {
        $form = $this->createForm(ProfileType::class);

    	// replace this example code with whatever you need
    	return $this->render('@App/menu/dashboard.html.twig',[
    	    'form' => $form->createView()
    	]);
    }
}