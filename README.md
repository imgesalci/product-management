# PRODUCT MANAGEMENT SYSTEM:
    
The Product Management System is a simple web application mainly built with PHP and MYSQL that allows users to manage product information. It provides basic CRUD(Create, Read, Update, Delete) functionality for product records.

### FEATURES
-Add new products with various details, including product name, prices, taxes, stock status, and an optional image.

-View the list of existing products along with their details.

-Edit product information, including updating prices, taxes, stock status, and images.

-Delete unwanted product records without losing all the data from the database.

### FILES
The project consists of the following main files and functionalities:
    
-database.php: This file handles with database connection.
    
-inserting.php: This file contains the HTML form to add new products and PHP code to insert the product information into the database.
    
-listing.php: This file displays the list of the products and provides options to edit and delete each product. It fetches product data from the database and uses AJAX requests to update and delete products.
    
-deleting.php: This file handles the deletion of product records. It verifies the ID of the product to delete and sets the isDeleted flag in the database to mark the product as deleted.
    
-update.php: This file handles the update of product information. It receives the updated product data from the AJAX request and updates the corresponding record in the database.
    
-delete.js: This JavaScript file contains the AJAX code to send the id of the data to deleting.php file in order to delete the data according the id.
    
-update.js: This JavaScript file contains the AJAX code to handle the update operation for product records without a page refresh.

-update_photo.php: This file handles the update of product photos. It receieves the desired photo's file name and updates the productImage in database.

## IMPORTANT NOTES
This project is intended as a simple demonstration of CRUD functionality in PHP and MYSQL. For production use, consider implementing additional security measures, input validation, and error handling to ensure data integrity and user safety. 

The MYSQL table in this project is an example for understanding the structure of the database accurately. 

The code provided in this project is for educational purposes and may require additional improvements for a real-world application.
