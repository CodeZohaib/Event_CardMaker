# Event_CardMaker
Create personalized cards easily for birthdays, anniversaries, weddings, and thank-yous with our unique drag-and-drop custom card design feature. Our intuitive platform offers a real-time editing experience, and you can easily download your customized cards in PDF format to enhance the user experience.<br>

This website was developed for our client, **Huzaifa Bin Afzal**, with permission to include it in our portfolio and upload it to GitHub.<br>

**Features**<br><br>
**Different Cards** : You can make various types of cards, such as Birthdays, Anniversaries, Weddings, and Thank Yous<br><br>
**Easy to Use** : It's simple to create and personalize your cards.<br><br>
**See Changes Quickly** : You can see how your card looks as you make changes. <br><br>
**Save and Share** : You can save your cards and share them with friends. <br><br>
**Download Option** : You can even download your cards as PDF files. <br><br>
**Role** : I was the only person working on this <br><br>
**Challenges** : Ensuring user-friendly navigation while enabling real-time changes was a key challenge. The custom card design feature, allowing users to drag content and customize cards, presented another important aspect of the project. <br><br>
**Project Languages Used** :  HTML, CSS, Bootstrap Jquery, PHP , Mysqli PDO, AJAX<br><br>

**Setting Up Your Project** <br>
Before proceeding, ensure that both the project name is set to "cardmaker" and the database name is set to "cardmaker. If you wish to change the project name, follow these steps:"

1. **Change Project Folder Name:**
   - First, navigate to the root directory of your project on your local machine.
   - Rename the folder from "cardmaker" to your desired project name.

2. **Update JavaScript (custom.js) File:**
   - Inside your project folder, find the "custom.js" file.
   - Open it using a code editor of your choice.

   In the "custom.js" file, locate the following line:

   ```javascript
   var pageUrl = window.location.origin + '/cardmaker';
   ```

   Replace `'cardmaker'` with your project's name. For example:

   ```javascript
   var pageUrl = window.location.origin + '/your_project_name';
   ```

3. **Update PHP (allFunction.php) File:**
   - Inside your project folder, find the "allFunction.php" file.
   - Open it using a code editor of your choice.

   In the "allFunction.php" file, locate the following line:

   ```php
   define("BASEURL", "http://localhost/cardmaker");
   ```

   Replace `'cardmaker'` with your project's name. For example:

   ```php
   define("BASEURL", "http://localhost/your_project_name");
   ```

4. **Save Changes:** After making these modifications, make sure to save both the "custom.js" and "allFunction.php" files.

5. **Test Your Project:** Finally, you should be able to run your project with the updated name by accessing it through your local web server.

By following these steps, you've renamed the project folder and updated the JavaScript and PHP files to use the new project name. Make sure that your web server is running, and you should be able to access your project with the new name.

<br><br><br>
**Project ScreenShot** 

