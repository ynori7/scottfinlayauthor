# Scott Finlay's Author Website
The author website of Scott Finlay. See http://scottfinlayauthor.com/

This website uses Twitter Bootstrap as the CSS framework and Twig templates in the backend. To make the site as fast-loading as possible, there's a PHP script which renders the Twig templates and saves them as plain .html files. All CSS and JavaScript files are merged together and minified so that they load quicker.

## Adding a Book
Add a new template to `templates/books/`. Extending `templates/books/base.html.twig`.

Fill the following blocks:
- book_image
- book_title
- publish_date
- book_description
- book_categories
- amazon_link
- page_count
- isbn
- kindle_asin
- paperback_asin

Edit `templates/components/navigation.html.twig` to add a link to the dropdown menu in the navigation.

Edit generate.php to add the book template with desired output html file name.

Run `php generate.php`

## Adding News
Add a new template to `templates/news/YYYY/` prefixed with "include" containing just the body of the article. 

Include this in `templates/news.html.twig`.

Optionally create a page without the "include" prefix which will serve as a landing page. Be sure to set the metadata. If you do this you must add it to `generate.php`.

Run `php generate.php`
