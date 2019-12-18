# APOUSC
Hello Webmaster. This is the home directory of APO USC's website.

REMEMBER TO NOT NEVER NEVER UPLOAD THE PEM FILE OR EXPOSE ANY LOGIN INFORMATION!!

## STRUCTURE
```.htaccess``` is a Apache config file. It's best to not mess with it unless you know what you're doing.

```index.php``` redirects traffic to the appropriate landing page

The ```css``` and ```js``` folders contain all the styling files used by the website. They are shared resources.

The ```include``` folder contains php files that are required for many pages. It is a shared resource.

The ```admin``` folder contains php files for pages that only administrators can access

The ```alumni``` folder contains php files for pages that only alumni can access

The ```eboard``` folder contains php files for pages that only eboard can access

The ```information``` folder contains php files for pages under 'information' on the website sidebar

The ```rosters``` folder contains php files for pages under 'rosters' on the website sidebar

The ```rosters``` folder also contains the ```family_tree``` folder, which contains the code that generates the family tree on the website

The ```members``` folder contains php files for other pages that general members can access. It also contains ```process.php```, a file that is required for some pages outside of members. process.php is a shared resource.

The ```main``` folder contains resources for Michelle's (Fall 2018) redesigned website. It's css/js/sass/fonts folders are separate from the rest. Goal is to eventually port all the features over in another redesign.

The ```src_archive``` folder contains php files that are not currently in use by the website, but could be useful again in the future or could be used as a template. Code could be outdated.

## SYMLINKS
A Symbolic Link is a file that contains a reference to another file or directory in the form of an absolute or relative path that affects pathname resolution.

Basically it allows us to treat an outside file/folder as part of the current directory by abstracting the path to the target file/folder

For example, if you wanted to make a symlink reference in html folder to a folder called src

```sudo ln -s /var/www/src /var/www/html/src```

Symlinks are useful because it makes including files easier. In the above example, if we had a index.php in html that wanted to include a file from src without using symlinks, we would need to write ```include_once(../src/file)```. With a symlink, we could just write ```include_once(src/file)```.

While it doesn't seem to save that much work in this example, it's very useful for linking directories that are several layers apart. 

I've added symlinks to most folders, and instructions for adding them again in case they break are contained in the README.md files in each folder.

## README UPDATE LOG
-Created by Nick Chen, Spring 2020

-Modified Dec 17, 2019 by Nick Chen, Spring 2020
