<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('services')->insert([
            [
                "name" => "Installation de panneaux solaires",
                "slug" => "Installation-de-panneaux-solaires",
                "tagline" => "Énergie solaire pour un avenir durable",
                "service_category_id" => 4,
                "price" => 1000,
                "image" => "service_1.jpg",
                "thumbnail" => "service_1.jpg",
                "description" => "Offrez-vous une source d'énergie propre et durable avec notre service d'installation de panneaux solaires. Nos experts qualifiés vous accompagnent de la conception à la mise en service, vous permettant de réduire votre empreinte carbone tout en économisant sur vos factures d'électricité à long terme.",                

            ],
            [
                "name" => "Inspections de Sécurité Électrique",
                "slug" => "Inspections-de-Sécurité-Électrique",
                "tagline" => "Sécurité électrique assurée, tranquillité d'esprit garantie",
                "service_category_id" => 4,
                "price" => 150,
                "image" => "service_2.jpg",
                "thumbnail" => "service_2.jpg",
                "description" => "Assurez la sécurité de votre domicile avec nos inspections de sécurité électrique approfondies. Nos experts qualifiés effectuent une évaluation complète de votre système électrique pour détecter les problèmes potentiels, les défauts de câblage, les risques d'incendie et les points d'amélioration. Nous vous fournissons ensuite des recommandations personnalisées pour garantir un environnement électrique sûr et fiable.",

            ],
            [
                "name" => "Solutions de Domotique",
                "slug" => "Solutions-de-Domotique",
                "tagline" => "Vivez intelligemment, vivez confortablement",
                "service_category_id" => 4,
                "price" => 2000,
                "image" => "service_3.jpg",
                "thumbnail" => "service_3.jpg",
                "description" => "Transformez votre maison en un espace intelligent et connecté avec nos solutions de domotique avancées. Nous proposons l'installation et la configuration de systèmes intelligents pour l'éclairage, le chauffage, la sécurité et plus encore. Contrôlez votre maison à distance, automatisez les tâches quotidiennes et améliorez votre confort et votre sécurité avec nos solutions personnalisées et faciles à utiliser.",

            ],
            [
                "name" => "Débouchage des Canalisations",
                "slug" => "Débouchage-des-Canalisations",
                "tagline" => "Canalisations dégagées, tranquillité retrouvée",
                "service_category_id" => 3,
                "price" => 80,
                "image" => "service_4.jpg",
                "thumbnail" => "service_4.jpg",
                "description" => "Notre service de débouchage des canalisations offre une solution rapide et efficace pour éliminer les obstructions et les bouchons dans vos canalisations. Nos plombiers expérimentés utilisent des techniques avancées et des outils spécialisés pour dégager les égouts, les éviers, les toilettes et les autres conduits, garantissant un flux d'eau fluide et un système sanitaire fonctionnel.",

            ],
            [
                "name" => "Réparation des Fuites d'Eau",
                "slug" => "Réparation-des-Fuites-d'Eau",
                "tagline" => "Fuites stoppées, confiance retrouvée.",
                "service_category_id" => 3,
                "price" => 50,
                "image" => "service_5.jpg",
                "thumbnail" => "service_5.jpg",
                "description" => "Notre service de réparation des fuites d'eau offre des solutions rapides et efficaces pour détecter et réparer les fuites dans vos installations sanitaires. Nos plombiers expérimentés utilisent des méthodes de détection avancées telles que l'inspection par caméra et la recherche de fuites par ultrasons pour localiser précisément les sources de fuites, puis effectuent des réparations durables pour éviter les dégâts et les pertes d'eau.",

            ],
            [
                "name" => "Installation de Robinetterie et de Sanitaires ",
                "slug" => "Installation-de-Robinetterie-et-de-Sanitaires ",
                "tagline" => "Élégance et fonctionnalité, installées à la perfection.",
                "service_category_id" => 3,
                "price" => 200,
                "image" => "service_6.jpg",
                "thumbnail" => "service_6.jpg",
                "description" => "Profitez d'une installation professionnelle et soignée de votre robinetterie et de vos sanitaires avec notre service spécialisé. Nos plombiers expérimentés assurent l'installation de robinets, de mitigeurs, de toilettes, de lavabos, de douches et de baignoires selon les normes de qualité et de sécurité. Nous vous garantissons un fonctionnement optimal et une esthétique harmonieuse pour votre salle de bains ou cuisine.",

            ],
            [
                "name" => "Entretien et Maintenance des Systèmes de Chauffage d'Eau",
                "slug" => "Entretien-et-Maintenance-des-Systèmes-de-Chauffage-d'Eau",
                "tagline" => "Chaleur constante, tranquillité assurée.",
                "service_category_id" => 3,
                "price" => 50,
                "image" => "service_7.jpg",
                "thumbnail" => "service_7.jpg",
                "description" => "Assurez le bon fonctionnement et la durabilité de votre système de chauffage d'eau avec notre service d'entretien et de maintenance. Nos techniciens spécialisés effectuent des inspections périodiques, nettoient les éléments du chauffe-eau, vérifient les réglages et procèdent à des ajustements si nécessaire. Nous veillons à ce que votre système fonctionne de manière optimale pour un confort continu et des économies d'énergie.",

            ],
            [
                "name" => "Peinture Intérieure",
                "slug" => "Peinture-Intérieure",
                "tagline" => "Couleurs qui inspirent, intérieurs qui enchantent.",
                "service_category_id" => 20,
                "price" => 200,
                "image" => "service_8.jpg",
                "thumbnail" => "service_8.jpg",
                "description" => "Transformez l'intérieur de votre domicile ou de votre espace commercial avec notre service de peinture intérieure professionnel. Nos experts en peinture réalisent une préparation minutieuse des surfaces, choisissent des couleurs adaptées à votre style et appliquent la peinture avec précision pour obtenir un résultat impeccable. Que ce soit pour rafraîchir vos murs, mettre en valeur vos pièces ou créer une ambiance chaleureuse, nous réalisons vos projets de peinture intérieure selon vos préférences.",

            ],
            [
                "name" => "Peinture Extérieure",
                "slug" => "Peinture-Extérieure",
                "tagline" => "Harmonie extérieure, éclat préservé.",
                "service_category_id" => 20,
                "price" => 500,
                "image" => "service_9.jpg",
                "thumbnail" => "service_9.jpg",
                "description" => "Embellissez et protégez votre façade et vos extérieurs avec notre service de peinture extérieure professionnel. Nos peintres expérimentés assurent une préparation minutieuse des surfaces, l'application de peintures de qualité supérieure résistantes aux intempéries et aux UV, et un travail soigné pour un résultat durable et esthétique. Offrez une nouvelle vie à votre maison ou bâtiment et créez une première impression accueillante et attrayante.",

            ],
            [
                "name" => "Peinture de Décoration",
                "slug" => "Peinture-de-Décoration",
                "tagline" => "Créez des espaces uniques, vivez des émotions authentiques.",
                "service_category_id" => 20,
                "price" => 300,
                "image" => "service_10.jpg",
                "thumbnail" => "service_10.jpg",
                "description" => "Apportez une touche d'originalité et d'élégance à votre intérieur avec notre service de peinture de décoration. Nos artistes-peintres spécialisés réalisent des créations uniques et personnalisées, utilisant des techniques avancées telles que les faux finis, les stucs, les effets métalliques et les motifs artistiques pour transformer vos murs en œuvres d'art. Offrez-vous un espace qui reflète votre style et inspire votre imagination.",

            ],
            [
                "name" => "Peinture de Rénovation",
                "slug" => "Peinture-de-Rénovation",
                "tagline" => "Nouvelle couleur, nouvelle vie.",
                "service_category_id" => 20,
                "price" => 300,
                "image" => "service_11.jpg",
                "thumbnail" => "service_11.jpg",
                "description" => "Redonnez vie à votre espace avec notre service de peinture de rénovation. Nos professionnels de la peinture réalisent une remise à neuf complète en préparant les surfaces, en réparant les imperfections et en appliquant des couches de peinture de haute qualité. Transformez votre intérieur ou extérieur avec des couleurs fraîches et un aspect revitalisé qui apporte une nouvelle ambiance à votre espace.",

            ],
            [
                "name" => "Fabrication et Installation de Meubles sur Mesure",
                "slug" => "Fabrication-et-Installation-de-Meubles-sur-Mesure",
                "tagline" => "Votre espace, vos règles, notre artisanat.",
                "service_category_id" => 7,
                "price" => 500,
                "image" => "service_12.jpg",
                "thumbnail" => "service_12.jpg",
                "description" => "Offrez-vous des solutions d'aménagement uniques avec notre service de fabrication et d'installation de meubles sur mesure. Nos artisans qualifiés travaillent en étroite collaboration avec vous pour concevoir des meubles personnalisés qui répondent à vos besoins fonctionnels, s'adaptent à votre style et optimisent l'utilisation de l'espace disponible. Du design à la réalisation, nous créons des pièces de qualité qui ajoutent une touche d'élégance et de fonctionnalité à votre intérieur.",

            ],
            [
                "name" => "Installation de Menuiseries Intérieures",
                "slug" => "Installation-de-Menuiseries-Intérieures",
                "tagline" => "Raffinement intérieur, perfection assurée.",
                "service_category_id" => 7,
                "price" => 200,
                "image" => "service_13.jpg",
                "thumbnail" => "service_13.jpg",
                "description" => "Transformez l'aspect intérieur de votre espace avec notre service d'installation de menuiseries intérieures. Nous assurons une pose professionnelle de portes intérieures, de cadres de portes, de moulures décoratives, de plinthes et d'autres éléments de menuiserie pour rehausser l'esthétique et la fonctionnalité de votre intérieur. Avec des matériaux de qualité et une expertise méticuleuse, nous créons des finitions qui ajoutent une touche d'élégance à chaque pièce.",

            ],
            [
                "name" => "Pose de Revêtements de Sol en Bois",
                "slug" => "Pose-de-Revêtements-de-Sol-en-Bois",
                "tagline" => "Authenticité sous vos pieds, confort au quotidien.",
                "service_category_id" => 7,
                "price" => 20,
                "image" => "service_14.jpg",
                "thumbnail" => "service_14.jpg",
                "description" => "Transformez votre intérieur avec notre service de pose de revêtements de sol en bois. Nous proposons l'installation professionnelle de revêtements en bois massif, stratifié ou vinyle dans différentes pièces de votre maison ou de votre espace commercial. Nos poseurs spécialisés assurent une pose précise, une finition soignée et une durabilité accrue pour des sols élégants et chaleureux.",

            ],
            [
                "name" => "Construction et Installation de Terrasses en Bois",
                "slug" => "Construction-et-Installation-de-Terrasses-en-Bois",
                "tagline" => "Naturellement connecté à votre jardin, un pas vers le bonheur.",
                "service_category_id" => 7,
                "price" => 80,
                "image" => "service_15.jpg",
                "thumbnail" => "service_15.jpg",
                "description" => "Transformez votre espace extérieur en un havre de paix avec notre service de construction et d'installation de terrasses en bois. Nos experts en menuiserie conçoivent des terrasses sur mesure, utilisant des bois de qualité supérieure et des techniques de construction durables pour créer des espaces extérieurs élégants, résistants aux intempéries et propices à la détente et aux loisirs en plein air.",

            ],
            [
                "name" => "Installation de Réfrigérateurs",
                "slug" => "Installation-de-Réfrigérateurs",
                "tagline" => "Froid parfait, installation impeccable.",
                "service_category_id" => 13,
                "price" => 50,
                "image" => "service_16.jpg",
                "thumbnail" => "service_16.jpg",
                "description" => "Profitez d'une installation professionnelle et fiable de votre réfrigérateur avec notre service spécialisé. Nos techniciens expérimentés suivent les normes du fabricant pour garantir un fonctionnement optimal de votre appareil. Nous assurons une installation sécurisée, une mise en service correcte et des conseils d'utilisation pour maximiser les performances de refroidissement de votre réfrigérateur.",

            ],
            [
                "name" => "Réparation de Réfrigérateurs",
                "slug" => "Réparation-de-Réfrigérateurs",
                "tagline" => "Froid retrouvé, confort préservé.",
                "service_category_id" => 13,
                "price" => 150,
                "image" => "service_17.jpg",
                "thumbnail" => "service_17.jpg",
                "description" => "Confiez la réparation de votre réfrigérateur à nos experts pour un dépannage rapide et efficace. Notre service de réparation de réfrigérateurs comprend le diagnostic précis des problèmes, le remplacement des pièces défectueuses et le réglage optimal des paramètres pour restaurer les performances de refroidissement. Nous garantissons des interventions de qualité pour prolonger la durée de vie de votre appareil et éviter les pertes de nourriture.",

            ],
            [
                "name" => "Entretien Préventif des Réfrigérateurs",
                "slug" => "Entretien-Préventif-des-Réfrigérateurs",
                "tagline" => "Fraîcheur préservée, tranquillité assurée.",
                "service_category_id" => 13,
                "price" => 30,
                "image" => "service_18.jpg",
                "thumbnail" => "service_18.jpg",
                "description" => "Préservez la performance de votre réfrigérateur grâce à notre service d'entretien préventif professionnel. Nos techniciens spécialisés effectuent un nettoyage minutieux des condenseurs, une vérification des joints d'étanchéité et un calibrage des thermostats pour assurer un fonctionnement optimal de votre appareil. L'entretien préventif régulier permet de prolonger la durée de vie de votre réfrigérateur et d'éviter les pannes coûteuses.",

            ],
            [
                "name" => "Réfrigération Commerciale",
                "slug" => "Réfrigération-Commerciale",
                "tagline" => "Froid maîtrisé, produits préservés.",
                "service_category_id" => 13,
                "price" => 500,
                "image" => "service_19.jpg",
                "thumbnail" => "service_19.jpg",
                "description" => "Optez pour une solution de réfrigération professionnelle pour votre entreprise avec notre service de réfrigération commerciale. Nous proposons l'installation, la réparation et l'entretien des systèmes de réfrigération commerciale, y compris les chambres froides, les vitrines réfrigérées et les congélateurs industriels. Notre équipe spécialisée garantit des performances optimales pour conserver vos produits dans des conditions idéales.",

            ],
            [
                "name" => "Installation de Climatiseurs",
                "slug" => "Installation-de-Climatiseurs",
                "tagline" => "Frais et confortable, toute l'année.",
                "service_category_id" => 1,
                "price" => 300,
                "image" => "service_20.jpg",
                "thumbnail" => "service_20.jpg",
                "description" => "Profitez d'un confort thermique optimal avec notre service professionnel d'installation de climatiseurs. Nos experts évaluent vos besoins en refroidissement, recommandent les appareils les mieux adaptés à votre espace, et réalisent une installation conforme aux normes pour assurer une performance optimale et une efficacité énergétique. Transformez votre intérieur en havre de fraîcheur lors des journées chaudes grâce à nos solutions de climatisation sur mesure.",

            ],
            [
                "name" => "Entretien et Maintenance des Climatiseurs",
                "slug" => "Entretien-et-Maintenance-des-Climatiseurs",
                "tagline" => "Frais et fiable, tout au long de l'année.",
                "service_category_id" => 1,
                "price" => 50,
                "image" => "service_21.jpg",
                "thumbnail" => "service_21.jpg",
                "description" => "Assurez la performance optimale de votre climatiseur avec notre service d'entretien et de maintenance professionnelle. Nous prenons en charge le nettoyage des filtres, la vérification des composants, le réglage des paramètres, et la détection précoce des problèmes pour éviter les pannes. Un entretien régulier garantit un fonctionnement efficace, une meilleure qualité de l'air et une durée de vie prolongée de votre climatiseur.",

            ],
            [
                "name" => "Réparation de Climatiseurs",
                "slug" => "Réparation-de-Climatiseurs",
                "tagline" => "Réparation experte, climatisation retrouvée.",
                "service_category_id" => 1,
                "price" => 50,
                "image" => "service_22.jpg",
                "thumbnail" => "service_22.jpg",
                "description" => "En cas de panne ou de dysfonctionnement de votre climatiseur, notre service de réparation intervient rapidement pour diagnostiquer et résoudre les problèmes. Nos techniciens qualifiés effectuent un diagnostic précis, remplacent les pièces défectueuses, réparent les fuites de réfrigérant et ajustent les paramètres pour restaurer les performances de refroidissement de votre appareil. Assurez-vous de retrouver un confort optimal dans votre environnement grâce à notre expertise en réparation de climatiseurs.",

            ],
            [
                "name" => "Installation de Systèmes de Climatisation Centralisée",
                "slug" => "Installation-de-Systèmes-de-Climatisation-Centralisée",
                "tagline" => "Climat maîtrisé, performance garantie.",
                "service_category_id" => 1,
                "price" => 1500,
                "image" => "service_23.jpg",
                "thumbnail" => "service_23.jpg",
                "description" => "Optez pour le confort total avec notre service d'installation de systèmes de climatisation centralisée. Nous concevons sur mesure des solutions de climatisation adaptées à vos besoins, que ce soit pour des espaces commerciaux, des bureaux, ou des bâtiments industriels. Notre équipe assure l'installation des unités intérieures et extérieures, ainsi que la mise en service pour un climat intérieur optimal, homogène et économe en énergie.",

            ],
            [
                "name" => "Nettoyage Régulier de la Maison",
                "slug" => "Nettoyage-Régulier-de-la-Maison",
                "tagline" => "Un foyer étincelant, un bien-être garanti.",
                "service_category_id" => 6,
                "price" => 30,
                "image" => "service_24.jpg",
                "thumbnail" => "service_24.jpg",
                "description" => "Offrez-vous le luxe d'un foyer impeccable avec notre service de nettoyage régulier de la maison. Nos équipes expérimentées s'occupent du nettoyage complet de toutes les pièces, du dépoussiérage des meubles à l'entretien des sols, en passant par le soin des salles de bains et de la cuisine. Profitez d'un environnement frais et ordonné, semaine après semaine.",

            ],
            [
                "name" => "Nettoyage en Profondeur",
                "slug" => "Nettoyage-en-Profondeur",
                "tagline" => "Pureté retrouvée, éclat préservé.",
                "service_category_id" => 6,
                "price" => 60,
                "image" => "service_25.jpg",
                "thumbnail" => "service_25.jpg",
                "description" => "Offrez à votre maison une cure de jouvence avec notre service de nettoyage en profondeur. Nos équipes spécialisées éliminent la saleté incrustée, les taches tenaces et les dépôts difficiles à atteindre. Des sols étincelants aux surfaces impeccables, votre espace retrouvera son éclat d'origine.",

            ],
            [
                "name" => "Nettoyage des Vitres et des Fenêtres",
                "slug" => "Nettoyage-des-Vitres-et-des-Fenêtres",
                "tagline" => "Transparence éblouissante, vue cristalline.",
                "service_category_id" => 6,
                "price" => 20,
                "image" => "service_26.jpg",
                "thumbnail" => "service_26.jpg",
                "description" => "Offrez une vue éclatante à votre intérieur avec notre service de nettoyage des vitres et des fenêtres. Nos professionnels utilisent des techniques et des produits spécifiques pour éliminer les traces, la saleté et les résidus, offrant ainsi une luminosité maximale à chaque pièce. Profitez d'une clarté transparente pour un confort visuel optimal.",

            ],
            [
                "name" => "Nettoyage de Fin de Bail (Déménagement)",
                "slug" => "Nettoyage-de-Fin-de-Bail",
                "tagline" => "Propreté garantie, déménagement simplifié.",
                "service_category_id" => 6,
                "price" => 80,
                "image" => "service_27.jpg",
                "thumbnail" => "service_27.jpg",
                "description" => "Préparez votre déménagement en toute sérénité avec notre service de nettoyage de fin de bail. Nous assurons un nettoyage complet et méticuleux de votre logement, des sols aux plafonds, en passant par les surfaces, les armoires et les appareils électroménagers. Rendez les lieux impeccables selon les normes locatives pour récupérer votre caution sans souci.",

            ],
            [
                "name" => "Installation de Chauffe-eau",
                "slug" => "Installation-de-Chauffe-eau",
                "tagline" => "Eau chaude sur mesure, confort assuré.",
                "service_category_id" => 14,
                "price" => 150,
                "image" => "service_28.jpg",
                "thumbnail" => "service_28.jpg",
                "description" => "Profitez d'une eau chaude instantanée et confortable avec notre service d'installation de chauffe-eau. Nos experts évaluent vos besoins en fonction du nombre d'utilisateurs et de la consommation d'eau chaude, recommandent le modèle le mieux adapté (électrique, à gaz, solaire, etc.), et assurent une installation conforme aux normes pour une efficacité optimale.",

            ],
            [
                "name" => "Réparation de Chauffe-eau",
                "slug" => "Réparation-de-Chauffe-eau",
                "tagline" => "Chaleur retrouvée, confort préservé.",
                "service_category_id" => 14,
                "price" => 50,
                "image" => "service_29.jpg",
                "thumbnail" => "service_29.jpg",
                "description" => "En cas de panne ou de dysfonctionnement de votre chauffe-eau, notre service de réparation intervient rapidement pour diagnostiquer et résoudre les problèmes. Nos techniciens qualifiés effectuent un diagnostic précis, remplacent les pièces défectueuses, réparent les fuites et ajustent les paramètres pour restaurer les performances de chauffage de l'eau. Assurez-vous de retrouver un confort optimal en ayant une eau chaude disponible.",

            ],
            [
                "name" => "Entretien Préventif des Chauffe-eau",
                "slug" => "Entretien-Préventif-des-Chauffe-eau",
                "tagline" => "Fiabilité assurée, chaleur préservée",
                "service_category_id" => 14,
                "price" => 30,
                "image" => "service_30.jpg",
                "thumbnail" => "service_30.jpg",
                "description" => "Préservez la performance et la durée de vie de votre chauffe-eau grâce à notre service d'entretien préventif. Nos techniciens spécialisés effectuent un nettoyage approfondi, vérifient les composants, ajustent les réglages et inspectent l'ensemble du système pour détecter les problèmes potentiels. En planifiant des visites régulières d'entretien, vous évitez les pannes coûteuses et assurez un fonctionnement optimal de votre chauffe-eau.",

            ],
            [
                "name" => "Installation de Téléviseurs",
                "slug" => "Installation-de-Téléviseurs",
                "tagline" => "Votre téléviseur, notre expertise.",
                "service_category_id" => 12,
                "price" => 30,
                "image" => "service_31.jpg",
                "thumbnail" => "service_31.jpg",
                "description" => "Confiez l'installation de votre téléviseur à nos experts pour une expérience visuelle sans pareille. Nous assurons un montage mural sécurisé, une connexion optimale à vos appareils externes, et une configuration personnalisée des paramètres pour un plaisir de visionnage immédiat et sans souci.",

            ],
            [
                "name" => "Réparation de Téléviseurs",
                "slug" => "Réparation-de-Téléviseurs",
                "tagline" => "Réparation experte, divertissement retrouvé.",
                "service_category_id" => 12,
                "price" => 30,
                "image" => "service_32.jpg",
                "thumbnail" => "service_32.jpg",
                "description" => "Confiez la réparation de votre téléviseur à nos techniciens qualifiés pour retrouver une qualité d'image et de son optimale. Nous effectuons un diagnostic précis des pannes, remplaçons les composants défectueux et réglons les paramètres pour restaurer la performance de votre appareil.",

            ],
            [
                "name" => "Installation de Systèmes Home Cinéma",
                "slug" => "Installation-de-Systèmes-Home-Cinéma",
                "tagline" => "Plongez dans le cinéma, sans quitter votre salon.",
                "service_category_id" => 12,
                "price" => 300,
                "image" => "service_33.jpg",
                "thumbnail" => "service_33.jpg",
                "description" => "Transformez votre espace de divertissement avec notre service d'installation de systèmes home cinéma. Nous vous offrons une expérience audiovisuelle immersive grâce à la mise en place professionnelle d'enceintes, d'un caisson de basses, d'un amplificateur et d'un écran de projection. Profitez du son surround et d'une qualité d'image exceptionnelle pour des moments cinématographiques inoubliables chez vous.",

            ],

        ]);
    }
}
