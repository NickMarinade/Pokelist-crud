<?php

// Require the correct variable type to be used (no auto-converting)
declare(strict_types=1);

// Show errors so we get helpful information
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// Load you classes
require_once 'config.php';
require_once 'classes/DatabaseManager.php';
require_once 'classes/CardRepository.php';

$databaseManager = new DatabaseManager($config['host'], $config['user'], $config['password'], $config['dbname']);
$databaseManager->connect();

$cardRepository = new CardRepository($databaseManager);
$cards = $cardRepository->get();



$action = $_GET['action'] ?? null;

switch ($action) {
    case 'create':
        create();
        break;
    case 'update':
        update();
        break;
    case 'delete':
        delete();
        break;
    default:
        overview($cards);
        break;
}

function overview($cards)
{

    require 'overview.php';
}


function create()
{
    global $cardRepository;

    $name = $_POST['name'] ?? '';
    $type = $_POST['type'] ?? '';
    $weight = intval($_POST['weight']);
    $height = intval($_POST['height']);



    $cardRepository->create($name, $type, $weight, $height);

    header('Location: ./');
    exit;
}

function delete()
{
    global $cardRepository;

    $id = intval($_GET['id']);

    $cardRepository->delete($id);

    header('Location: ./');
    exit;
}

function update()
{
    global $cardRepository;
    if(isset($_POST ['submit'])){

        $name = $_POST['name'];
        $type = $_POST['type'];
        $weight = intval($_POST['weight']);
        $height = intval($_POST['height']);
        $id = intval($_GET['id']);
    
        $cardRepository->update($name, $type, $weight, $height, $id);   
    
        header('Location:./');
        exit();
    }

    $card = $cardRepository->find(intval($_GET['id']));

    require 'update.php';
}
