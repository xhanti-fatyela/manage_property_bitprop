# Manage Property - BitProp

## Setup and Installation

1. Clone the repository: git clone https://github.com/xhanti-fatyela/manage_property_bitprop.git
2. The is a database file called home_db.sql that is where all queries are stored to configured database


## Project Overview

Manage Property is a web application built for BitProp, a property management company. It allows users to post properties for sale or rent and facilitates communication between property agents and potential buyers or tenants.The objective was to create a centralized, efficient, and easy-to-manage system that can cater to all aspects of real estate property management.

A user is able to get in the site and view available property listed in the site, to perform other tasks a user must login or signup, once that is done a user is able to view property details, send enquries or email the agent.user is also able to do a filtered search for a property or just view all listings, on the help side user is able to access info about the site and also able to contact the company the message they send can be viewed by the admin on the admin side.
On the admin side. the admin is able to view how many properties are on the site, how many users are using the site, be able to control admin access and view messages sent by users the have the  power to remove any unwanted properties, users and message. use this url to access the admin panel http://localhost/real_estate/project/admin/login.php , once accessed the default login details are provided for you to login. in the database folder I have provided a query to insert in the database, details that will allow to login into the admin panel. 


## Technologies Used

- HTML
- CSS
- Javascript
- SweetAlert(Libririe for popup boxes)
- PHP
- MySQL

## More Info 

Instead of using python for Implementing backend logic I used PHP, PHP is good for web development, while Python is used for a wider range of applications, including scientific computing, data analysis, and machine learning. PHP strongly supports object-oriented programming features such as data encapsulation, inheritance, abstraction, polymorphism, etc. PHP scripts are generally way more seamless and faster than other scripting languages. Users can load their web pages faster, and they find it pretty convenient as they do not have to put in any effort.
PHP code runs faster than almost every programming language as it runs in its own memory space. Not just that, PHP’s connection with databases is also very smooth and efficient.

For the email notification API I used Mailtrap, it is easy to configured and works well, I have included a external call for email notification, once the email button is pressed an email is sent to the agent.
I had issue with storing the images aswell as they were not displaying one uploaded this issues is caused by how they are stored in the database. I saw that the solution  is to store images in directories on the file system and store references to the photos in the database. 

## Code explained 
(here I will write the file name and explain what it does)

# home.php :

The code includes two PHP files: connect.php and save_send.php. connect.php contains the database connection details and establishes a connection to the database. save_send.php handles saving and sending functionality related to the properties.
Cookie Check: It checks if a user ID is stored in a cookie named user_id. If it exists, the user ID is retrieved and stored in the variable $user_id. If not, $user_id is set to an empty string.
HTML Structure: The code then renders an HTML page, which includes:
A header section (user_header.php) that contains navigation links or user-related information.
Three main sections: Home, Services, and Listings.
Search Form: In the Home section, there's a form for searching properties. It includes input fields for location, property type, offer type, and budget range.
Services Section: Displays various services related to buying, renting, and other property-related services.
Listings Section: Displays the latest property listings from the database. It retrieves properties from the database using a SQL query and displays them in a loop. Each property is displayed with its details like price, name, location, type, etc. It also includes buttons for saving the property and sending an inquiry.
JavaScript Interaction: There's a script at the end that handles an input range element (#range) and updates the value displayed (#output) based on user input.
External Libraries: It includes Font Awesome and SweetAlert libraries for icons and notifications, respectively.

# update.php : 

User Information Update: It retrieves the user's information from the database based on the user ID obtained from the cookie. This information is used to prefill the input fields in the HTML form.
Form Submission Handling: If the form is submitted ($_POST['submit'] is set), it performs the following actions:
Retrieves the form input values for name, email, phone number, old password, new password, and confirm password.
Sanitizes the input values using filter_var.
Checks if the old password matches the user's current password and if the new password matches the confirm password.
Updates the user's name, email, phone number, and password in the database if the input values are valid and meet certain conditions.
Displays success or warning messages based on the outcome of the update operations.
HTML Markup: The script then renders an HTML page with a form for updating the user's account information. The form includes input fields for name, email, phone number, and passwords.
External Libraries: It includes external libraries such as Font Awesome and SweetAlert for icons and notifications, respectively.

# mail.php : 

This code is used to send an email notification using the Mailtrap service It includes necessary classes and dependencies using the require statement and the Composer autoloader.
Mailtrap Configuration: It sets up the Mailtrap configuration by providing the API key. This key is used to authenticate and authorize access to the Mailtrap service.
Email Composition: It composes an email using the Symfony Mime component. The email is created with the sender's address (mailtrap@demomailtrap.com), recipient's address (xmanmrcool@gmail.com), subject (Interest in Property), and text content (Hi, thank you for your interest in one of our properties you will be hearing from one of our agents soon).
Category Header: It adds a custom category header to the email using the CategoryHeader class. This header is used for categorization or filtering purposes within the Mailtrap service.
Email Sending: It sends the composed email using the Mailtrap client. The sending()->emails()->send() method is called with the email object as the parameter.
Response Handling: It retrieves the response from the Mailtrap service and converts it to an array using the ResponseHelper::toArray() method. This response may contain information about the status of the email sending operation.
Debugging: It uses var_dump to output the response array for debugging purposes.

# register.php

