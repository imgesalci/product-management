# PRODUCT MANAGEMENT SYSTEM
    
The Product Management System is a web application designed for basic product management tasks. It allows users to perform CRUD (Create, Read, Update, Delete) operations on product records. This README provides an overview of the project's features, files, and how to set it up.

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

-update_photo.php: Manages the update of product photos. It accepts the desired photo's file name and updates the `productImage` field in the database. Security measures include:
- Checking for file upload errors and handling them appropriately.
- Storing uploaded files in a secure directory.
    
-delete.js: This JavaScript file contains the AJAX code to send the id of the data to deleting.php file in order to delete the data according the id.
    
-update.js: This JavaScript file contains the AJAX code to handle the update operation for product records without a page refresh.

## IMPORTANT NOTES
- Security: The project includes several security measures such as input validation, data sanitization, handling file uploads securely, and using prepared statements for database queries. However, for production use, consider additional security audits and implementing user authentication.

- Database Structure: The provided MySQL table structure is an example for educational understanding. In a real-world scenario, a more comprehensive and organized database structure might be required.

- Improvements: This project serves as a basic example of CRUD functionality. Depending on your use case, consider adding user authentication, input validation, and error handling to create a robust and secure application.

