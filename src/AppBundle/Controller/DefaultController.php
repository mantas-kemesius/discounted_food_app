<?php

namespace AppBundle\Controller;

use AppBundle\Service\MapGenerator;
use Faker\Factory;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        return $this->render('default/index.html.twig');
    }

    /**
     * @Route("/map", name="map")
     */
    public function mapAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $address_repository = $em->getRepository('AppBundle:Address');

        $addresses = $address_repository->findAll();
//        var_dump($addresses);die;
        $mapGenerator = new MapGenerator();
        $map = $mapGenerator->generateMap($addresses);

        return $this->render('Map/index.html.twig', array(
            'map' => $map
        ));
    }

    /**
     * @Route("/about", name="about")
     */
    public function aboutAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('About/about.html.twig');
    }

    /**
     * @Route("/faker", name="faker")
     */
    public function fakerAction(Request $request)
    {
        $faker = Factory::create();

        for ($i = 0; $i < 10; $i++) {
            echo $faker->name.'<br>';
        }

        die;
    }

    public function registerAction()
    {
        return $this->redirectToRoute('homepage');
    }

}
