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

$twig->render('news.html.twig', 'test.html');
