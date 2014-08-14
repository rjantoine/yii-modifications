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

### modify index.php
## Add custom unique files per server
# switch ($_SERVER['SERVER_NAME']) {
# 	case "{Server 1 name}":
# 		$config=dirname(__FILE__).'/protected/config/server_local.php';
# 		break;
# 	case "smiletime.ca":
# 		$config=dirname(__FILE__).'/protected/config/server_{server_alias}.php';
# 		break;
# 	default:
# 		$config=dirname(__FILE__).'/protected/config/main.php';
# 		break;
# }
## Add require_once(__DIR__.'/protected/vendor/autoload.php');
## above require_once($yii);

## create protected/config/server_local.php and server_{server_alias}.php
# <?php
# 	return CMap::mergeArray(
# 		require(dirname(__FILE__) . '/main.php'),
#		// Include overrides below
#		array(
#		)
#	);

## modify protected/config/main.php
#	...
#	'theme'=>'bootstrap3',
#	...
#	'import'=>array(
#		...
#		'giix.components.*', // giix components
#		'bootstrap.behaviors.*',
#		'bootstrap.helpers.*',
#		'bootstrap.widgets.*',
#		...
#	),
#	...
#	'aliases' => array(
#		...
#		'giix' => 'application.vendor.assisrafael.giix', // change this if necessary
#		'bootstrap' => 'application.vendor.drmabuse.yii-bootstrap-3-module',
#		...
#	),
#	...
#	'modules'=>array(
#		...
#		'gii'=>array(
#			...
#			'generatorPaths' => array(
#				...
#				'giix.generators', // giix generators
#				'bootstrap.gii',
#				...
#			),
#			...
#		),
#		...
#		'bootstrap' => array(
#			'class' => 'bootstrap.BootStrapModule'
#		),
#		...
#	),
#	...
#	'components'=>array(
#		...
#		'messages' => array (
#			'extensionPaths' => array(
#				'giix' => 'giix.messages', // giix messages directory.
#			),
#		),
#		'bootstrap' => array(
#			'class' => 'bootstrap.components.BsApi'
#		),
#		'clientScript' => array (
#			'class' => 'application.components.LessClientScript'
#		),
#		...
#	),

## All these filechanges can be done via the github files
# modifies:
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

