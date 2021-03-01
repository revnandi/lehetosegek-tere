const webpack = require('webpack');
const ExtractTextPlugin = require('extract-text-webpack-plugin');
const VueLoaderPlugin = require('vue-loader/lib/plugin');
const WebpackMonitor = require('webpack-monitor');

plugins = [
  require('./stylelint'),
  new webpack.ProvidePlugin({
    throttle: 'lodash.throttle',
  }),
  new webpack.LoaderOptionsPlugin({ minimize: true }),
  new ExtractTextPlugin('styles.css'),
  new VueLoaderPlugin(),
  new WebpackMonitor({
    capture: true, // -> default 'true'
    target: '../monitor/myStatsStore.json', // default -> '../monitor/stats.json'
    launch: false, // -> default 'false'
    port: 3030, // default -> 8081
    excludeSourceMaps: true // default 'true'
  }),
];

if (process.env.NODE_ENV === 'development') {
  plugins.push(require('./browser-sync'));
  plugins.push(require('./stylelint'));
}

module.exports = plugins;
