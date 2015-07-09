<?php

namespace Bankrot\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="home", defaults={"page": 0})
     * @Route("/page{page}", name="home_paged", requirements={"page": "\d+"})
     * @Template()
     */
    public function indexAction($page)
    {
        $lots = $this->getDoctrine()
            ->getRepository('BankrotParserBundle:Lot')
            ->findBy([], ['createdAt' => 'DESC'], 10, 10 * $page);

        return [
            'lots' => $lots,
            'page' => $page,
        ];
    }

    /**
     * @Route("/calend", name="calend")
     * @Template()
     */
    public function calendAction()
    {
        return [];
    }
}
