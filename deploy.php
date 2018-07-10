<?php
namespace Deployer;

require 'recipe/silverstripe.php';

// Project name
set('application', 'my_project');

// Project repository
set('repository', 'https://jiangxupan%40gmail.com@github.com/konkerj/directory.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true); 

// Hosts
host('staging')
    ->hostname('web1.b-web.co.nz')
    ->user('xupan')
    ->port(22)
    //->configFile('~/.ssh/config')
    ->identityFile('~/.ssh/id_rsa')
    ->stage('staging')
    ->set('deploy_path', '/var/test-dev'); 

task('pwd', function(){
    $result = run ('pwd');
    Writeln("Curernt Directory: $result");
        }
    );
    

desc('Deploy your project');
