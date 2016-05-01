## Synopsis

This project allows to you get a two factor validation for different purposes. Is a way to enforce your security website sending two tokens for differentes channels but they need to match in your bussiness logic.
The channels are email and sms.

## Requirements

To use this tool is necessary have an account in the providers for SMS and EMAILS. In this package we have available two clients to use that are:

- www.portatext.com
- www.sendgrid.com

Be sure to have your accounts and get your API-KEYS-ID. Otherwise if you can't use this providers, you can extends the package creating a class for each new client that you need.

## Code Example

Is very simple use this package, with the correct configuration, the only thing you need to do in your app is create an instance of TokenEmailSms::

```php
$tokenEmailSms = new TokenEmailSms;
```

Then is necessary set the variables of our recipients:

```php
$tokenEmailSms->setAddress('test@test.com', '123456789');
```

And the next thing you need to do is only send the tokens to the two channels:

```php
$tokenEmailSms->send();
```

Now it depends on your bussiness rules but something common to do is get the two generated tokens and saved in your database to do whatever you need to do, this is the place where you are creative and validate in this point that the tokens works together:

```php
$tokenEmailSms->tokenSms():
$tokenEmailSms->tokenEmail():
```

If you set this two tokents with an id and status in your database, when the user enter the two tokens you will validated and if not match, something is wrong.

## Motivation

I wrote this package because i need to found an extra secure way to validate some distracted users. They can lose his phone or may be the password email, but in exceptional cases the same person will find both channels together. It's not extra safe, but it try to be more closer to reality.

## Installation

To install this project is necessary do the following steps:

#### 1 - Composer update
Run composer update to install the libraries.

```php
composer.phar update
```

#### 2 - Set the config file.

A file called ``` token-email-sms-config-example.php ``` is provided. You need to set your own file and called ``` token-email-sms-config.php ``` and set your own credentiales to get TokenEmailSms works. The file is very well described so the only thing you need to do is change the variables from the arrays 'email' and 'sms'.

## Tests

Once you have the installation finish and correct setting you can run the tests with:

```
vendor/bin/phing test
```

## Contributors

1. Fork it!
2. Create your feature branch: `git checkout -b my-new-feature`
3. Commit your changes: `git commit -am 'Add some feature'`
4. Push to the branch: `git push origin my-new-feature`
5. Submit a pull request :D

## License

The source code is released under Apache 2 License.

Check [LICENSE](https://github.com/PortaText/php-sdk/blob/master/LICENSE) file for more information.