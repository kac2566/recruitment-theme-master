const path = require('path');
const TerserPlugin = require('terser-webpack-plugin');
const CssMinimizerPlugin = require('css-minimizer-webpack-plugin');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');
const glob = require('glob');

const blocksScssFiles = glob.sync('./includes/blocks/*/assets/styles.scss');
const blocksJsFiles = glob.sync('./includes/blocks/*/assets/index.js');

console.log(...blocksScssFiles);

const config = {
  //Your path to dist accessed from a browser
  distPath: '/wp-content/themes/recruitment-theme/dist/',
  //Your local development url for browsersync
  localUrl: 'http://localhost:8080',
  //Open new window each time 'npm run serve' command is executed
  openWindow: false,
};

module.exports = {
  optimization: {
    minimizer: [
      new TerserPlugin({
        terserOptions: {
          sourceMap: true,
        },
      }),
      new CssMinimizerPlugin({
        minimizerOptions: {
          preset: ['default', { discardComments: { removeAll: true } }],
        },
      }),
    ],
  },
  devtool: 'source-map',
  plugins: [
    new MiniCssExtractPlugin({
      filename: 'style.css',
    }),
    new BrowserSyncPlugin({
      proxy: config.localUrl,
      files: ['**/*.php'],
      reloadDelay: 0,
      open: config.openWindow,
    }),
  ],
  entry: {
    assets: [
      '@babel/polyfill',
      './src/js/app.js',
      './src/scss/app.scss',
      ...blocksScssFiles.map((file) => `./${file}`),
      ...blocksJsFiles.map((file) => `./${file}`),
    ],
  },
  output: {
    path: path.resolve(__dirname, 'dist'),
    filename: 'script.js',
    publicPath: config.distPath,
  },
  module: {
    rules: [
      {
        test: /\.(js)$/,
        exclude: /node_modules/,
        loader: 'babel-loader',
        options: {
          presets: [
            [
              '@babel/preset-env',
              {
                useBuiltIns: 'usage',
                corejs: { version: 3, propsals: true },
              },
            ],
          ],
          cwd: './',
        },
      },
      {
        test: /\.(sa|sc|c)ss$/,
        use: [
          MiniCssExtractPlugin.loader,
          'css-loader',
          'postcss-loader',
          'sass-loader',
        ],
      },
      {
        test: /\.(jpg|svg|woff|woff2|ttf|eot|otf|png|jpeg)(\?.*$|$)/,
        loader: 'file-loader',
      },
    ],
  },
};
