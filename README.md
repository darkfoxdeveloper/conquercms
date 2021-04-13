# conquercms
CMS for ConquerOnline

## Information
This project use a Voyager laravel admin: https://github.com/the-control-group/voyager

## Requeriments
Requeriments of laravel here: https://laravel.com/docs/6.x

**For some servers this CMS require updates in the code or in configuration because of several changes in each source structure of the private server.**

**Not compatible with PHP 7.2.4 or lower**

### Easy deploy
Use the required/conquercms.sql to import the database pre-configured with menus and basic configuration

### Advanced deploy
1. Run the website in your browser and can see a form for fill fields and click to "Configure" button
2. Once created the required things can run the next command: `php artisan voyager:install && php artisan voyager:admin your@email.com --create`
3. Now can create the menus in backend in Tools > Menu Builder
4. Create the `primary` and `secundary` menus and configure each menu with your items
5. Enjoy with **conquercms**

**Note:** in **your@email.com** write your email for the admin account

### Multilang
The strings can be translated using the laravel system and can translate menus to each language you configured in .env file
 
### Errors
Can contact me for report errors in **darkfoxdeveloper@gmail.com**

### Support
Only support for people who have donated something
 
#### Demo user for predefined sql
**Username**: darkfoxdeveloper@gmail.com

**Password**: 1234567890