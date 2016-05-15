<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        

        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
        ]);
    }

    /**
     * @Route("/login", name="Admin Login")
     */
    public function adminLogin()
    {
        $templating = $this->container->get("templating");
        $html = $templating->render('default/login.html.twig');

        return new Response($html);
    }

    /**
     * @Route("/new_fault", name="New Fault")
     */
    public function newFault()
    {
        $templating = $this->container->get('templating');
        $html = $templating->render("default/newfault.html.twig");

        $connect = mysqli_connect();
        

        return new Response($html);
    }
    
    public function mysqlTest()
    {
        
    }
}
