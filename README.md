==Adding a Book==
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

==Adding News==
Add a new template to `templates/news/YYYY/` prefixed with "include" containing just the body of the article. 

Include this in `templates/news.html.twig`.

Optionally create a page without the "include" prefix which will serve as a landing page. Be sure to set the metadata. If you do this you must add it to `generate.php`.

Run `php generate.php`
