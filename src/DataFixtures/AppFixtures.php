<?php

namespace App\DataFixtures;

use App\Entity\Units;
use App\Entity\User;
use App\Factory\FileCatalogueFactory;
use App\Factory\UserFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    private FileCatalogueFactory $fileCatalogueFactory;

    private UserFactory $userFactory;

    public function __construct(FileCatalogueFactory $fileCatalogueFactory, UserFactory $userFactory)
    {
        $this->fileCatalogueFactory = $fileCatalogueFactory;
        $this->userFactory = $userFactory;
    }

    public function load(ObjectManager $manager): void
    {
        $user1 = $this->userFactory->factoryMethod('luke@luke.pl', 'luke', true);

        $user2 = $this->userFactory->factoryMethod('84377@g.elearn.uz.zgora.pl','mustach');

        $unit1 = new Units('szt');
        $unit2 = new Units('100szt');
        $unit3 = new Units('1000szt');
        $unit4 = new Units('opk');
        $unit5 = new Units('kpl');
        $unit6 = new Units('kg');
        $unit7 = new Units('t');
        $unit8 = new Units('m');
        $unit9 = new Units('mb');
        $unit10 = new Units('l');
        $unit11 = new Units('ml');
        $unit12 = new Units('ml');

        $fileCatalogue1 = $this->fileCatalogueFactory->factoryMethod(
            'Róża czerwona Europeana',
            '4237',
            188,
            14.93,
            $unit1);
        $fileCatalogue2 = $this->fileCatalogueFactory->factoryMethod(
            'Róża żółta Golden Border',
            '5233',
            68,
            16.88,
            $unit1);
        $fileCatalogue3 = $this->fileCatalogueFactory->factoryMethod(
            'Róża fioletowa Indigoletta',
            '5244',
            51,
            16.12,
            $unit1);
        $fileCatalogue4 = $this->fileCatalogueFactory->factoryMethod(
            'Róża różowa Hansa',
            '5251',
            61,
            15.90,
            $unit1);
        $fileCatalogue5 = $this->fileCatalogueFactory->factoryMethod(
            'Róża różowa Margo Koster',
            '5253',
            8,
            20.41,
            $unit1);
        $fileCatalogue6 = $this->fileCatalogueFactory->factoryMethod(
            'Ziemia pod róże',
            '11',
            6.3,
            709.00,
            $unit7);
        $fileCatalogue7 = $this->fileCatalogueFactory->factoryMethod(
            'Ziemia pod tulipany',
            '12',
            9.8,
            704.50,
            $unit7);
        $fileCatalogue8 = $this->fileCatalogueFactory->factoryMethod(
            'Ziemia pod winogrona',
            '13',
            5.4,
            683.41,
            $unit7);
        $fileCatalogue9 = $this->fileCatalogueFactory->factoryMethod(
            'Ziemia pod warzywa',
            '14',
            17.3,
            519.76,
            $unit7);
        $fileCatalogue10 = $this->fileCatalogueFactory->factoryMethod(
            'Ziemia do upraw doniczkowych',
            '15',
            4994.3,
            6.15,
            $unit6);
        $fileCatalogue11 = $this->fileCatalogueFactory->factoryMethod(
            'Rośliny polne mix 90g',
            '192',
            1920,
            2.81,
            $unit4);
        $fileCatalogue12 = $this->fileCatalogueFactory->factoryMethod(
            'Rośliny polne mix luz',
            '193',
            68.2,
            22.31,
            $unit6);
        $fileCatalogue13 = $this->fileCatalogueFactory->factoryMethod(
            'Orchidea biała',
            '220',
            21,
            18.2,
            $unit1);
        $fileCatalogue14 = $this->fileCatalogueFactory->factoryMethod(
            'Orchidea żółta',
            '221',
            23,
            17.9,
            $unit1);
        $fileCatalogue15 = $this->fileCatalogueFactory->factoryMethod(
            'Orchidea niebieska',
            '222',
            19,
            17.9,
            $unit1);
        $fileCatalogue16 = $this->fileCatalogueFactory->factoryMethod(
            'Orchidea fiolet',
            '223',
            12,
            18.2,
            $unit1);
        $fileCatalogue17 = $this->fileCatalogueFactory->factoryMethod(
            'Orchidea mix',
            '224',
            28,
            17.6,
            $unit1);
        $fileCatalogue18 = $this->fileCatalogueFactory->factoryMethod(
            'Tyczki pod pomidory',
            '236',
            19.96,
            22.20,
            $unit2);
        $fileCatalogue19 = $this->fileCatalogueFactory->factoryMethod(
            'Sznurek rolniczy szpula 800m',
            '237',
            28,
            34.12,
            $unit1);
        $fileCatalogue20 = $this->fileCatalogueFactory->factoryMethod(
            'Sznurek rolniczy luz',
            '238',
            19132.36,
            0.04113,
            $unit9);
        $fileCatalogue21 = $this->fileCatalogueFactory->factoryMethod(
            'Sznurek lniany luz',
            '239',
            11118.01,
            0.06133,
            $unit9);
        $fileCatalogue22 = $this->fileCatalogueFactory->factoryMethod(
            'Grabie ogrodnicze Fiskars',
            '51331',
            8,
            58.82,
            $unit1);
        $fileCatalogue23 = $this->fileCatalogueFactory->factoryMethod(
            'Szpadel Fiskars',
            '51333',
            13,
            61.98,
            $unit1);
        $fileCatalogue24 = $this->fileCatalogueFactory->factoryMethod(
            'Sekator do roślin uprawnych Fiskars',
            '51335',
            33,
            39.12,
            $unit1);
        $fileCatalogue25 = $this->fileCatalogueFactory->factoryMethod(
            'Sekator do gałęzi Fiskars',
            '51337',
            19,
            71.14,
            $unit1);
        $fileCatalogue26 = $this->fileCatalogueFactory->factoryMethod(
            'Siekiera Fiskars',
            '51339',
            12,
            79.12,
            $unit1);
        $fileCatalogue27 = $this->fileCatalogueFactory->factoryMethod(
            'Haczka Fiskars',
            '51341',
            8,
            44.10,
            $unit1);
        $fileCatalogue28 = $this->fileCatalogueFactory->factoryMethod(
            'Konweka Fiskars',
            '51343',
            20,
            60.03,
            $unit1);
        $fileCatalogue29 = $this->fileCatalogueFactory->factoryMethod(
            'Obrzeże do grządek plastik',
            '420',
            630,
            12.10,
            $unit8);
        $fileCatalogue30 = $this->fileCatalogueFactory->factoryMethod(
            'Obrzeże do grządek drewniane',
            '421',
            390,
            19.80,
            $unit8);
        $fileCatalogue31 = $this->fileCatalogueFactory->factoryMethod(
            'Nawóz do róż Substral',
            '31991',
            437,
            33.33,
            $unit10);
        $fileCatalogue32 = $this->fileCatalogueFactory->factoryMethod(
            'Nawóz do orchidei Substral',
            '31992',
            92,
            22.19,
            $unit10);
        $fileCatalogue33 = $this->fileCatalogueFactory->factoryMethod(
            'Nawóz do trawy Substral',
            '31993',
            558,
            38.73,
            $unit10);
        $fileCatalogue34 = $this->fileCatalogueFactory->factoryMethod(
            'Środek chwastobójczy Roundup 360',
            '25',
            200,
            8.21,
            $unit10);
        $fileCatalogue35 = $this->fileCatalogueFactory->factoryMethod(
            'Środek chwastobójczy Roundup 360 5L',
            '25',
            25,
            220.21,
            $unit1);
        $fileCatalogue36 = $this->fileCatalogueFactory->factoryMethod(
            'Środek chwastobójczy Roundup 360 20L',
            '25',
            8,
            879.12,
            $unit1);
        $fileCatalogue37 = $this->fileCatalogueFactory->factoryMethod(
            'Mix nasion ogrodowych 10g',
            '83477',
            45000,
            4.72,
            $unit4);
        $fileCatalogue38 = $this->fileCatalogueFactory->factoryMethod(
            'Mix kwiaty łąkowe karton zbiorczy',
            '84377',
            21,
            1562,
            $unit3);
        $fileCatalogue39 = $this->fileCatalogueFactory->factoryMethod(
            'Mix nasion stepowych 10g',
            '84378',
            45000,
            4.72,
            $unit4);
        $fileCatalogue40 = $this->fileCatalogueFactory->factoryMethod(
            'Rododendron japoński',
            '84379',
            17,
            62.13,
            $unit1);
        $fileCatalogue41 = $this->fileCatalogueFactory->factoryMethod(
            'Rododendron indyjski',
            '84380',
            18,
            91.13,
            $unit1);
        $fileCatalogue42 = $this->fileCatalogueFactory->factoryMethod(
            'Szlauch ogrodowy 1/2" luz',
            '84381',
            960,
            18.20,
            $unit8);
        $fileCatalogue43 = $this->fileCatalogueFactory->factoryMethod(
            'Szlauch ogrodowy 1/4" luz',
            '84382',
            1280,
            14.20,
            $unit8);
        $fileCatalogue44 = $this->fileCatalogueFactory->factoryMethod(
            'Szlauch ogrodowy 3/4" luz',
            '84383',
            720,
            22.20,
            $unit8);
        $fileCatalogue45 = $this->fileCatalogueFactory->factoryMethod(
            'Zestaw kamienie ozdobne do ogrodu',
            '84384',
            31,
            51.48,
            $unit5);
        $fileCatalogue46 = $this->fileCatalogueFactory->factoryMethod(
            'Zestaw ozdób ogrodowych Kaczki',
            '10042010',
            3,
            28.19,
            $unit5);
        $fileCatalogue47 = $this->fileCatalogueFactory->factoryMethod(
            'Flaming ozdobny ogród',
            '84385',
            12,
            44.12,
            $unit1);
        $fileCatalogue48 = $this->fileCatalogueFactory->factoryMethod(
            'Rosiczka pospolita w doniczce',
            '84386',
            2,
            112.12,
            $unit1);
        $fileCatalogue49 = $this->fileCatalogueFactory->factoryMethod(
            'Agawa w donicy',
            '84387',
            2,
            448.39,
            $unit1);
        $fileCatalogue50 = $this->fileCatalogueFactory->factoryMethod(
            'Sadzonka jabłoni',
            '84388',
            133,
            19.90,
            $unit1);
        $fileCatalogue51 = $this->fileCatalogueFactory->factoryMethod(
            'Sadzonka wiśni',
            '84389',
            81,
            13.09,
            $unit1);
        $fileCatalogue52 = $this->fileCatalogueFactory->factoryMethod(
            'Sadzonka gruszy',
            '84390',
            0,
            14.89,
            $unit1);
        $fileCatalogue53 = $this->fileCatalogueFactory->factoryMethod(
            'Sadzonka śliwki mirabelki',
            '84391',
            2,
            12.91,
            $unit1);
        $fileCatalogue54 = $this->fileCatalogueFactory->factoryMethod(
            'Sadzonka aronii',
            '84392',
            18,
            9.20,
            $unit1);
        $fileCatalogue55 = $this->fileCatalogueFactory->factoryMethod(
            'Kora do podsypywania rolślin luz',
            '84393',
            976,
            1.80,
            $unit6);
        $fileCatalogue56 = $this->fileCatalogueFactory->factoryMethod(
            'Zraszacz wody 3/4"',
            '84394',
            9,
            17.23,
            $unit1);
        $fileCatalogue57 = $this->fileCatalogueFactory->factoryMethod(
            'Zraszacz wody 1/2"',
            '84395',
            18,
            15.48,
            $unit1);
        $fileCatalogue58 = $this->fileCatalogueFactory->factoryMethod(
            'Zraszacz wody 1/4"',
            '84396',
            41,
            12.00,
            $unit1);
        $fileCatalogue59 = $this->fileCatalogueFactory->factoryMethod(
            'Doniczki plastikowe 10 szt.',
            '84397',
            76,
            29.00,
            $unit5);
        $fileCatalogue60 = $this->fileCatalogueFactory->factoryMethod(
            'Doniczka plastikowa',
            '84398',
            448,
            3.01,
            $unit1);
        $fileCatalogue61 = $this->fileCatalogueFactory->factoryMethod(
            'Doniczka ceramiczna 22cm',
            '84399',
            72,
            25.55,
            $unit1);
        $fileCatalogue62 = $this->fileCatalogueFactory->factoryMethod(
            'Doniczka ceramiczna 18cm',
            '84400',
            98,
            20.91,
            $unit1);
        $fileCatalogue63 = $this->fileCatalogueFactory->factoryMethod(
            'Trawa angielska luz',
            '84401',
            127.38,
            40.99,
            $unit6);
        $fileCatalogue64 = $this->fileCatalogueFactory->factoryMethod(
            'Trawa angielska 25kg',
            '84402',
            8,
            980.00,
            $unit6);
        $fileCatalogue65 = $this->fileCatalogueFactory->factoryMethod(
            'Gaśnica na osy Bros',
            '84403',
            18,
            15.60,
            $unit1);

        $manager->persist($user1);
        $manager->persist($user2);
        $manager->persist($unit1);
        $manager->persist($unit2);
        $manager->persist($unit3);
        $manager->persist($unit4);
        $manager->persist($unit5);
        $manager->persist($unit6);
        $manager->persist($unit7);
        $manager->persist($unit8);
        $manager->persist($unit9);
        $manager->persist($unit10);
        $manager->persist($unit11);
        $manager->persist($fileCatalogue1);
        $manager->persist($fileCatalogue2);
        $manager->persist($fileCatalogue3);
        $manager->persist($fileCatalogue4);
        $manager->persist($fileCatalogue5);
        $manager->persist($fileCatalogue6);
        $manager->persist($fileCatalogue7);
        $manager->persist($fileCatalogue8);
        $manager->persist($fileCatalogue9);
        $manager->persist($fileCatalogue10);
        $manager->persist($fileCatalogue11);
        $manager->persist($fileCatalogue12);
        $manager->persist($fileCatalogue13);
        $manager->persist($fileCatalogue14);
        $manager->persist($fileCatalogue15);
        $manager->persist($fileCatalogue16);
        $manager->persist($fileCatalogue17);
        $manager->persist($fileCatalogue18);
        $manager->persist($fileCatalogue19);
        $manager->persist($fileCatalogue20);
        $manager->persist($fileCatalogue21);
        $manager->persist($fileCatalogue22);
        $manager->persist($fileCatalogue23);
        $manager->persist($fileCatalogue24);
        $manager->persist($fileCatalogue25);
        $manager->persist($fileCatalogue26);
        $manager->persist($fileCatalogue27);
        $manager->persist($fileCatalogue28);
        $manager->persist($fileCatalogue29);
        $manager->persist($fileCatalogue30);
        $manager->persist($fileCatalogue31);
        $manager->persist($fileCatalogue32);
        $manager->persist($fileCatalogue33);
        $manager->persist($fileCatalogue34);
        $manager->persist($fileCatalogue35);
        $manager->persist($fileCatalogue36);
        $manager->persist($fileCatalogue37);
        $manager->persist($fileCatalogue38);
        $manager->persist($fileCatalogue39);
        $manager->persist($fileCatalogue40);
        $manager->persist($fileCatalogue41);
        $manager->persist($fileCatalogue42);
        $manager->persist($fileCatalogue43);
        $manager->persist($fileCatalogue44);
        $manager->persist($fileCatalogue45);
        $manager->persist($fileCatalogue46);
        $manager->persist($fileCatalogue47);
        $manager->persist($fileCatalogue48);
        $manager->persist($fileCatalogue49);
        $manager->persist($fileCatalogue50);
        $manager->persist($fileCatalogue51);
        $manager->persist($fileCatalogue52);
        $manager->persist($fileCatalogue53);
        $manager->persist($fileCatalogue54);
        $manager->persist($fileCatalogue55);
        $manager->persist($fileCatalogue56);
        $manager->persist($fileCatalogue57);
        $manager->persist($fileCatalogue58);
        $manager->persist($fileCatalogue59);
        $manager->persist($fileCatalogue60);
        $manager->persist($fileCatalogue61);
        $manager->persist($fileCatalogue62);
        $manager->persist($fileCatalogue63);
        $manager->persist($fileCatalogue64);
        $manager->persist($fileCatalogue65);

        $manager->flush();
    }
}
