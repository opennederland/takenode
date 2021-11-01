# TakeNode

Read more about TakeNode [here](https://takenode.org/info). If you want to develop your own version of TakeNode then you're welcome to use this repository.

## Installation and configuration
This is a PHP application that can be run on a standard LAMP or LEMP stack. The minimum required PHP version is 7.1.0 or higher.

 - Create a database and execute `db/schema.sql` to create the required database table
 - Copy `config/config-example.php` to `config/config.php`
 - Fill in your desired [time zone](https://www.php.net/manual/en/timezones.php)
 - Fill in your database credentials
 - Fill in the `BASE_URL` of your application

That's all. You should be able to run the application.

For building the assets we use [CodeKit](https://codekitapp.com/).

## SimpleSAMLphp and Signicat
The "Verified by IRMA" option in Step 2 depends on a SimpleSAMLphp application that is used to receive a user's identity via [Signicat](https://www.signicat.com/). If you wish to provide this to your users you have to contact Signicat to set this up. Alternatively you can take this option out or replace it with a different identity provider.

## License
The code is licensed under a [GNU GPLv3](LICENSE) license.

The TakeNode logo is licensed under a [CC BY NC 4.0](https://creativecommons.org/licenses/by-nc/4.0/) license.

The background images in `assets/backgroundimages` are licensed under ...
