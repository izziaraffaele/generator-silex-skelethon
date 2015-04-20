'use strict';

var path = require('path');
var yeoman = require('yeoman-generator');
var chalk = require('chalk');


var Generator = yeoman.generators.Base.extend({
    init: function () {
        this.pkg = yeoman.file.readJSON(path.join(__dirname, '../package.json'));
        this.options['projectName'] = this.options['projectName'] || 'myApp';

        this.on('end', function () {
            if (!this.options['skip-install']) {
                this.spawnCommand('chmod', ['-R','777','storage']);
            }
        });
    },
    app: function () {
        // main htaccess
        this.template('_composer.json', 'composer.json',{'projectName':this.options['projectName']});
        this.copy('phpunit.xml.dist', 'phpunit.xml.dist');

        // webroot & bootstrap
        this.directory('app','app');
        this.directory('src','src');
        this.directory('tests','tests');
        this.directory('web','web');

        // the storage folder
        this.directory('storage','storage');
    }
});

module.exports = Generator;
