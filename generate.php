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

//main landing pages
$twig->render('news.html.twig', 'index.html');
$twig->render('about.html.twig', 'about.html');

//news
$twig->render('news/2021/01-06-the-galactic-idiot-published.html.twig', 'news/2021/01-06-the-galactic-idiot-published.html');
$twig->render('news/2019/07-01-fatal-exception-published.html.twig', 'news/2019/07-01-fatal-exception-published.html');
$twig->render('news/2019/07-16-coming-soon-epoch.html.twig', 'news/2019/07-16-coming-soon-epoch.html');
$twig->render('news/2019/07-25-epoch-published.html.twig', 'news/2019/07-25-epoch-published.html');
$twig->render('news/2019/10-10-the-test-subject-published.html.twig', 'news/2019/10-10-the-test-subject-published.html');

//books
$twig->render('books/a-fatal-exception.html.twig', 'a-fatal-exception.html');
$twig->render('books/epoch.html.twig', 'epoch.html');
$twig->render('books/the-test-subject.html.twig', 'the-test-subject.html');
$twig->render('books/the-galactic-idiot.html.twig', 'the-galactic-idiot.html');

//articles
$twig->render('articles/the-agile-development-of-a-novel.html.twig', 'articles/the-agile-development-of-a-novel.html');
$twig->render('articles/hacking-in-fiction-vs-reality.html.twig', 'articles/hacking-in-fiction-vs-reality.html');

//footer pages
$twig->render('privacy.html.twig', 'privacy.html');
$twig->render('contact.html.twig', 'contact.html');
