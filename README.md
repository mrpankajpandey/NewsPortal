# Local XAMPP Setup for PHP News Website

Follow these steps to set up your PHP news website locally using XAMPP:

## 1. **Clone Repository:**
   ```bash
   git clone https://github.com/yourusername/mrpankajpandey C:/xampp/htdocs/newsapp
```

## 2. Database Setup:

    Open http://localhost/phpmyadmin in your browser.
    Create a new database named <b> newsapp </b> for your website.

## 3. import Database:

Use the command line to import your database:
```bash
 mysql -u root -p newsapp < C:/xampp/htdocs/your-news-website/database/newsapp.spl
```
## 4. Access Website:

    Open http://localhost/newsapp in your browser.

## 5. Access Admin Panel:

     Navigate to the admin panel (e.g., http://localhost/newsapp/admin).
     Log in using admin credentials.
 ## 6.Customization:

     Update configurations in your project files as needed.
## 7. Note:

    Review security settings before deploying to production.
    Update sensitive information like database credentials and admin login details.
## 8. Troubleshooting:

    Refer to XAMPP documentation or community forums for help.
