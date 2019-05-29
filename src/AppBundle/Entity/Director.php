<?php 
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * @ORM\Entity
 * @ORM\Table(name="director")
 */
class Director 
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
	 * @ORM\OneToMany(targetEntity="Movie", mappedBy="director")
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
     * @param mixed $name
     *
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getMovies()
    {
        return $this->movies;
    }

    /**
     * @param mixed $movies
     *
     * @return self
     */
    public function addMovie(Movie $movie)
    {
        $this->movies[] = $movie;
        $movie->setDirector($this);

        return $this;
    }
    
}