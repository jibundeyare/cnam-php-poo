<?php
// déclaration des classes PHP qui seront utilisées
use Doctrine\DBAL\Configuration;
use Doctrine\DBAL\DriverManager;
use Symfony\Component\Yaml\Yaml;

// activation de la fonction autoloading de Composer
require __DIR__.'/../vendor/autoload.php';

// instanciation du chargeur de templates
$loader = new Twig_Loader_Filesystem(__DIR__.'/../templates');
// instanciation du moteur de template
$twig = new Twig_Environment($loader);

// création d'une variable avec une configuration par défaut
$config = new Configuration();

// chargement des coordonnées de connexion à la BDD depuis un fichier YAML
// symfony/yaml 3.4
// $connectionParams = Yaml::parseFile(__DIR__.'/../config/parameters.yml');
// symfony/yaml 3.0
$connectionParams = Yaml::parse(file_get_contents(__DIR__.'/../config/parameters.yml'));

// connection à la BDD
// la variable `$conn` permet de communiquer avec la BDD
$conn = DriverManager::getConnection($connectionParams, $config);

$title = 'Hello doctrine dbal';

// requête SQL
$sql = '
SELECT *
FROM client
';

// envoi d'une requête SQL à la BDD et récupération du résultat sous forme de tableau PHP dans la variable `$items`
$items = $conn->fetchAll($sql);

// affichage du rendu d'un template
echo $twig->render('hello-doctrine-dbal.html.twig', [
    // transmission de données au template
    'title' => $title,
    'items' => $items,
]);
