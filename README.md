# CloudComputing-Benthos-website
Here is the source code for our website, the main php files are <b>Guide.php, product-rate.php, after-login.php, before-login.php and comment-history.php</b> <br /> <br />
These are where the main functions lies in. And all of them are connected to the RDS database, every one of them need to call 2~4 tables in our database. Other php files are almost static webpage.<br /> <br />
Guide.php is used to display all the products in our databse, products' price, brand, name, rating and homepagelink info are displayed in this page. user could click rate button to go to the product homepage --- product-rate.php. <b>Function of Guide page:</b> Filtering by Brand name, price group, average review. <b>Special Function:</b>Search by brand name keywords.<br /> <br />
product-rate.php is the product homepage, this page display all the info about a certain product, compare to guide page, this page contains detailed description and other users' review and rating about it. <br /> <br />

befor-login.php is used to collect sign up info and match log in info. <br />
after-login.php is the homepage of a user, we diaplay all the recommended products for the user in this page. <br />
comment-history.php is the page where a user could see his history comment behavior. <br />



