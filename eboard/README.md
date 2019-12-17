This is the eboard folder. It contains php files for pages that only eboard can access.

The symlink files it uses are css, img, include, and js.

Commands for creating/recreating these symlinks
sudo ln -s ../css css
sudo ln -s ../img img
sudo ln -s ../js js 
sudo ln -s ../include include

-Nick
