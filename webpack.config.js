const path = require("path")
const TerserPlugin = require("terser-webpack-plugin")
const MiniCssExtractPlugin = require("mini-css-extract-plugin")
const OptimizeCSSAssetsPlugin = require("optimize-css-assets-webpack-plugin")

module.exports = (env, argv) => {
  const production = argv.mode === "production"

  return {
    optimization: {
      minimizer: [new TerserPlugin({ parallel: true }), new OptimizeCSSAssetsPlugin({})],
    },

    plugins: [
      new MiniCssExtractPlugin({
        // Options similar to the same options in webpackOptions.output
        // both options are optional
        filename: "[name].css",
        chunkFilename: "[id].css",
      }),
    ],

    entry: {
      frontend: path.resolve(__dirname, "src/frontend.jsx"),
    },

    output: {
      filename: "[name].js",
      path: path.resolve(__dirname, "assets"),
    },

    devtool: production ? "" : "source-map",

    resolve: {
      extensions: [".js", ".jsx", ".json"],
    },

    module: {
      rules: [
        {
          test: /\.jsx?$/,
          exclude: /node_modules/,
          loader: "babel-loader",
        },
        {
          test: /\.(svg|jpg|png)$/,
          loader: "file-loader",
          options: {
            outputPath: "img",
          },
        },
        {
          test: /\.s?css$/,
          use: [
            MiniCssExtractPlugin.loader,
            // 'style-loader',
            {
              loader: "css-loader",
              options: {
                modules: true,
                importLoaders: 2, // 0 => no loaders (default); 1 => postcss-loader; 2 => postcss-loader, sass-loader
              },
            },
            {
              loader: "postcss-loader",
              options: {
                plugins: () => [require("autoprefixer")],
              },
            },
            "sass-loader",
          ],
        },
      ],
    },
  }
}
