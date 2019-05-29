<?php 

namespace AppBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

use AppBundle\Entity\Actor;

/**
 * @ORM\Entity
 * @ORM\Table(name="movie")
 */
class Movie
{
	/**
	 * @ORM\Column(type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;

	/**
	 * @ORM\Column(type="string", length=60)
	 */
	private $title;

	/**
	 * @ORM\Column(type="string", length=4)
	 */
	private $year;

	/**
	 * @ORM\Column(type="smallint")
	 */
	private $age;

	/**
	 * @ORM\Column(type="text")
	 */
	private $description;

	/**
	 * @ORM\Column(type="text", length=10)
	 */
	private $duration;

    /**
     * @ORM\OneToMany(targetEntity="Rate", mappedBy="movie", cascade={"persist"})
     */
    private $rates;

    /**
     * @ORM\ManyToMany(targetEntity="Actor", inversedBy="movies", cascade={"persist"})
     */
    private $actors;
    public function __construct()
    {
        $this->actors = new ArrayCollection();
		$this->genres = new ArrayCollection();
        $this->rates = new ArrayCollection();
    }

	/**
	 * @ORM\ManyToMany(targetEntity="Genre", inversedBy="movies", cascade={"persist"})
	 */
	private $genres;
	
	/**
     * @param mixed $genres
     *
     * @return self
     */
    public function addGenre(Genre $genre)
    {
        $this->genres[] = $genre;
        // Infirmier la relation inverse
        $genre->addMovie($this);

        return $this;
    }
     /**
     * @return mixed
     */
    public function addActor(Actor $actor)
    {
        $this->actors[] = $actor;
        $actor->addMovie($this);
        return $this;
    }

    /**
     * @return mixed
     */
    public function addRate(Rate $rate)
    {
        $this->rates[] = $rate;
        $rate->addMovie($this);
        return $this;
    }

	/**
	 * @ORM\ManyToOne(targetEntity="Director", inversedBy="movies", cascade={"persist"})
	 */
	private $director;

	/**
	 * @ORM\ManyToOne(targetEntity="Distributor", inversedBy="movies", cascade={"persist"})
	 */
	private $distributor;

    

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
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     *
     * @return self
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @param mixed $year
     *
     * @return self
     */
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param mixed $age
     *
     * @return self
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     *
     * @return self
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * @param mixed $duration
     *
     * @return self
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getGenres()
    {
        return $this->genres;
    }

    /**
     * @param mixed $genres
     *
     * @return self
     */
    public function setGenres($genres)
    {
        $this->genres = $genres;

        return $this;
    }
    

    /**
     * @return mixed
     */
    public function getDirector()
    {
        return $this->director;
    }

    /**
     * @return mixed
     */
    public function getActors()
    {
        return $this->actors;
    }
    
    /**
     * @return mixed
     */
    public function getRates()
    {
        return $this->rates;
    }
    

    /**
     * @param mixed $director
     *
     * @return self
     */
    public function setDirector($director)
    {
        $this->director = $director;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDistributor()
    {
        return $this->distributor;
    }

    /**
     * @param mixed $distributor
     *
     * @return self
     */
    public function setDistributor($distributor)
    {
        $this->distributor = $distributor;

        return $this;
    }
}