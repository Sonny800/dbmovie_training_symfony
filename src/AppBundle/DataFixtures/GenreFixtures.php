<?php 
namespace AppBundle\DataFixtures;

use AppBundle\Entity\Genre;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class GenreFixtures extends Fixture 
{
	public function load(ObjectManager $manager)
	{
		// Create 20 actor:
		for ($i=1; $i<21; $i++){
			$genre = new Genre();
			$genre->setName('Genre numéro ' .$i);
			$manager->persist($genre);
		}
		$manager->flush();

	}
}