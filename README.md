#Divisions of this document:#



#What is Neosmith CRM?


##Description
The target of this WebApp is to bring small to medium companies a global solution, 
that will be able to manage their Clients, the Products they sell, a
section where they will be able to generate Orders concerning both and a unique
place to have a control of them all.

##Functions

###Clients
From this section we will be able to Create Clients, given some basic info like:
Dni, Name, Surname, Address, City, Country, Phone and Email.

Once this info is introduced and generated this Client, it'll be able to recieve
updates on that information or maybe delete it from our database.

Also, a table with some info of the Clients will be able, in order to manage them.

###Products
Products section is likely the previous one, we will be able to create products
according to this info:
Ref, Brand, Model, Stock, Description, Dealer, Price and Dealer Price.

Having changes of stock, updating prices, changing dealers or other attributes 
of a Product won't be a problem cause we will be able to change it directly from
the web. Also given the case, we will be able to delete a Product.

Listing the Products into a table isn't a problem, from where we will be able to
do all the operations.

###Orders
Orders section is a place, where we will be using as a "selling" place. Into
here, we will be able to load the data of a Client, and then assign to his/her
order, a different amount of products. This will generate a request with all
the information and also calculating the prices of it.

As obvious implementation, leter on, we will be able to see all of our orders,
and change the current state. Giving them a "Payed", "Reserved", or other status.

###Dashboard
Into this section, we will find a group of useful information that will allow
us to manage in a stroke of eye our Clients, Products, and Orders.
For example, we will be able, to see, the Products that are under a "low" stock,
see the "Reserved" orders, or visualize the earnings by each Client.


#How it's made Neosmith CRM?


##IDE
Neosmith CRM project, has been fully developed into the Cloud 9 platform. (https://c9.io/)
This platform has allowed me to generate since the begging a fully operational
enviroinment thanks to the ease of creating a PreConfigured Workspace with a
LAMP. From here, I've been adding my other needs into a place with lots of useful
tools that allow you to focus into your programming.

Being able to click a button to turn on your server, and watch the results 
immediately, takes all the time where you have to upload your code the the test
server, run it, see what's good or wrong, return to your ide, and so.

A centralized tool, that allows you to work from anywhere, not being attached to
a fix place, has result into a great discover (given by Xavi Sarda).

##Environment
C9 workspace is a LAMP, with Ubuntu (14.04.5 LTS, Trusty Tahr), Apache, php5 and
mySQL. Apart from that, I've also installed MongoDB (as DDBB), composer, 
Slim (framework which allows to write simpler code, in order to optimize your 
writting and making a bridge work between MySQL, or others for exemple).

Apart from that, i've added a javascript library called Jquery. Also and for 
autocomplete input forms a plugin called easyAutocomplete. And finally a graphics
plugin, from the hand of Google Developers, called Charts.



#Structure of the code


A MVC (Model - View - Controller) has been used for architecture pattern. This 
has allowed me to divide the code into three interconnected parts, what is 
useful for a more eficient code, secure access to the methods and classes, and
a better paralel development.

We will be able to locate into the root folder, a folder called "tfg", this is 
my main folder where all the code I've create remains.

Into this folder, we will see, "lib" directory, where controllers and models 
files are present. And then, the "public" directory is where the view of the 
application live.

All of the directories, are split in 3 parts, Clients, Products, and Orders. We
will also be able to find a 4th one, called Dashboard into "js" (javascript) 
directory, but this one is a mix of some parts of the others.

Also used into the development, and a very important part for the project 
structure, and the behavior of the WebApp, has been the implementation of an API.
This API have helped with the code, interconnecting the requests to the server
with the controllers, and then returning the data to the requested page. All this
controlled with AJAX, resulted into a page that reloads and manage the content
asynchronously which gives a Page from where you can have everything into your
hands. Also the API is reused into other parts of the WebApp, resulting into a
code optimization.

AJAX, helped with Jquery have been the responsible part to create this beautiful
effects of editing, viewing, and creating data from the same place, without
needing more pages to access to (modals also helped into this effect).

A common use that you'll see into the code is the inclusion of:


```
#!php

<?php include(__DIR__.'/resources/inc/header.php'); ?> <!--Header-->
```

and


```
#!php

<?php include(__DIR__.'/resources/inc/footer.php'); ?>
```

Which helped with a centralized solution, for header links, scripts, and titles.
In addition with two variables like the $pageTitle and $type. Each one with it's
own purpose.



#Improvements


As a new growing WebApp, constant changes are done, and lot's of improvements
can be made. Here are some ones I came up with for future implementations.

·Check that all fields are filled, and also with the right type of of data.

·Upload Product images, and be able to manipulate them on the go.

·Control and show all the possible errors (testers needed)

·Sort the tables by columns

·Pagination of the tables, in order to prevent long scrolls

·Search bar for the table information

·When a phone number is inserted into a Client, based on the city, and country
fullfill all the prefixes

·Generate a PDF from the orders



#References


https://c9.io

http://releases.ubuntu.com/trusty/

https://www.apache.org/

http://php.net/

https://www.mysql.com/

https://www.mongodb.com/

https://community.c9.io/t/setting-up-mysql/1718

https://community.c9.io/t/setting-up-mongodb/1717

https://getcomposer.org/

https://www.slimframework.com/

https://jquery.com/

http://easyautocomplete.com/

https://developers.google.com/

https://developers.google.com/chart/



#Contact


For further information, improvements or whatever concerning to this, send me an email to:

sergibartual@gmail.com



#Speciall thanks to


Escoles Universitàries Gimbernat.

My tireless tutor of the project, and professor Xavi Sarda.

Google search engine.

All the people that have put up with me while doing this project.