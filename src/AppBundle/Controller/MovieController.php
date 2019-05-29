<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Doctrine\ORM\EntityManagerInterface;

use AppBundle\Entity\Movie;
use AppBundle\Entity\Distributor;
use AppBundle\Entity\Actor;
use AppBundle\Entity\Director;
use AppBundle\Entity\Genre;

class MovieController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
    	$movies = $this->getDoctrine()->getRepository(Movie::class)->findAll();
    	$genres = $this->getDoctrine()->getRepository(Genre::class)->findAll();
    	// var_dump($movies);
        // replace this example code with whatever you need
        return $this->render('movie/index.html.twig', [
        	'movies' => $movies,
        	'genres' => $genres,
        	 ]);
    }

    /**
     * @Route("/create/movie", name="create_movie")
     */
    public function createAction(EntityManagerInterface $em)
    {
        $ageForbidden = [3, 7, 10, 12, 16, 18];

        // DISTRIBUTOR
        $distributor = new Distributor();
        $distributor->setName('Sony');
        // DIRECTOR
        $director = new Director();
        $director->setName('Jean Jacques');
        // ACTOR
        $actor = new Actor();
        $actor->setName('Cassie');

        // Genre
        $genre = new Genre();
        $genre->setName('Thriller');

        // MOVIE
        $movie = new Movie();
        $movie->setTitle('Ample');
        $movie->setDescription('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Totam sint, impedit dignissimos voluptatum fuga at eum, sequi repudiandae, alias quibusdam neque? Enim ducimus a, eveniet reiciendis voluptatibus sint quos architecto!');
        $movie->setDuration(mt_rand(70,180));
        $movie->setAge($ageForbidden[array_rand($ageForbidden)]);
        $movie->setYear(mt_rand(1950, 2019));
        $movie->setDistributor($distributor);
        $movie->setDirector($director);

        // Si je veux un film existant et ajouté un acteur et genre à ce film : 
        // $movie = $this->getDoctrine()->getRepository(Movie::class)->find(2);
        $movie->addGenre($genre);
        $movie->addActor($actor);
        dump($movie);
        


        $em->persist($movie);
       
        $em->flush();

        return new Response('<body>Film crée </body>');
    }

    /**
     * @Route("/show/{id}", name="movie_show")
     */
    public function showAction(Movie $movie)
    {
        return $this->render('movie/show.html.twig', [
            'movie' => $movie 
        ]);
    }
}
