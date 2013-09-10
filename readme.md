## ![kronicle logo](https://raw.github.com/wilfreddenton/kronicle/master/public/img/kronicle-logo-ultralight.png)

[![Laravel](http://f.cl.ly/items/0f1s1A2w0v0f0G043420/laravel-icns.png)](https://packagist.org/packages/laravel/framework)
![blankspace](http://f.cl.ly/items/1A0I0L0C071q3k3k0s1f/blankspace.png)
[![Bootstrap](http://f.cl.ly/items/2x0n3A1g2Z081c3q1t1K/bootstrap%20icon.png)](https://packagist.org/packages/laravel/framework)
![blankspace](http://f.cl.ly/items/1A0I0L0C071q3k3k0s1f/blankspace.png)
[![Glyphicons](http://f.cl.ly/items/1q2B3e3q0V0P2C3r2v0c/glyphicon%20icon.png)](https://travis-ci.org/laravel/framework)

by [@wilfreddenton](https://twitter.com/wilfreddenton) & [@rogue_whale](https://twitter.com/rogue_whale)

Kronicle is a summber project that we worked on to make ourselves a nice looking blog, a place to store our online portfolios, and a way to teach ourselves more about web development.

### Installation

1. Setting your contact information: open the contact.blade.php and fill in where your email address should go. Then open the mail.php file and fill in the info for the mail account that will be sending the emails. Finally, open the MailController and put in the email address you want to recieve mail.

2. Set your login username and password. Use the sqlite3 command on the production.sqlite database in the app/database folder. Use SQL query 'UPDATE users SET id='yourUsername', password='yourPassword' WHERE id='admin';' to change the login info to your own.

3. Go to yoursite.com/login to login to the blog with your username and password. 

4. Click the plus icon in the navigation bar to create your first post!

To delete the hello world! post just click on the title and the click delete on the post's page.

Thanks
- The Kronicle Team

**All issues and pull requests should be filed on the [wilfreddenton/kronicle](http://github.com/wilfreddenton/kronicle) repository.**

### License

The Kronicle platform is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
