1. Install Xampp
2. Start apache & mysql within Xampp
3. Once you downloaded GROUP5 App.rar
4. Extract and move to htdocs within the xampp folder ex. ("D:\xampp\htdocs\") -> ex. ("D:\xampp\htdocs\GROUP5_App")
5. Open your preferred browser and open localhost phpmyadmin by inputting localhost/phpmyadmin/ with the URL
6. Create a new Database called playersdb
7. Create a new table within playersdb called players
8. Initialize the vartiables within players:
	id - INT - AUTO_INCREMENT or AI(checkbox)
	pname - VARCHAR - length/values: 50
	email - VARCHAR - length/values: 100
	phone - VARCHAR - length/values: 15
	photo - VARCHAR - length/values: 100
	document - VARCHAR - length/values: 100
	status - ENUM - length/values: '1', '0'
9. Save and then input the following within the URL: "localhost/GROUP5_APP/index.php"
10. Try to add users and fill up credentials.
NOTE: the Document section within the adding user function and update function is still in development
Therefore, the functionality has not yet been implemented as of now.