This code handles user registration functionality for a web application, this code allows users to register for the web application by providing their name, email, number, and password. It ensures data security through input sanitization and prevents duplicate email registrations. After successful registration, it authenticates the user and sets a cookie for future sessions..Form Submission Handling: If the registration form is submitted ($_POST['submit'] is set), it proceeds with user registration.
Data Sanitization: It sanitizes user input data obtained from the registration form fields (name, email, number, password, confirm password) using filter_var and FILTER_SANITIZE_STRING to prevent SQL injection and cross-site scripting (XSS) attacks.
Email and Password Validation: It checks if the email is already taken by querying the database. If the email is available, it proceeds with password validation. If the password matches the confirmation password, it proceeds with user insertion into the database.
User Insertion: It inserts the user's data (name, email, number, password) into the users table of the database using prepared statements to prevent SQL injection.
User Authentication: After successful registration, it verifies the user by querying the database with the email and password. If a matching user is found, it sets a user ID cookie with a one-month expiry time and redirects the user to the home page (home.php).
HTML Form: It contains an HTML form for user registration. The form includes fields for the user's name, email, number, password, and confirmation password. It also provides a link to the login page for users who already have an account.
JavaScript and CSS Includes: It includes links to external JavaScript libraries (SweetAlert) and custom CSS and JavaScript files for styling and functionality.
Footer and Message Components: It includes footer and message components, likely for displaying notifications or messages to the user.

# contact.php 

This code facilitates user interaction with the website through a contact form. It ensures data security, prevents duplicate messages, and provides feedback to the user upon form submission. Additionally, it includes an FAQ section and styling for the webpage. .Form Submission Handling: It checks if the form with the name send has been submitted (isset($_POST['send'])). If the form is submitted, it proceeds with the message sending process.
Data Sanitization: It sanitizes the user input data obtained from the contact form fields (name, email, number, and message) using filter_var and FILTER_SANITIZE_STRING to prevent SQL injection and cross-site scripting (XSS) attacks.
Message Sending: It checks if a message with the same name, email, number, and message already exists in the database. If it does not exist, it inserts the message details (name, email, number, and message) into the messages table in the database.
Displaying Messages: It displays success or warning messages based on the result of the message sending process.
HTML Form: It contains an HTML form for contacting the website. The form includes fields for the user's name, email, number, and message. Upon submission, it sends the message to the server for processing.
FAQ Section: It includes a section for frequently asked questions (FAQs) with collapsible boxes containing questions and answers.

# post_property.php 

This code allows authenticated users to submit property postings through a form, handles the upload of property images, and stores the property information in a database. It also provides feedback to the user upon successful or unsuccessful submission. Data Sanitization: It sanitizes user input data obtained from various fields of the property posting form, such as property name, price, address, etc., using filter_var with FILTER_SANITIZE_STRING. This helps prevent SQL injection and XSS attacks.
File Upload Handling: It handles the upload of property images (image_01, image_02, image_03, image_04, image_05) using move_uploaded_file. Before uploading, it checks the file size and ensures that it doesn't exceed a certain limit.
Checkbox Handling: It handles checkboxes related to property amenities (lifts, security guard, playground, etc.) and stores their values accordingly.
Database Insertion: It inserts the sanitized form data into the property table in the database using a prepared statement.
Success and Warning Messages: It provides success and warning messages based on the outcome of the property posting process.

# search.php 

This code combines PHP and HTML to create a dynamic search page for property listings, allowing users to filter and view listings based on their preferences .HTML Head Section: It contains the HTML head section with meta tags, title, and links to external CSS and JavaScript files (like Font Awesome and custom styles and scripts).
User Header: It includes a user header component. This could be a navigation bar or some other user-specific information displayed at the top of the page.
Search Filter Section: This section contains a form with various filter options like location, offer type, property type, number of bedrooms, budget range, status, and furnishing status. Users can input their search criteria here.
PHP Processing of Form Data: After the form is submitted, PHP code processes the form data based on whether it's a regular search or a more detailed search (h_search). It sanitizes the input data to prevent SQL injection attacks.
Database Query: It constructs a SQL query to retrieve property listings based on the user's search criteria. The query selects properties from the property table in the database, filtering by various parameters like location, type, offer, price range, etc. The query results are ordered by date in descending order.
Listings Section: This section displays the property listings fetched from the database. It checks if there are any search results and then iterates over each property, displaying details such as the property image, price, name, location, type, offer, number of bedrooms, status, furnishing status, and square footage. It also includes buttons to view the property details and send an enquiry.
JavaScript for Filter: It includes JavaScript to handle the filter button's click event, toggling the visibility of the search filter section.
External Scripts and Footer: It includes external JavaScript libraries and a footer component.
Custom JavaScript: Finally, it includes custom JavaScript code to handle the filter section's close button.

# admins.php

This code is  for an admin panel page where administrators can manage other administrators. Admin Authentication: It checks if the admin_id cookie is set. If it is set, it assigns the value of the admin_id cookie to the $admin_id variable; otherwise, it assigns an empty string to $admin_id and redirects the user to the login page.
Admin Deletion: If the form with the name delete is submitted, it retrieves the delete_id from the form data and sanitizes it. Then, it verifies if an admin with that ID exists in the database. If it does, it deletes the admin record from the admins table and displays a success message; otherwise, it displays a warning message.
HTML Head Section: It contains the HTML head section with meta tags, title, and links to external CSS and JavaScript files (like Font Awesome and custom styles and scripts).
Admin Header: It includes an admin header component, likely containing navigation links or other admin-specific information.
Admins Section: This section displays a list of admins. It includes a search form where admins can search for other admins by name. The PHP code dynamically generates the admin boxes based on search results or all admins if no search query is provided.
Search Functionality: If a search query is submitted, it retrieves the search query from the form data, sanitizes it, and performs a database query to select admins whose names match the search query.
Admin Boxes: It iterates over each admin retrieved from the database and displays their name. If the admin is the currently logged-in admin, it displays additional options like updating the account or registering a new admin. If it's another admin, it displays an option to delete that admin.

# I have explained some of the important files with important code that play a crutial role in the site.

  
