const path = require('path');
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const CssMinimizerPlugin = require("css-minimizer-webpack-plugin");

module.exports = {
    mode: 'development',
    entry: {
        bundle: path.resolve(__dirname, 'www/index.js')
    },
    output: {
        path: path.resolve(__dirname, 'www/dist'),
        filename: '[name].js',
    },
    optimization: {
        minimizer: [
            new CssMinimizerPlugin(),
        ],
        minimize: true
    },
    plugins: [
        new MiniCssExtractPlugin({filename: '[name].css'}),
    ],
    module: {
        rules: [
            {
                test: /\.scss$/,
                use: [
                    MiniCssExtractPlugin.loader,
                    'css-loader',
                    'sass-loader'
                ]
            },
            {
                test: /\.js$/,
                exclude: /node_modules/,
                use: {
                    loader: 'babel-loader',
                    options: {
                        presets: ['@babel/preset-env']
                    }
                }
            }
        ]
    },
};
