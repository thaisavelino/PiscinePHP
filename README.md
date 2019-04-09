# PiscinePHP
A 42 challenge

*Here I put some tips for you do your projects and don't loose time to start. But after piscine is better learn more about Server. Good Luck!* =)

## Running PHP Server
After Day03 we need a webserver to run our projects. The first exercize is to configure a Server using PAMP.

**ex00 - Configure the server**

The PAMP is like a LAMP from school but its not working.

So you can run the server in another way. Like:

`php -S localhost:8100 -t ~/http/MyWebSite/d03`

For this exercizes we must do it using our computer location like e1r12p16 like: 
`curl --user zaz:jaimelespetitsponeys http://eXrXpX.42.fr:8xxx/ex06/members_only.php`

So we must use 0.0.0.0
`php -S 0.0.0.0:8100 -t /sgoinfre/goinfre/Perso/tavelino/projetos/PiscinePHP/Day03`

Another option is using Docker:
`docker run -v $PATH_FOR_YOUR_PROJECT:/var/www/html -p 8100:80 --restart=always lioshi/lamp:php5`

**Testing your roject**

Like we did in Docker-1 project, you must access your project using the browser and selecting the folders with exercizes and the page you want to access:
`http://eXrXpX.42.fr:8100/ex01/phpinfo.php`

or using curl command is the same:
`curl http://eXrXpX.42.fr:8100/ex01/phpinfo.php`

## MySQL SERVER
For day 05 we must install [MAMP](https://bitnami.com/stack/mamp/installer). During the instalation we don't need all the options Just PHP My Admin.

**Runing MAMP**
1. To run MAMP you must run **manager-osx** located at the folder **MAMP**
2. Then click on **Manage Servers** to start both Apache and MySQL

***note:** If you click on **configure** you can change the PORT*

**How start using PHPmyAdmin**

Just put in your browser localhost, the PORT number and phpmyadmin as:
`http://localhost:8080/phpmyadmin/`

**Where put your Website**

Your website must be at **apache2** > **htdocs** folder.
Then you can see it in your broser, for example:

`http://localhost:8080`

By default it comes with a welcome page from bitnami.. but you can delete it and put your own website.

## Grade
**Day05**
	ex00: OK
	ex01: OK
	ex02: OK
	ex03: OK
	ex04: OK
	ex05: OK
	ex06: OK
	ex07: OK
	ex08: OK
	ex09: OK
	ex10: OK
	ex11: OK
	ex12: OK
	ex13: OK
	ex14: OK
	ex15: OK
	ex16: **KO**
**Grade: 80**

