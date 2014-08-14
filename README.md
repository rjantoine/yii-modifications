#setup application folder
mkdir ~/Sites/{Application Name}
mkdir ~/Sites/{Application Name}/protected
cd ~/Sites/{Application Name}/protected

#install composer
curl -s http://getcomposer.org/installer | php

#setup composer.json
php composer.phar init

# add requirements to composer.json

php composer.phar require yiisoft/yii:dev-master assisrafael/giix:dev-master drmabuse/yii-bootstrap-3-module:dev-master twitter/bootstrap:3.2.*@dev oyejorge/less.php:~1.5

#setup yii application
cd ..
protected/vendor/bin/yiic webapp .

#copy bootstap files to themes/bootstrap3
mkdir themes/bootstrap3/assets
cp -r protected/vendor/twitter/bootstrap/less themes/bootstrap3/assets/.
cp -r protected/vendor/twitter/bootstrap/fonts themes/bootstrap3/assets/.
mkdir themes/bootstrap3/assets/js
cp -r protected/vendor/twitter/bootstrap/dist/js/bootstrap.min.js themes/bootstrap3/assets/js/.

## Make changes to the following files
# index.php
# protected/config/main.php
# protected/config/server_local.php
# protected/components/LessClientScript.php

curl -LOk https://github.com/rjantoine/yii-modifications/archive/master.zip
unzip master.zip
rm yii-modifications-master/README.md
mv yii-modifications-master/* .
rm -r yii-modifications-master
rm master.zip

## TODO - Move this into a script that does everything listed here

