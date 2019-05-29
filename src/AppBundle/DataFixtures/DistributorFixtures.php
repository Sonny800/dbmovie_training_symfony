<?php 
namespace AppBundle\DataFixtures;

use AppBundle\Entity\Distributor;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class DistributorFixtures extends Fixture 
{
	public function load(ObjectManager $manager)
	{
		// Create 20 actor:
		for ($i=1; $i<21; $i++){
			$distributor = new Distributor();
			$distributor->setName('Distributeur numéro ' .$i);
			$manager->persist($distributor);
		}
		$manager->flush();

	}
}