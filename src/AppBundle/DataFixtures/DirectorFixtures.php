<?php 
namespace AppBundle\DataFixtures;

use AppBundle\Entity\Director;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class DirectorFixtures extends Fixture 
{
	public function load(ObjectManager $manager)
	{
		// Create 20 actor:
		for ($i=1; $i<21; $i++){
			$director = new Director();
			$director->setName('Réalisateur numéro ' .$i);
			$manager->persist($director);
		}
		$manager->flush();

	}
}