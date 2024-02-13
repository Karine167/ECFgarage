<?php 
namespace App\DataFixtures;

use App\Entity\Contact;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;


class AppFixtures extends Fixture
{

    public function load(ObjectManager $manager):void
    {
        
        // create  contacts
        for ($i = 0; $i < 5; $i++) {
            $contact = new Contact();
            $contact->setFirstName('FirstName'.$i);
            $contact->setLastName('LastName'.$i);
            $contact->setEmail('email'.$i.'@test.com');
            $contact->setTelephon('0'.$i.'356'.$i.'480'.$i);
            $contact->setContent('Demande de contact n°'. ($i+1));
            $contact->setAcceptance('true');
            $manager->persist($contact);
        }

        $manager->flush();
    }
}