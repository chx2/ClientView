# ClientView
 A simple web application for storing client notes & contact information.

## How to install ClientView

### Web Server
1. Extract the contents of the app folder to your choice of web server directory.

2. Modify the config.ini in the includes folder to include MySQL login credentials,
you can choose whether to use an existing database or notes.

3. Visit the web directory in a web browser to trigger the installation.

4. When prompted, provide a login username and password then boom, get to viewing!


### Desktop Computer
While not optimal, you can install third-party packages to run ClientView locally:

1. [Install WAMP](http://www.wampserver.com/en/)

2. Once installed, run WAMP(Can run it from search bar). [Consider auto-start on desktop to avoid having to run it every time you want to use it.](https://stackoverflow.com/questions/13761340/have-wamp-start-automatically-upon-windows-start-up-without-logging-on-or-any-u)
3. Copy the app folder to C:\wamp64\www(Or whatever directory you put the WAMP files into)

4. Open your browser of choice & type in localhost/app(Note, you will use this url to access this app in the future)

5. Follow the steps to complete installation

### Requirements

* Working connection to MySQL
* PHP Version 7.0+
* Sessions Enabled
* Apache Webserver

### Third-Party Tools

* [jQuery](https://jquery.com/)
* [Materialize Framework](https://materializecss.com/)
* [jQuery-Tabledit](https://markcell.github.io/jquery-tabledit/)

### FAQ

1. I can't go through the installation process?

Make sure you have the required software listed above or the installation will
not work. If there are issues with the script creating the necessary database &
tables, make sure you provided credentials in config.ini. Note: some server hosts
force a prefix for databases, so you may have to create your own database if the auto
creation does not work.

2. How do I make more login accounts?

Move the backup register.php file from the install directory to the home directory.
Move the file back or delete it when you are done making accounts.

3. I need to reinstall the program, can I do this without deleting everything?

Move a copy of install.txt from the install directory to the home directory. If you
need another account, do the same with the copy of register.php there.

4. There is a bug in the application, what do I do?

File a bug report here detailing what file the error occurred on.
