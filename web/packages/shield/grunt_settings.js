module.exports = function( grunt, _configs ){

    // Return path to resource (relative to top-level Gruntfile.js)
    function pkgPath( _path ){
        return './web/packages/shield/%s'.replace('%s', _path);
    }


    /////////////////////////////// CONCAT FILES ///////////////////////////////
    _configs.concat.shield = { files: {} };

    // Main theme stuff
    _configs.concat.shield.files[ pkgPath('js/application.js') ] = [
        pkgPath('js/src/foundation.min.js'), // @todo: modularize to only in-use components
        pkgPath('js/src/debug.js'),
        pkgPath('js/src/plugins.js'),
        pkgPath('js/src/app.js')
    ];


    /////////////////////////////// UGLIFY FILES ///////////////////////////////
    _configs.uglify.shield = {
        options: {
            banner: '<%= banner %>',
            expand: true,
            compress: {
                drop_console: true
            }
        },
        files: {}
    };

    Object.keys(_configs.concat.shield.files).forEach(function(script){
        _configs.uglify.shield.files[script] = script;
    });


    /////////////////////////////// SASSAFRASS ///////////////////////////////
    _configs.sass.shield = {
        options : {
            style   : 'compressed',
            compass : true
        },
        files : [
            {src: [pkgPath('css/src/app.scss')], dest: pkgPath('css/application.css')}
        ]
    };


    /////////////////////////////// WATCH ///////////////////////////////
    _configs.watch.svalinn_sass = {
        files : [pkgPath('css/src/*.scss')],
        tasks : ['sass:shield']
    };

    _configs.watch.svalinn_js = {
        files : [pkgPath('js/src/*.js')],
        tasks : ['concat:shield']
    };

    _configs.watch.generated_css = {
        options : {livereload: true},
        files   : [pkgPath('css/*.css')],
        tasks   : []
    }


    /////////////////////////////// BUILD TASKS ///////////////////////////////
    grunt.registerTask('build', 'Building Svalinn Assets', function(){
       grunt.task.run(['concat:shield', 'uglify:shield', 'sass:shield']);
    });

};