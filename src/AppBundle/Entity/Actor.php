<?php 

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

use AppBundle\Entity\Movie;


/**
 * @ORM\Entity
 * @ORM\Table(name="actor")
 */
class Actor
{
	/**
	 * @ORM\Column(type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;

	/**
	 * @ORM\Column(type="string", length=35)
	 */
	private $name;

    /**
     * @ORM\ManyToMany(targetEntity="Movie", mappedBy="actors")
     */
    private $movies;
    public function __construct()
    {
        $this->movies = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }
     /**
     * @return mixed
     */
    public function getMovies()
    {
        return $this->movies;
    }

    /**
     * @return mixed
     */
    public function addMovie(Movie $movie)
    {
        $this->movies[] = $movie;
        
        return $this;
    }

    /**
     * @param mixed $name
     *
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
}