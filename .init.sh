# docs: https://developer.wordpress.org/cli/commands/plugin/

wp rewrite structure '/%year%/%monthnum%/%postname%/'

wp plugin delete hello
wp plugin delete akismet
wp theme activate ${REPO_NAME}
npm install -g grunt-cli

# wp plugin install plugin_slug --activate