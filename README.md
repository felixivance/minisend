<p align="center">
<a href="https://laravel.com" target="_blank">
<img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>


## About MiniSend

Minisend is an application to allow clients to send emails through a laravel api, and see stats about their emails on a dashboard.
Built on laravel and vuejs


## How To Install

Clone the project through cloning [master](https://github.com/felixivance/minisend) repository.

Install npm and composer dependencies through npm i && composer install.

## Database Seeders

After installation, ensure to update the .env file with the correct details eg database name
 
then you can run 

php artisan migrate:fresh --seed to populate the database with a default user, 

the email is client@mailsend.com and password is password12345

which can be seen on the UserSeeder

### Create a SendGrid account 

- **[sendGrid](https://sendgrid.com/)** here

update your .env with the following details

``` MAIL_MAILER=smtp
MAIL_HOST=smtp.sendgrid.net
MAIL_PORT=587
MAIL_USERNAME=apikey
MAIL_PASSWORD=
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=
MAIL_FROM_NAME="MiniSend"

```
password gotten from sendgrid and mail from address your verified email address

Learn more from [getting started](https://sendgrid.com/docs/for-developers/sending-email/api-getting-started/)  on sendgrid



### Screenshots
Dashboard
![Image of Yaktocat](https://raw.githubusercontent.com/felixivance/minisend/master/public/screenshots/dashboard.png)

Composing email
![Image of Yaktocat](https://raw.githubusercontent.com/felixivance/minisend/master/public/screenshots/compose.png)

Sending email
![Image of Yaktocat](https://raw.githubusercontent.com/felixivance/minisend/master/public/screenshots/send.png)

view Email
![Image of Yaktocat](https://raw.githubusercontent.com/felixivance/minisend/master/public/screenshots/view.png)
