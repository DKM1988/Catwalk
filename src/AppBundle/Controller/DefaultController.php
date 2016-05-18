<?php

namespace AppBundle\Controller;

use Doctrine\DBAL\Driver\PDOException;
use Doctrine\DBAL\Exception\ConnectionException;
use mysqli_sql_exception;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $status = $this->mysqlConn();
        
        return $this->render('default/index.html.twig',
            array(
                'status' => $status
            )
        );

        // replace this example code with whatever you need
        //return $this->render('default/index.html.twig', [
        //    'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
        //]);
    }

    /**
     * @Route("/new_fault", name="NewFault")
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
        //Test Database Connection
        $conn = $this->get('database_connection');
        try {
            $conn->connect();
            $status = "Online!";

        } catch (ConnectionException $ex) {
            $status = "Could not Connect!";

        }
        return $status;
    }

}
