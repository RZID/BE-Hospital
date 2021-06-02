# Hospital Backend App (API)

## What is this?

This is a backend application project for a hospital which is required on a technical test. This application is built using the PHP Phalcon framework.

## How to use it?

1. Install the PHP Phalcon Framework first. That is <b>required</b>. For the documentation to install the PHP Phalcon Framework, please open the following link : https://phalcon.io/en-us.

2. Run the web server and mysql server

3. Clone this repository with command : `git clone https://github.com/RZID/BE-Hospital.git` in your computer / server.

4. Import the database that reserved in `/documentation/hospital_db.sql` path.

5. Change the database configuration in `/config/config.php`. On the object with the database key, change it according to your computer / server configuration

6. Test with Postman.
   - Open your Postman app
   - Click `file/import` at top-left of the app's tab or you can use shortcut `ctrl + o`
   - After the import modal appears, click `Upload Files`
   - Navigate to path `/documentation/backend_hospital_app.postman_collection.json`
   - Click at the collection menu with name `Hospital App Documentation` and click on `Variables` tab.
   - Change the `URL` - `Current Value` with current endpoint of this backend app.
   - Choose method and send the request. See if the API works.
