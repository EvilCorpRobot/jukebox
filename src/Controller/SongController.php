<?php

namespace App\Controller;

use App\Entity\Songs;
use App\Repository\SongsRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Request;

class SongController extends AbstractController
{

    private $repository;
    /**
     * @var ObjectManager
     */
    private $em;
 
    public function __construct(SongsRepository $repository, EntityManagerInterface $em)
    {
        $this->repository = $repository;
        $this->em = $em;
    }
    
    #[Route('/song', name: 'app_song')]
    public function index(): Response
    {
        
        return $this->render('song/index.html.twig', [
            'controller_name' => 'SongController',
        ]);
    }

    #[Route("/song/add", name:"song_add", methods:["POST"])]
    public function add(Request $request)
    {
        $song = new Songs();
        $song->setName($request->get("name"));
        $song->setUrlSong("/url");
        $song->setUrlImage("/url");
        $song->setTypeSong($request->get("type"));
        $this->em->persist($song);
        $this->em->flush();
        return new Response(json_encode(array("res", "ok")));
    }
}
