# PiscinePHP
A 42 challenge

# How to use it

## Day03

### ex00

The PAMP is like a LAMP from school but its not working.
So you can run the server in another way. Like:

`php -S localhost:8100 -t ~/http/MyWebSite/d03`

Or using Docker:
`docker run -v ~/http/MyWebSite/d03:/var/www/html -p 8100:80 -p 3306:3306 --restart=always lioshi/lamp:php`

#### Testing project

Like we did in Docker-1 project, you must access your project using the browser and selecting the folders with exercizes:
`http://localhost:8100/ex00/D03.php`