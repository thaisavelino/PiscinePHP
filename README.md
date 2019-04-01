# PiscinePHP
A 42 challenge

# How to use it

## Day03

### ex00 - Configure the server

The PAMP is like a LAMP from school but its not working.

So you can run the server in another way. Like:

`php -S localhost:8100 -t ~/http/MyWebSite/d03`

For this exercizes we must do it using our computer location like e1r12p16 like: 
`curl --user zaz:jaimelespetitsponeys http://eXrXpX.42.fr:8xxx/ex06/members_only.php`

So we must use 0.0.0.0
`php -S 0.0.0.0:8100 -t /sgoinfre/goinfre/Perso/tavelino/projetos/PiscinePHP/Day03`

Another option is using Docker:
`docker run -v $PATH_FOR_YOUR_PROJECT:/var/www/html -p 8100:80 --restart=always lioshi/lamp:php5`

**Testing project**

Like we did in Docker-1 project, you must access your project using the browser and selecting the folders with exercizes and the page you want to access:
`http://eXrXpX.42.fr:8100/ex01/phpinfo.php`

or using curl command is the same:
`curl http://eXrXpX.42.fr:8100/ex01/phpinfo.php`

## Day 05
For day 05 we must install [MAMP](https://bitnami.com/stack/mamp/installer).
