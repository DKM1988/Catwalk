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
     * @Route("/new_fault", name="New Fault")
     */
    public function newFault()
    {
        $templating = $this->container->get('templating');
        $html = $templating->render("default/newfault.html.twig");
        //test mysql connection
        //$state = $this->mysqlConn();
        
        return new Response($html);

    }

    public function mysqlConn()
    {
        $mysqli = mysqli_connect('elrond.aserv.co.za', 'mynethqk_admin', 'Zeyao=Ecmho8', 'mynethqk_catwalk');

        if ($mysqli->connect_error)
        {
            $state = "Failed to connect: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }
        else 
        {
            $state = $mysqli->host_info;
        }
        
        return($state);

    }

}
