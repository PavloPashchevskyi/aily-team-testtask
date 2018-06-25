<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Link;

class LoadLinkData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $link1 = new Link();
        $link1->setOriginal('https://habr.com/company/badoo/blog/358582/');
        $link1->setShort('http://loca.ly/RT45q');
        $link1->setLifetimeTo(\DateTime::createFromFormat('d.m.Y H:i', '12.12.2018 09:00'));
        $link1->setActive(true);
        $manager->persist($link1);
        $this->addReference('reference-link1', $link1);

        $link2 = new Link();
        $link2->setOriginal('https://habr.com/post/358564/');
        $link2->setShort('http://loca.ly/3Opl1');
        $manager->persist($link2);
        $this->addReference('reference-link2', $link2);

        $manager->flush();
    }

    public function getOrder()
    {
        return 1;
    }
}
