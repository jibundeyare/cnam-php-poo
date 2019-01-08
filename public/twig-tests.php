<?php

require __DIR__.'/../vendor/autoload.php';

$loader = new Twig_Loader_Filesystem(__DIR__.'/../templates');

// activation du mode debug et du mode de variables strictes
$twig = new Twig_Environment($loader, [
    'debug' => true,
    'strict_variables' => true,
]);

// chargement de l'extension Twig_Extension_Debug
$twig->addExtension(new Twig_Extension_Debug());

$title = 'Twig Tests';

$product = [
    'id' => 123,
    'name' => 'Perceuse',
    'description' => 'Lorem ipsum',
    'prix_location' => 5,
    'prix_achat' => 150.0,
    'achetable' => false,
    'louable' => true,
];

echo $twig->render('twig-tests.html.twig', [
    'title' => $title,
    'product' => $product,
]);
