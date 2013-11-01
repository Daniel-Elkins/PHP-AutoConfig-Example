#PHP AutoConfig demonstration#

AutoConfig demonstrates a **secure** way to store configuration files for different servers and have them loaded automatically. You can have one for your local development machine, another for a staging server, one for production, another for a subdomain (i.e. admin.mysite.com) and each one can contain completely different settings.

##Benefits##

* **Secure:** Configuration files reside in a private folder to which permissions can be set so that only the root account and the account running PHP/Apache have access. This way, if someone gains access to the file system, they are unlikely to be able to view the database password and other important settings.

* **Automatic:** The sample code provided performs the work for you. No having to constantly change configuration settings and resubmit the code to the different servers.

* **Plug &amp; play:** Just create a new config file for each domain and drop it in the secure folder. Give it the name of your domain (minus the www. portion) and a .php extension and that's it!

* **Default config:** As a fail-safe, a **.default.php** config file exists if there is no file for the domain the code is running on. This should only occur if your server is not setup properly.

##Running the demo##

The code is small and easy to transfer to your current site. However, if you want to run the demo, you will need to configure your server to use virtual hosts. Below is code you can copy &amp; paste into the relevant files.

###hosts###

The Windows hosts file in **C:\Windows\System32\Drivers\etc\hosts** needs these entries added:

    127.0.0.1 autoconfig.local
    127.0.0.1 www.autoconfig.local
    127.0.0.1 autoconfig.com
    127.0.0.1 www.autoconfig.com
    127.0.0.1 debug.autoconfig.local


###httpd.conf###

You need to have Virtual Hosts enabled in Apache's configuration. i.e.

    Include "conf/extra/httpd-vhosts.conf"

###httpd-vhosts.conf###

    <VirtualHost *:80>
      ServerName autoconfig.local
      ServerAlias www.autoconfig.local
      Options All
      DocumentRoot "C:/web/php-secure-auto-config/www"
    </VirtualHost>

    <VirtualHost *:80>
      ServerName debug.autoconfig.local
      ServerAlias debug.autoconfig.local
      Options All
      DocumentRoot "C:/web/php-secure-auto-config/www"
    </VirtualHost>

    <VirtualHost *:80>
      ServerName autoconfig.com
      ServerAlias www.autoconfig.com
      Options All
      DocumentRoot "C:/web/php-secure-auto-config/www"
    </VirtualHost>

    <VirtualHost *:80>
      ServerName autoconfig-invalid.com
      ServerAlias www.autoconfig-invalid.com
      Options All
      DocumentRoot "C:/web/php-secure-auto-config/www"
    </VirtualHost>

Make sure you change the **DocumentRoot** to match the path where you downloaded and are running this code from.