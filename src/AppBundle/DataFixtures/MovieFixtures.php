<?php 
namespace AppBundle\DataFixtures;

use AppBundle\Entity\Movie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class MovieFixtures extends Fixture 
{
	public function load(ObjectManager $manager)
	{
		$ageForbidden = [3, 7, 10, 12, 16, 18];
		// Create 20 actor:
		for ($i=1; $i<21; $i++){
			shuffle($ageForbidden);
			$movie = new Movie();
			$movie->setTitle('Film numéro ' .$i);
			$movie->setYear(mt_rand(1950, 2019));
			$movie->setAge($ageForbidden[0]);
			$movie->setDescription('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed fugiat velit, illum officia hic non aliquam saepe corporis! Laudantium voluptates libero, molestias qui voluptatem officia debitis, iure sint quam vero?');
			$movie->setDuration(mt_rand(60,300));
			
			$manager->persist($movie);
		}
		$manager->flush();

	}
}