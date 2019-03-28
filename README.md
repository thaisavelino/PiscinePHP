# PiscinePHP
A 42 challenge

# How to use it

## Day03

### ex00

The PAMP is like a LAMP from school but its not working.
So you can run the server in another way. Like:

`php -S localhost:8100 -t ~/http/MyWebSite`
* Don't forget to create the folder **"~/http/MyWebSite"**

Or using Docker:
`docker run -v /sgoinfre/goinfre/Perso/tavelino/projetos/PiscinePHP/Day03:/var/www/html -p 8100:80 -p 3306:3306 --restart=always lioshi/lamp:php`

