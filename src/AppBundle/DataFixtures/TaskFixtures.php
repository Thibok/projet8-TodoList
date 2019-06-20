<?php

/**
 * Task Fixtures
 */

namespace AppBundle\DataFixtures;

use AppBundle\Entity\Task;
use AppBundle\DataFixtures\UserFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

/**
 * TaskFixtures
 */
class TaskFixtures extends Fixture implements DependentFixtureInterface
{
    /**
     * Load fixtures
     * @access public
     * @param ObjectManager $manager
     * 
     * @return void
     */
    public function load(ObjectManager $manager): void
    {
        $taskForUpdate = new Task;
        $taskForUpdate->setTitle('Need update');
        $taskForUpdate->setContent('Bad content');
        $taskForUpdate->setUser($this->getReference(UserFixtures::MAIN_USER_TEST_REFERENCE));

        $taskBadValues = new Task;
        $taskBadValues->setTitle('Best task');
        $taskBadValues->setContent('Best content');
        $taskBadValues->setUser($this->getReference(UserFixtures::MAIN_USER_TEST_REFERENCE));

        $manager->persist($taskForUpdate);
        $manager->persist($taskBadValues);
        $manager->flush();
    }

    /**
     * @inheritDoc
     */
    public function getDependencies(): array
    {
        return array(
            UserFixtures::class,
        );
    }
}