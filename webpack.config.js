const path = require('path');

module.exports = {
    mode: 'development',
    entry: {
        bundle: path.resolve(__dirname, 'www/index.js')
    },
    output: {
        path: path.resolve(__dirname, 'www/dist'),
        filename: '[name].js',
    },
};
