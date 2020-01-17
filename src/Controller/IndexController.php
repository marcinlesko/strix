<?php
namespace App\Controller;

use App\ViewRepository\Trips;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class IndexController extends AbstractController
{
    /**
     * @var Trips
     */
    private $trips;

    /**
     * @param Trips $trips
     */
    public function __construct(Trips $trips)
    {
        $this->trips = $trips;
    }

    /**
     * @Route("/", name="index")
     */
    public function indexAction()
    {
        return $this->render('average_speed_table.twig', [
            'trips' => $this->trips->getAll()
        ]);
    }
}
