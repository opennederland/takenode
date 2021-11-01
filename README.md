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

The conditions for using the background images in `assets/backgroundimages` can be found in the links below:

 - [landscape/1.jpg](https://takenode.org/certificate?id=313343d2-6ed3-43e7-bfd1-e6d24485601c)
 - [landscape/2.jpg](https://takenode.org/certificate?id=e5f1d32e-7d4a-487d-be92-41b844a4882e)
 - [landscape/3.jpg](https://takenode.org/certificate?id=bb65426e-4147-427a-8dff-813886cc3e45)
 - [landscape/4.jpg](https://takenode.org/certificate?id=78897716-7a69-45ef-985b-0ed7ead66893)
 - [landscape/5.jpg](https://takenode.org/certificate?id=c6e1b797-87b1-41e1-99d2-07f42afbb525)
 - [portrait/1.jpg](https://takenode.org/certificate?id=45f62e00-50e4-48cf-bdcf-5fea532b12a9)
 - [portrait/2.jpg](https://takenode.org/certificate?id=ce10fc39-87b9-4fbe-bb7b-bf2b25480b4c)
 - [portrait/3.jpg](https://takenode.org/certificate?id=45f62e00-50e4-48cf-bdcf-5fea532b12a9)
 - [portrait/4.jpg](https://takenode.org/certificate?id=ce10fc39-87b9-4fbe-bb7b-bf2b25480b4c)
 - [portrait/5.jpg](https://takenode.org/certificate?id=45f62e00-50e4-48cf-bdcf-5fea532b12a9)
