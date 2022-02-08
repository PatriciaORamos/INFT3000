# Capstone Deliverable #1
#### ☕ feature/configuration ☕
👍 Contem original project after run command and change file.
<br />command: composer install
<br />command: npm install
<br />command: npm run dev
<br />change file: env
<br />command: php artisan migrate
<br />command: php artisan storage:link
<br />command: php artisan serve

## Add “missing” functionality
#### ☕ feature/cap1-category-delete ☕
✔️ Add delete functionality to the manage categories page but only show the delete button 
when there are no items currently in that category. Also within the delete category method on 
the controller, ensure that there are no items currently using the category before allowing the 
DELETE query to execute

#### ☕ feature/cap1-item-picture-upload ☕
✔️ Add the picture upload field in the edit item form. If the field is blank (i.e. no new picture to 
replace), do nothing to the existing picture. If the field isn’t blank, delete the old picture, move 
the new picture into the images directory, and update the picture name in the database

✔️ Delete the item image when deleting an item

#### ☕ feature/cap1-WYSIWYG-editor ☕
✔️ Add WYSIWYG editor to the item description on the add/edit item pages

## Add user authentication
#### ☕ feature/cap1-authentication ☕
✔️ Add user authentication to your app using laravel’s make auth feature. Modify your item and 
category controllers to be accessible only to authenticated users. Also, modify your routes for 
items and categories to be accessible only to authenticated users.

# Capstone Deliverable #2
## Web Site Design
#### ☕ feature/cap2-web-site-design ☕ 
✔️ Your product list page must have a minimum of 3 categories (links) in a vertical table at the 
left of the page (which will be pulled from the database). Your product listing (table on right) 
will display all products in the database. You must mock-up at least 2 rows of products. For 
each product, you will display a thumbnail picture, the title of the item, the price and a “buy 
now” button. When you click on either the thumbnail or title, you will be brought to the details 
page where you will display a larger picture plus all other fields that are required to be stored 
(title, product_id, description, price, quantity, sku).

## Connect inventory system to design prototype
#### ☕ feature/cap2-connect-inventory-design ☕
✔️ Create a public controller and routes for your public store pages. Categories and items are 
to be passed to the views and dynamically displayed. When a category link is followed, only 
products in that category are to be displayed

## Add image resizing into add item/check add item and edit item/check edit item
✔️ After the image is moved into the images directory, resize the picture so that the thumbnail 
matches the width in your mockup (prefix filename with tn_). Do a second resize so this one 
matches the width in your product display mockup (prefix filename with lrg_). 
o Use laravel’s image intervention to resize and save your image

# Capstone Deliverable #3 
#### feature/XXXX
🏗️ working ... To keep track of the shopper, you must use session variables to identify them. You will 
create a session_id and determine their IP address and set them as a session variables 
in your browser. If you cannot retrieve a session id and IP from the session variables, 
you must set them up. This code should appear on every public page.

🕛 waiting ... 
When you press the “add to cart” button, you will insert the item_id, the session_id, IP 
address, and quantity of 1 into a table called shopping_cart. You will then redirect to a 
shopping cart page.

🕛 waiting ... On the shopping cart page, you will retrieve all items for that user and display the title, 
quantity and price in a table. The only field that should be editable is the quantity field. 
To the right of the listing is an update and remove buttons. When update is pressed, you 
will call a route called update_cart. The quantity is updated in the associated controller 
method (do not exceed item quantity in the database), and you are redirected back to 
the shopping cart. When the remove button is pressed, you call the remove_item route, 
delete the item from the shopping cart table in the associated controller method and 
redirect back to the shopping cart

🕛 waiting ...  At the bottom of the items, you should display the subtotal.