![1](https://github.com/CodeZohaib/Event_CardMaker/assets/142882799/00d23401-896a-4563-ba8d-23d8a49316c1)
**Home Page** : Welcome to Card Maker! Explore various card types such as Birthday and Anniversary. Easily create personalized cards, but remember to log in first. If you click on a card without logging in, you'll be redirected to the login page.<br><br><br>


![2](https://github.com/CodeZohaib/Event_CardMaker/assets/142882799/ad90bacf-70e3-4abb-824f-90106ba4f444)
**Register Page** : On our Registration Page, you can sign up to become a member of Card Maker. To get started, provide your full name, email address, password, and confirm your password. You can also add a profile picture to personalize your account. Once you've filled in the details, you'll be ready to create amazing cards.<br><br><br>

![3](https://github.com/CodeZohaib/Event_CardMaker/assets/142882799/19fb6344-d161-456d-baa9-9613d211df4b)
**Login Page** : To access your account, simply enter your registered email and password. Once you're in, you can continue crafting beautiful cards and enjoying our services.<br><br><br>

![4](https://github.com/CodeZohaib/Event_CardMaker/assets/142882799/b719ca36-ca7c-44ef-9751-01ab30394fe7)
**Wedding Card Create Page** : Easily make your ideal wedding card here. Put in event info like names, date, time, and place, plus a message. Choose colors, pictures, and text style – see it all as you go.<br><br><br>

![5](https://github.com/CodeZohaib/Event_CardMaker/assets/142882799/8b7febe4-840f-4156-b35e-869123e63633)
**Eid Card Create Page** : Craft your dream wedding card effortlessly on our platform. Input event details like names, date, time, and location, alongside a personal message. Customize the style with background color, picture, font color, style, and size, all shown in real-time preview.<br><br><br>

![6](https://github.com/CodeZohaib/Event_CardMaker/assets/142882799/29e15e39-d747-45d4-81ae-0f84447682fd)
**Happay Birthday Card Create** : Design a memorable Happy Birthday card effortlessly. Personalize style with colors, images, and fonts. Add recipient's details, birthdate, and heartfelt message, then finish with a special footer. Create a one-of-a-kind card that's sure to bring joy!.<br><br><br>

![7](https://github.com/CodeZohaib/Event_CardMaker/assets/142882799/e1c70dd7-39a8-4c7d-b214-1a403e8a3684)
**Happy Anniversary Card Create** : Make a special Anniversary card easily. Change colors, pictures, and text. Put in who it's for, a message, and a unique footer. It's a heartfelt way to celebrate. <br><br><br>

![8](https://github.com/CodeZohaib/Event_CardMaker/assets/142882799/03b6bc99-c357-4e41-9f7b-8de24933c8d6)
**Thank You Card Create** : Make your Thank You card here. Choose fonts, background style, and text look. Write a title and a thankful message to create a card that shows your appreciation.<br><br><br>

![9](https://github.com/CodeZohaib/Event_CardMaker/assets/142882799/d3d981b5-e095-482f-a347-55f69f50add5)
**Visiting Card Create** : Easily create your Visiting Card: upload a profile image, choose a background style, and select text appearance. Add your details - name, profession, contact info, and social links for a personalized touch.<br><br><br>

![10](https://github.com/CodeZohaib/Event_CardMaker/assets/142882799/b3b18387-cdee-4ddb-ae46-f9dc9fd35a51)
**Edit Your Profile** : <br>
Enhance your profile details easily on the edit page:<br>
Update your Full Name and Email. <br>
Set a New Password and Confirm it securely.<br>
Change your Profile Picture effortlessly.<br>
Effortlessly manage your information and keep your account up to date.<br><br><br>


![11](https://github.com/CodeZohaib/Event_CardMaker/assets/142882799/5bef4582-6a40-4cd8-ab38-b4c1cca2d73c)
**Index2 Page** : <br>
Browse your collection of designed Wedding cards. <br>
Effortlessly update or remove cards as desired. <br>
Share cards with friends for quick and enjoyable viewing. <br>
Download your cards in PDF or image format.<br><br><br>


![12](https://github.com/CodeZohaib/Event_CardMaker/assets/142882799/89a6dba3-25c6-46ec-9b3f-4690b8173820)
**Birthday list Page** :<br>
See all your Birthday cards at a glance.<br> 
Easily update, add, or remove cards.<br> 
Share with friends and download for safekeeping.<br><br><br>


![13](https://github.com/CodeZohaib/Event_CardMaker/assets/142882799/91838fca-b895-42bc-9b94-582ed7771ae5)
**Eid list Page** : <br>
Effortlessly manage your Eid cards<br>
View, update, and share Eid cards easily, and download in PDF format.<br><br><br>


![14](https://github.com/CodeZohaib/Event_CardMaker/assets/142882799/9a6546de-4197-465f-a8a2-0ec34d730f3a)
**Anniversary list Page** : Effortlessly manage, update, and share anniversary cards, with the option to download them in PDF format.<br><br><br>


![15](https://github.com/CodeZohaib/Event_CardMaker/assets/142882799/ec92af19-b557-433f-82fc-84eb0f9ef1f8)
**Thank You list Page** :  Effortlessly manage, update, and share your thank you cards, while also having the option to download them in PDF format.<br><br><br>

![16](https://github.com/CodeZohaib/Event_CardMaker/assets/142882799/cb0a6684-db3a-4517-a2b9-e244935ed529)
**Visiting Card list Page** :   Effortlessly manage, update, and share your visiting cards, with the added convenience of downloading them in PDF format.<br><br><br>

![17](https://github.com/CodeZohaib/Event_CardMaker/assets/142882799/7c817991-2ef4-413d-8e12-ea864c087230)
**Edit Visiting Card Page** :    Edit ALL Information. <br><br><br>

