# email_parse
Drupal 8 utility module for parsing travel confirmation emails. Module extracts airline name, passenger first/last and the record conformation number. 

# Usage
Module requires `mailparse` php extension and `php-mime-mail-parser` library.\
More info at https://github.com/php-mime-mail-parser/php-mime-mail-parser on that. 

In your Drupal docroot run: `composer require php-mime-mail-parser/php-mime-mail-parser` then enable module. 

Samples of module output can be seen at:

/airline\
/firstName\
/lastName\
/recordLocator

You can also include the module or use class `emailParse` to use the functionality in another module. 

