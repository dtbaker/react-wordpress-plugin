## Super simple react WordPress plugin

Everything to get a basic React app displaying within any WordPress page using a shortcode. Screenshot below.

### Getting started:

1. Install WordPress locally (I suggest using `valet` to easily create a local  `wordpress-plugin.test` domain)
1. `cd /path/to/wordpress/wp-content/plugins/`
1. `git clone git@github.com:dtbaker/react-wordpress-plugin.git`
1. `cd /path/to/wordpress/wp-content/plugins/react-wordpress-plugin/`
1. `yarn development`
1. Login to `wordpress-plugin.test/wp-admin/`
1. Go to Plugins and activate the Sample Plugin
1. Go to `Pages` > `Create New` and make a new page containing the content `[display_react_app_here]`. This WordPress shortcode will render the react code and mount it to this location.

### Testing

1. `yarn eslint` ( or `yarn eslint --fix`)
1. `yarn sass-lint`

### Deploy

1. `yarn production`


### Output:

It should look like this after you add the shortcode to a page:

![sample output](https://raw.githubusercontent.com/dtbaker/react-wordpress-plugin/master/output.gif)


### Todo:

1. lots. but this works fine.