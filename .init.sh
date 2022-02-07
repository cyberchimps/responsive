# docs: https://developer.wordpress.org/cli/commands/plugin/

wp rewrite structure '/%year%/%monthnum%/%postname%/'

wp plugin delete hello
wp plugin delete akismet
wp theme activate ${REPO_NAME}

cd /workspace/responsive/public_html/wp-content/themes/responsive
npm install
grunt

# wp plugin install plugin_slug --activate