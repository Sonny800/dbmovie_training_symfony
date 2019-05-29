<?php 
namespace AppBundle\DataFixtures;

use AppBundle\Entity\Actor;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ActorFixtures extends Fixture 
{
	public function load(ObjectManager $manager)
	{
		// Create 20 actor:
		for ($i=1; $i<21; $i++){
			$actor = new Actor();
			$actor->setName('Acteur numéro ' .$i);
			$manager->persist($actor);
		}
		$manager->flush();

	}
}