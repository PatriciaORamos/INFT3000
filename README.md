<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

# Capstone Deliverable #1

## feature/configuration
👍 Contem original project after run command and change file.
<br />command: composer install
<br />command: npm install
<br />command: npm run dev
<br />change file: env
<br />command: php artisan migrate
<br />command: php artisan storage:link
<br />command: php artisan serve

## feature/cap1-category-delete
👍 Add delete functionality to the manage categories page but only show the delete button 
when there are no items currently in that category. Also within the delete category method on 
the controller, ensure that there are no items currently using the category before allowing the 
DELETE query to execute

## feacture/cap1-item-picture-upload
👍 Add the picture upload field in the edit item form. If the field is blank (i.e. no new picture to 
replace), do nothing to the existing picture. If the field isn’t blank, delete the old picture, move 
the new picture into the images directory, and update the picture name in the database

👍 Delete the item image when deleting an item
