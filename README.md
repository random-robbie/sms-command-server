# SMS Command Server

**Send SMS messages to control your Linux environment via SMS.**

**Disclaimer:** This project is now considered outdated. For a more current and robust solution, please consider using [V2](link_to_v2).

## Overview

This project allows you to execute shell commands on a Linux server by sending SMS messages. It utilizes a [Textlocal](https://www.textlocal.com/) account to receive and process SMS commands.

## Requirements

*   A [Textlocal](https://www.textlocal.com/) account.
*   A Linux server with `sudo` access.
*   A MySQL database.

## Setup Instructions

1.  **Configure `sudo` access:**

    Add the following line to your `/etc/sudoers` file to allow the web server to execute commands without a password:

    ```
    www-data ALL=(ALL) NOPASSWD: ALL
    ```

2.  **Database Setup:**

    Import the `commands.sql` file into your MySQL database. This will create the necessary table for storing commands.

3.  **Application Configuration:**

    *   In `index.php`, update the following configuration variables:

        ```php
        // configuration
        $dbtype     = "mysql";
        $dbhost     = "localhost";
        $dbname     = "commands";
        $dbuser     = "YOUR_DATABASE_USERNAME";
        $dbpass     = "YOUR_DATABASE_PASSWORD";
        $smskey     = "YOUR KEYWORD ";  // NOTE: A trailing space is required.
        $number     = "AUTHORIZED_MOBILE_NUMBER"; // The mobile number authorized to send commands.
        ```

    *   In `functions.php`, update your Textlocal API credentials:

        ```php
        // Authorisation details.
        $uname = "YOUR_TEXTLOCAL_EMAIL_ADDRESS";
        $hash  = "YOUR_TEXTLOCAL_API_HASH";
        ```

4.  **Textlocal Webhook:**

    In your Textlocal account settings, configure the inbox to forward messages to the URL of your `index.php` script.

## Usage

To add a new command, insert a new row into the `commands` table in your database:

*   `keyword`: The SMS command you want to use.
*   `command`: The shell command to be executed.

## Support

If you encounter any issues or have questions, please open an issue on this repository.

---

## Recommended Services

**DigitalOcean** - Get $200 credit for 60 days when you sign up and add a payment method.
[![DigitalOcean Referral Badge](https://web-platforms.sfo2.cdn.digitaloceanspaces.com/WWW/Badge%203.svg)](https://www.digitalocean.com/?refcode=e22bbff5f6f1&utm_campaign=Referral_Invite&utm_medium=Referral_Program&utm_source=badge)

**Linode** - Great for security lab setups and testing infrastructure.
[![Linode Referral Badge](https://github.com/pry0cc/axiom/blob/3e8dca3d58a02dc71778492a1fe077e769f93edd/screenshots/Referrals/Linode-referral.png)](https://www.linode.com/lp/refer/?r=f359e3680225dbea12417cec5cb672686febc053)