# Capstone Deliverable #1
#### feature/configuration
👍 Contem original project after run command and change file.
<br />command: composer install
<br />command: npm install
<br />command: npm run dev
<br />change file: env
<br />command: php artisan migrate
<br />command: php artisan storage:link
<br />command: php artisan serve

## Add “missing” functionality
#### feature/cap1-category-delete
👍 Add delete functionality to the manage categories page but only show the delete button 
when there are no items currently in that category. Also within the delete category method on 
the controller, ensure that there are no items currently using the category before allowing the 
DELETE query to execute

#### feature/cap1-item-picture-upload
👍 Add the picture upload field in the edit item form. If the field is blank (i.e. no new picture to 
replace), do nothing to the existing picture. If the field isn’t blank, delete the old picture, move 
the new picture into the images directory, and update the picture name in the database

👍 Delete the item image when deleting an item

#### feature/cap1-WYSIWYG-editor
👍 Add WYSIWYG editor to the item description on the add/edit item pages

## Add user authentication
#### feature/cap1-authentication 
👍 Add user authentication to your app using laravel’s make auth feature. Modify your item and 
category controllers to be accessible only to authenticated users. Also, modify your routes for 
items and categories to be accessible only to authenticated users.

# Capstone Deliverable #2
## Web Site Design
#### feature/cap2-web-site-design  
👍 Your product list page must have a minimum of 3 categories (links) in a vertical table at the 
left of the page (which will be pulled from the database). Your product listing (table on right) 
will display all products in the database. You must mock-up at least 2 rows of products. For 
each product, you will display a thumbnail picture, the title of the item, the price and a “buy 
now” button. When you click on either the thumbnail or title, you will be brought to the details 
page where you will display a larger picture plus all other fields that are required to be stored 
(title, product_id, description, price, quantity, sku).

## Connect inventory system to design prototype
#### feature/cap2-connect-inventory-design 
🏗️ working ...
Create a public controller and routes for your public store pages. Categories and items are 
to be passed to the views and dynamically displayed. When a category link is followed, only 
products in that category are to be displayed

## Add image resizing into add item/check add item and edit item/check edit item
#### feature/cap2-prefix-resize-image
🕛 waiting ...
After the image is moved into the images directory, resize the picture so that the thumbnail 
matches the width in your mockup (prefix filename with tn_). Do a second resize so this one 
matches the width in your product display mockup (prefix filename with lrg_). 
o Use laravel’s image intervention to resize and save your image


