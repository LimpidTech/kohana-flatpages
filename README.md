# kohana-flatpages
#### Brandon R. Stoner <monokrome@monokro.me>

## What is this?

Simply enough, this is just a small module that can be used to load generic views through in Kohana. In example, you can use it to create a view with the path **flatpages/about/terms.php** and auatomatically have access to this view without needing to write a controller action to do so. With the default configuration *(which we'll explain later)* you can now access this URL by simply accessing **yoursite.com/about/terms.html**.

## Getting started

Getting started with this module is very simple. Copy the modules folder into your Kohana root directory, and add the following value to your module array in *application/bootstrapper.php*:

    'flatpages'  => MODPATH.'flatpages',

Now, add this above your default route:

    Route::set('flatpage', '<identifier>.html', array(
    		'identifier' => '.+'
    	))->defaults(array(
    		'controller' => 'flatpage',
    		'action'     => 'index'
    	));

Now, as a test let's add a flat page to the system. Go ahead and create a file with the path *views/flatpages/test.php* and put some content into it. It doesn't matter what's in it, but if you can't decide - you can try typing this:

    Hello, world.

If you visit *yoursite.com/test.html*, the flatpages system will automatically load that view for you. This also works with subfolders, so you could have just as easily named your file *views/flatpages/hello/to/the/world.php* and visited /hello/to/the/world.html

One odd thing to denote is that the system will automatically use the flatpages controller for all URLs ending in .html. Until I find a better method for loading these (since I can't have a controller 'pass' the route to the next route in Kohana) this is the only method that I can use without using a special prefix at the start of the URL.

**Note:** If you prefer to use a prefix, you don't need to use a custom Route. Instead, you can access your flatpage views by using the URL: */flatpage/test*.

Also, if you don't like using *views/flatpages* as the parent folder for flatpages - there is a configuration in *modules/flatpages/config/flatpages.php* that you can copy to *application/config/*. After copying this, you will be able to change the **path_prefix** variable to whichever folder you want your view folder to be called.

**Warning:** Do not leave the **path_prefix** empty unless you understand that all views will be made available through the flatpages controller. This could be useful for development, as you will have direct access to views before writing your controller. Otherwise, it's probably just a security risk.

