####What is Neosmith CRM?

##Description
The target of this WebApp is to bring small to medium companies a global solution, 
that will be able to manage their Clients, the Products they sell, a
section where they will be able to generate Orders concerning both and a unique
place to have a control of them all.


##Functions


#Clients
From this section we will be able to Create Clients, given some basic info like:
Dni, Name, Surname, Address, City, Country, Phone and Email.

Once this info is introduced and generated this Client, it'll be able to recieve
updates on that information or maybe delete it from our database.

Also, a table with some info of the Clients will be able, in order to manage them.


#Products
Products section is likely the previous one, we will be able to create products
according to this info:
Ref, Brand, Model, Stock, Description, Dealer, Price and Dealer Price.

Having changes of stock, updating prices, changing dealers or other attributes 
of a Product won't be a problem cause we will be able to change it directly from
the web. Also given the case, we will be able to delete a Product.

Listing the Products into a table isn't a problem, from where we will be able to
do all the operations.


#Orders
Orders section is a place, where we will be using as a "selling" place. Into
here, we will be able to load the data of a Client, and then assign to his/her
order, a different amount of products. This will generate a request with all
the information and also calculating the prices of it.

As obvious implementation, leter on, we will be able to see all of our orders,
and change the current state. Giving them a "Payed", "Reserved", or other status.


#Dashboard
Into this section, we will find a group of useful information that will allow
us to manage in a stroke of eye our Clients, Products, and Orders.
For example, we will be able, to see, the Products that are under a "low" stock,
see the "Reserved" orders, or visualize the earnings by each Client.


####How it's made Neosmith CRM?

This project, has been fully developed into the Cloud 9 platform. (https://c9.io/)

Linux: Ubuntu 14.04.5 LTS, Trusty Tahr
apache, php5, mySQL, MongoDB, Slim, composer, javascript, jquery, easyAutocomplete, graphics

####Structure of the code

####References


#Improvements