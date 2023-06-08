<?php

namespace App\DataFixtures;

use App\Entity\Propriete;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BookFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i <= 100; ++$i) {
            $livre = new Propriete();
            $livre->setAuteur("Charles Dickens Charles");
            $livre->setDepositaire("olivier-du-59");
            $livre->setImage("https://upload.wikimedia.org/wikipedia/commons/thumb/a/aa/Dickens_Gurney_head.jpg/800px-Dickens_Gurney_head.jpg");
            $livre->setLivre("Chemin relatif sur le serveur");
            if ($i%2 == 0) {
                $livre->setNombreEtoiles(2);
            }
            else {
                $livre->setNombreEtoiles(3);
            }
            $livre->setNombrePages(74);
            $livre->setPremierePage("CANTIQUE DE NOËL EN PROSE. PREMIER COUPLET. Le spectre de Marley. Marley était mort, pour commencer. Là-dessus, pas l’ombre d’un doute. Le registre mortuaire était signé par le ministre, le clerc, l’entrepreneur des pompes funèbres et celui qui avait mené le deuil. Scrooge l’avait signé, et le nom de Scrooge était bon à la bourse, quel que fût le papier sur lequel il lui plût d’apposer sa signature. Le vieux Marley était aussi mort qu’un clou de porte [1] . Attention ! je ne veux pas dire que je sache par moi-même ce qu’il y a de particulièrement mort dans un clou de porte. J’aurais pu, quant à moi, me sentir porté plutôt à regarder un clou de cercueil comme le morceau de fer le plus mort qui soit dans le commerce ; mais la sagesse de nos ancêtres éclate dans les similitudes, et mes mains profanes n’iront pas toucher l’arche sainte ; autrement le pays est perdu. Vous me permettrez donc de répéter avec énergie que Marley était aussi mort qu’un clou de porte. Scrooge savait-il qu’il fût mort ? Sans contredit. Comment aurait-il pu en être autrement ? Scrooge et lui étaient associés depuis je ne sais combien d’années. Scrooge était son seul exécuteur testamentaire, le seul administrateur de son bien, son seul ayant cause, son seul légataire universel, son unique ami, le seul qui eût suivi son convoi. Quoiqu’à dire vrai, il ne fût pas si terriblement bouleversé par ce triste événement, qu’il ne se montrât un habile homme d’affaires le jour même des funérailles et qu’il ne l’eût solennisé par un marché des plus avantageux.");
            $livre->setResume("Po comprit kes ke sa parle...");
            $livre->setTitre("De Noël, un conte (1843)");

            $manager->persist($livre);
        }
        $manager->flush();
    }

}