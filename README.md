# StackMailr

**StackMailr** is a PHP application to send bulk emails to multiple recipients at once. It is intended to be hosted locally for personal or small-scale use. Please ensure you comply with all email sending regulations, as any misuse may lead to legal consequences.

> **Disclaimer**: Do not use this application for spam or any other form of unsolicited email. You are solely responsible for any misuse of the application.

## Configuration

Before you start, you need to configure the application by editing the `config.json` file with the following values:

```
  "appName": "Your Application Name",      // Name of your application (can be anything)
  "favicon": "path/to/favicon.ico",         // Path to your favicon
  "logo": "path/to/logo.png",               // Path to your application logo
  "theme": "astral",                        // Theme name, "astral" is the current theme
  "SMTP_HOST": "your.mailserver.com",       // SMTP server hostname (e.g., smtp.gmail.com)
  "SMTP_PORT": 587,                         // SMTP server port (usually 587 for TLS)
  "SMTP_MAIL": "your-email@example.com",    // Your email address
  "SMTP_PASSWORD": "your-email-password",   // Your email password (use App Passwords for Gmail: https://myaccount.google.com/apppasswords )
  "SMTP_SENDER": "Your Name"                // The name displayed as the sender
```

## Setup

Requirements

- PHP 7.4+
- Composer (PHP dependency manager)
- If you don’t have Composer installed, you can get it from [here](https://getcomposer.org/download/).

Installing PhpMailer

To send emails, you need to install PhpMailer. Run the following command to install it via Composer:

```
composer require phpmailer/phpmailer
```

## Running the Application

After installing the dependencies, you can run the application locally using a web server like Apache or Nginx.

- Ensure your web server is set up to serve PHP files.
- Place the project files in the appropriate directory for your web server.
- Access the application in your browser by navigating to http://localhost/your-app.


## TODO

[x] JSON based email storage

[ ] MySql based email storage


## Modifications

- Reselling or distributing this project as your own is strictly prohibited.
- Credits must be given in any modifications or custom versions of this project.
- Contributions: If you have improvements or bug fixes, feel free to submit a pull request. Contributions are highly appreciated!
