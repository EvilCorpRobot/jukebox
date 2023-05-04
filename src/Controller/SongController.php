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
    
    #[Route('/song', name: 'song')]
    public function index(): Response
    {
        $songs = $this->em->getRepository(Songs::class)->findAll();
        return $this->render('song/index.html.twig', array(
            'songs' => $songs
        ));
    }

    #[Route("/song/add", name:"song_add", methods:["POST"])]
    public function add(Request $request)
    {
        $song = new Songs();
        $song->setName($request->get("name"));

        
        $file_song = $request->files->get("file_song");
        $fileName_song = uniqid().'.'.$file_song->guessExtension();
        $file_song->move("song", $fileName_song);
        $song->setUrlSong("/song/" . $fileName_song);

        $file_image = $request->files->get("file_image");
        $fileName_image = uniqid().'.'.$file_image->guessExtension();
        $file_image->move("images", $fileName_image);

        $song->setUrlImage("/images/" . $fileName_image);
        $song->setTypeSong($request->get("type_song"));
        $this->em->persist($song);
        $this->em->flush();
        return $this->redirectToRoute("song");

    }

    #[Route("/song/remove/{id}", name:"song_remove", methods:["GET"])]
    public function remove(Request $request, int $id) {
        $song = $this->em->getRepository(Songs::class)->find($id);
        $this->em->remove($song);
        $this->em->flush();
        return $this->redirectToRoute("song");
        
    }
}
