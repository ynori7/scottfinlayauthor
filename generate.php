<?php
require_once __DIR__ . '/vendor/autoload.php';

const TEMPLATES_PATH = 'templates';
const WEB_PATH = "web";

class MyTwigEnvironment extends \Twig_Environment {
    public function render($name, array $context = array()){
        $html = $this->loadTemplate($name)->render($context);
        return $html;
    }
}

$loader = new Twig_Loader_Filesystem(__DIR__ . '/' .TEMPLATES_PATH);
$twig = new MyTwigEnvironment($loader, array(
    'cache' => false,
));

function render($name, $dest, $context = array()) {
        global $twig;

        $html = $twig->render($name, $context);
        $destPath = WEB_PATH . '/' . $dest;
        file_put_contents($destPath, $html);
        chmod($destPath, 0664);
}

//main landing pages
render('news.html.twig', 'index.html');
render('about.html.twig', 'about.html');

//news
render('news/2019/07-01-fatal-exception-published.html.twig', 'news/2019/07-01-fatal-exception-published.html');
render('news/2019/07-16-coming-soon-epoch.html.twig', 'news/2019/07-16-coming-soon-epoch.html');
render('news/2019/07-25-epoch-published.html.twig', 'news/2019/07-25-epoch-published.html');
render('news/2019/10-10-the-test-subject-published.html.twig', 'news/2019/10-10-the-test-subject-published.html');
render('news/2021/01-06-the-galactic-idiot-published.html.twig', 'news/2021/01-06-the-galactic-idiot-published.html');

//books
render('books/a-fatal-exception.html.twig', 'a-fatal-exception.html');
render('books/epoch.html.twig', 'epoch.html');
render('books/the-test-subject.html.twig', 'the-test-subject.html');
render('books/the-galactic-idiot.html.twig', 'the-galactic-idiot.html');

//articles
render('articles/the-agile-development-of-a-novel.html.twig', 'articles/the-agile-development-of-a-novel.html');
render('articles/hacking-in-fiction-vs-reality.html.twig', 'articles/hacking-in-fiction-vs-reality.html');

//footer pages
render('privacy.html.twig', 'privacy.html');
render('contact.html.twig', 'contact.html');

//feeds
const canonical = "https://www.scottfinlayauthor.com";

render('rss.xml.twig', 'rss.xml', array(
    "items" => array(
        array(
            'include' => 'news/2021/include-01-24-hacking-in-fiction-vs-reality.html.twig',
            'name' => 'Hacking in Fiction vs Reality',
            'link' => canonical . '/articles/hacking-in-fiction-vs-reality',
            'date' => date(DATE_RFC822, strtotime('January 24, 2021'))
        ),
        array(
            'include' => 'news/2021/include-01-18-new-interview.html.twig',
            'name' => 'Author Interview with Susan Finlay',
            'link' => '',
            'date' => date(DATE_RFC822, strtotime('January 18, 2021'))
        ),
        array(
            'include' => 'news/2021/include-01-17-the-agile-development-of-a-novel.html.twig',
            'name' => 'The Agile Development of a Novel',
            'link' => canonical . '/articles/the-agile-development-of-a-novel',
            'date' => date(DATE_RFC822, strtotime('January 17, 2021'))
        ),
        array(
            'include' => 'news/2021/include-01-06-the-galactic-idiot-published.html.twig',
            'name' => 'The Galactic Idiot Published!',
            'link' => canonical . '/news/2021/01-06-the-galactic-idiot-published',
            'date' => date(DATE_RFC822, strtotime('January 6, 2021'))
        ),
        array(
            'include' => 'news/2020/include-11-16-coming-soon-galactic-idiot.html.twig',
            'name' => 'Something New Is Coming',
            'link' => '',
            'date' => date(DATE_RFC822, strtotime('November 16, 2020'))
        ),
        array(
            'include' => 'news/2019/include-10-10-the-test-subject-published.html.twig',
            'name' => 'The Test Subject Published!',
            'link' => canonical . '/news/2019/10-10-the-test-subject-published',
            'date' => date(DATE_RFC822, strtotime('October 10, 2019'))
        ),
        array(
            'include' => 'news/2019/include-07-25-epoch-published.html.twig',
            'name' => 'Epoch Published!',
            'link' => canonical . '/news/2019/07-25-epoch-published',
            'date' => date(DATE_RFC822, strtotime('July 25, 2019'))
        ),
        array(
            'include' => 'news/2019/include-07-16-coming-soon-epoch.html.twig',
            'name' => 'Coming Soon...Epoch!',
            'link' => canonical . '/news/2019/07-16-coming-soon-epoch',
            'date' => date(DATE_RFC822, strtotime('July 16, 2019'))
        ),
        array(
            'include' => 'news/2019/include-07-01-fatal-exception-published.html.twig',
            'name' => 'A Fatal Exception Published!',
            'link' => canonical . '/news/2019/07-01-fatal-exception-published',
            'date' => date(DATE_RFC822, strtotime('July 1, 2019'))
        ),
        array(
            'include' => 'news/2019/include-06-30-new-website.html.twig',
            'name' => 'New Website Launched',
            'link' => '',
            'date' => date(DATE_RFC822, strtotime('June 30, 2019'))
        )
    )
));
