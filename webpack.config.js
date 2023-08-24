const path = require('path');

module.exports = {
    resolve:{
        allias:{
            '@':path.resolve('resources/js'),
        },
    },
    devServer:{
        inline: true,
        hot: true,
        stats:'minimal',
        contentBase:__dirname,
        overlay: true,
        historyApiFallback: true
        
    },
};