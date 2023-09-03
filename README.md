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

![1](https://github.com/CodeZohaib/Event_CardMaker/assets/142882799/2cd32bc4-00ac-42c1-92f8-b4b11d982667)
**Home Page** : Welcome to Card Maker! Explore various card types such as Birthday and Anniversary. Easily create personalized cards, but remember to log in first. If you click on a card without logging in, you'll be redirected to the login page.<br><br><br>


![2](https://github.com/CodeZohaib/Event_CardMaker/assets/142882799/ce89094b-2697-4f11-9410-d2e28fe1b821)
**Register Page** : On our Registration Page, you can sign up to become a member of Card Maker. To get started, provide your full name, email address, password, and confirm your password. You can also add a profile picture to personalize your account. Once you've filled in the details, you'll be ready to create amazing cards.<br><br><br>

![3](https://github.com/CodeZohaib/Event_CardMaker/assets/142882799/2c839148-cb6a-4a16-9b08-c87ad18cee35)
**Login Page** : To access your account, simply enter your registered email and password. Once you're in, you can continue crafting beautiful cards and enjoying our services.<br><br><br>

![4](https://github.com/CodeZohaib/Event_CardMaker/assets/142882799/fbbf357c-88c9-4514-8370-3eeb0cb9daf5)
**Wedding Card Create Page** : Easily make your ideal wedding card here. Put in event info like names, date, time, and place, plus a message. Choose colors, pictures, and text style – see it all as you go.<br><br><br>

![5](https://github.com/CodeZohaib/Event_CardMaker/assets/142882799/62b2208d-ceb4-40da-b622-fbd5861a6040)
**Eid Card Create Page** : Craft your dream wedding card effortlessly on our platform. Input event details like names, date, time, and location, alongside a personal message. Customize the style with background color, picture, font color, style, and size, all shown in real-time preview.<br><br><br>

![6](https://github.com/CodeZohaib/Event_CardMaker/assets/142882799/6eefdb0a-0c45-4f8d-b26d-6f05498bb832)
**Happay Birthday Card Create** : Design a memorable Happy Birthday card effortlessly. Personalize style with colors, images, and fonts. Add recipient's details, birthdate, and heartfelt message, then finish with a special footer. Create a one-of-a-kind card that's sure to bring joy!.<br><br><br>

![7](https://github.com/CodeZohaib/Event_CardMaker/assets/142882799/4537d905-7007-47d4-9ce5-18fc40020207)
**Happy Anniversary Card Create** : Make a special Anniversary card easily. Change colors, pictures, and text. Put in who it's for, a message, and a unique footer. It's a heartfelt way to celebrate. <br><br><br>

![8](https://github.com/CodeZohaib/Event_CardMaker/assets/142882799/3fa20adc-5f7a-4477-bd1a-7bc8e4626778)
**Thank You Card Create** : Make your Thank You card here. Choose fonts, background style, and text look. Write a title and a thankful message to create a card that shows your appreciation.<br><br><br>

![9](https://github.com/CodeZohaib/Event_CardMaker/assets/142882799/92b07531-e365-4bae-8e5a-43be82c3117b)
**Visiting Card Create** : Easily create your Visiting Card: upload a profile image, choose a background style, and select text appearance. Add your details - name, profession, contact info, and social links for a personalized touch.<br><br><br>

![10](https://github.com/CodeZohaib/Event_CardMaker/assets/142882799/8c1b0f6a-52ec-4649-9f50-f0072a07af33)
**Edit Your Profile** : <br>
Enhance your profile details easily on the edit page:<br>
Update your Full Name and Email. <br>
Set a New Password and Confirm it securely.<br>
Change your Profile Picture effortlessly.<br>
Effortlessly manage your information and keep your account up to date.<br><br><br>


![11](https://github.com/CodeZohaib/Event_CardMaker/assets/142882799/2af3ca38-08fb-4dae-8b70-69e40927a2ef)
**Index2 Page** : <br>
Browse your collection of designed Wedding cards. <br>
Effortlessly update or remove cards as desired. <br>
Share cards with friends for quick and enjoyable viewing. <br>
Download your cards in PDF or image format.<br><br><br>


![12](https://github.com/CodeZohaib/Event_CardMaker/assets/142882799/9f604dec-a994-4789-9725-8989dbcffa40)
**Birthday list Page** :<br>
See all your Birthday cards at a glance.<br> 
Easily update, add, or remove cards.<br> 
Share with friends and download for safekeeping.<br><br><br>


![13](https://github.com/CodeZohaib/Event_CardMaker/assets/142882799/43de838d-69f6-4d29-9f0f-07cb3384cd3f)
**Eid list Page** : <br>
Effortlessly manage your Eid cards<br>
View, update, and share Eid cards easily, and download in PDF format.<br><br><br>


![14](https://github.com/CodeZohaib/Event_CardMaker/assets/142882799/22c51fa7-c4fe-456e-b903-5ec4c6ad1e7f)
**Anniversary list Page** : Effortlessly manage, update, and share anniversary cards, with the option to download them in PDF format.<br><br><br>


![15](https://github.com/CodeZohaib/Event_CardMaker/assets/142882799/ffe50a83-b367-43d3-b130-7b121d968bb0)
**Thank You list Page** :  Effortlessly manage, update, and share your thank you cards, while also having the option to download them in PDF format.<br><br><br>

![16](https://github.com/CodeZohaib/Event_CardMaker/assets/142882799/1971e6cc-8bfc-4bab-87ed-90f30747f90a)
**Visiting Card list Page** :   Effortlessly manage, update, and share your visiting cards, with the added convenience of downloading them in PDF format.<br><br><br>

![17](https://github.com/CodeZohaib/Event_CardMaker/assets/142882799/e744ceeb-a5d7-4e5a-89b3-8e840b717820)
**Edit Visiting Card Page** :    Edit ALL Information. <br><br><br>

