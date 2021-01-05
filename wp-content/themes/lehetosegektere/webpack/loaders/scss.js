module.exports = {
  test: /\.(sass|less|scss|css)$/,
  use: [
    {
      loader: 'style-loader'
    },
    {
      loader: 'css-loader'
    },
    {
      loader: 'sass-loader'
    }
  ]
};
