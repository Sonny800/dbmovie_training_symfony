<?php 
namespace AppBundle\Entity;
 use Doctrine\ORM\Mapping as ORM;
 use Doctrine\Common\Collections\ArrayCollection;


 /**
  * @ORM\Entity
  * @ORM\Table(name="rate")
  */
 class Rate 
 {
 	/**
 	 * @ORM\Column(type="integer")
 	 * @ORM\Id
 	 * @ORM\GeneratedValue(strategy="AUTO")
 	 */
 	private $id;

 	/**
 	 * @ORM\Column(type="smallint")
 	 */
 	private $rate;

 	/**
 	 * @ORM\ManyToOne(targetEntity="Movie", inversedBy="rates")
 	 */
 	private $movie;
 	
 
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
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * @param mixed $rate
     *
     * @return self
     */
    public function setRate($rate)
    {
        $this->rate = $rate;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getMovie()
    {
        return $this->movie;
    }

    /**
     * @param mixed $movies
     *
     * @return self
     */
    public function setMovie($movie)
    {
        $this->movie = $movie;

        return $this;
    }
}