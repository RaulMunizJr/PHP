## Step One: Install Composer

## Step Two: Create your project and install Propel
To add Propel:

Create or go to the project directory
Create a file named composer.json in that directory
Specify in json what dependencies your project needs (propel in this case). The contents of the file should look like this:
'''
{
    "require": {
        "propel/propel": "~2.0@dev"
    }
}
'''
## Step Three: Run composer install in that directory (at the command line)

When composer is done, there will be a sub-directory called vendor in your project, where all the files from third-party dependencies go. You generally won't touch anything in there.

## Step Four: To run the auto build script, you just run vendor\bin\propel.bat init. 
Most of the default options are correct (just hit return), but pay attention to the ones that matter (which db type, database name, yes I have a database, store the generated models in the models directory).

The build process creates files that describe your database to Propel (propel.yml and schema.xml), which it then uses to create model classes. I put my model classes in the models directory, just to be neat. note that propel created a pair of models for each of my tables.

Now here's the part that's not really well explained in the Propel doc (it's further back up the page). PHP has a complicated autoloading system to manage large projects, and one way to access it is through composer. What we need to do here is make composer aware of our newly generated classes, so that it can add them to the autoload system.

## Step Five: Update your composer.json file by adding an additional section to tell composer where you put your generated models. If you didn't put them in the models sub-directory, specific where you did put them instead.
''
{
    "require": {
        "propel/propel": "~2.0@dev"
    },
    
    "autoload": {
      "classmap": [
        "models/"
      ]
    }
}
''
## Last Step: Then run composer dump-autoload, which updates a special file called vendor/autoload.php so that your PHP pages can conveniently include all the models you generated. Any time you make changes to your database and re-generate the models, you should run this again.

Finally! That is the setup process for any project where you want to use Propel to generate your database models for you.


//****************************************************************************//
                       Whats in the files!?
    Under the public folder, recipes.php will be the head-hancho in the project that will be rendering the html pages in templates folder. 
    More details here
    ''
    {
        https://www.slimframework.com/docs/v3/objects/router.html
    }
    ''
//****************************************************************************//

*NOTE!!!!*
*Vendor file is not included so these files alone won't work on your machine. Please follow set up instructions above first.*






