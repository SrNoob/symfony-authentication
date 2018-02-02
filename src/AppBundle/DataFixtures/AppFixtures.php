<?php
/**
 * Created by PhpStorm.
 * User: herry
 * Date: 2/2/2018
 * Time: 4:23 PM
 */

namespace AppBundle\DataFixtures;


use AppBundle\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class AppFixtures extends Fixture implements ContainerAwareInterface
{
    private $container;
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {

        // TODO: Implement load() method.

        $user = new User();
        $user->setUsername('admin');
        $user->setEmail('admin@phpnoob.tk');

        $encoder=$this->container->get('security.password_encoder');
        $password =$encoder->encodePassword($user,'123456');
        $user->setPassword($password);

        $user2 = new User();
        $user2->setUsername('admin2');
        $user2->setEmail('admin2@phpnoob.tk');

        $encoder=$this->container->get('security.password_encoder');
        $password =$encoder->encodePassword($user2,'123456');
        $user2->setPassword($password);

        $manager->persist($user);
        $manager->persist($user2);
        $manager->flush();

    }

    public function setContainer(ContainerInterface $container = null)
    {
        // TODO: Implement setContainer() method.
        $this->container=$container;
    }
}