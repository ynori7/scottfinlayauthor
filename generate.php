<?php
require_once __DIR__ . '/vendor/autoload.php';

const TEMPLATES_PATH = 'templates';
const WEB_PATH = "web";

class MyTwigEnvironment extends \Twig_Environment {
    public function render($name, $dest, array $context = array()){
        $html = $this->loadTemplate($name)->render($context);
	$destPath = WEB_PATH . '/' . $dest;
	file_put_contents($destPath, $html);
	chmod($destPath, 0664);
	return $html;
    }   
}


$loader = new Twig_Loader_Filesystem(__DIR__ . '/' .TEMPLATES_PATH);
$twig = new MyTwigEnvironment($loader, array(
    'cache' => false,
));

$twig->render('news.html.twig', 'index.html');
$twig->render('about.html.twig', 'about.html');

$twig->render('books/a-fatal-exception.html.twig', 'a-fatal-exception.html');

$twig->render('privacy.html.twig', 'privacy.html');
$twig->render('contact.html.twig', 'contact.html');
