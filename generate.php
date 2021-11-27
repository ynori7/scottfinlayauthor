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
$twig->render('news/2019/07-01-fatal-exception-published.html.twig', 'news/2019/07-01-fatal-exception-published.html');
$twig->render('news/2019/07-16-coming-soon-epoch.html.twig', 'news/2019/07-16-coming-soon-epoch.html');
$twig->render('news/2019/07-25-epoch-published.html.twig', 'news/2019/07-25-epoch-published.html');
$twig->render('news/2019/10-10-the-test-subject-published.html.twig', 'news/2019/10-10-the-test-subject-published.html');
$twig->render('news/2021/01-06-the-galactic-idiot-published.html.twig', 'news/2021/01-06-the-galactic-idiot-published.html');

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

//feeds
const canonical = "https://www.scottfinlayauthor.com";

$twig->render('rss.xml.twig', 'rss.xml', array(
    "items" => array(
        array(
            'include' => 'news/2021/include-01-24-hacking-in-fiction-vs-reality.html.twig',
            'name' => 'Hacking in Fiction vs Reality',
            'link' => canonical . '/articles/hacking-in-fiction-vs-reality',
            'date' => 'January 24, 2021'
        ),
        array(
            'include' => 'news/2021/include-01-18-new-interview.html.twig',
            'name' => 'Author Interview with Susan Finlay',
            'link' => '',
            'date' => 'January 18, 2021'
        ),
        array(
            'include' => 'news/2021/include-01-17-the-agile-development-of-a-novel.html.twig',
            'name' => 'The Agile Development of a Novel',
            'link' => canonical . '/articles/the-agile-development-of-a-novel',
            'date' => 'January 17, 2021'
        ),
        array(
            'include' => 'news/2021/include-01-06-the-galactic-idiot-published.html.twig',
            'name' => 'The Galactic Idiot Published!',
            'link' => canonical . '/news/2021/01-06-the-galactic-idiot-published',
            'date' => 'January 6, 2021'
        ),
        array(
            'include' => 'news/2020/include-11-16-coming-soon-galactic-idiot.html.twig',
            'name' => 'Something New Is Coming',
            'link' => '',
            'date' => 'November 16, 2020'
        ),
        array(
            'include' => 'news/2019/include-10-10-the-test-subject-published.html.twig',
            'name' => 'The Test Subject Published!',
            'link' => canonical . '/news/2019/10-10-the-test-subject-published',
            'date' => 'October 10, 2019'
        ),
        array(
            'include' => 'news/2019/include-07-25-epoch-published.html.twig',
            'name' => 'Epoch Published!',
            'link' => canonical . '/news/2019/07-25-epoch-published',
            'date' => 'July 25, 2019'
        ),
        array(
            'include' => 'news/2019/include-07-16-coming-soon-epoch.html.twig',
            'name' => 'Coming Soon...Epoch!',
            'link' => canonical . '/news/2019/07-16-coming-soon-epoch',
            'date' => 'July 16, 2019'
        ),
        array(
            'include' => 'news/2019/include-07-01-fatal-exception-published.html.twig',
            'name' => 'A Fatal Exception Published!',
            'link' => canonical . '/news/2019/07-01-fatal-exception-published',
            'date' => 'July 1, 2019'
        ),
        array(
            'include' => 'news/2019/include-06-30-new-website.html.twig',
            'name' => 'New Website Launched',
            'link' => '',
            'date' => 'June 30, 2019'
        )
    )
));
