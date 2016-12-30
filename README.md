# michaeledisonhayden.com

Michael Edison Hayden is a journalist, author, and playwright. This is his
WordPress site.

# Get Started

### Deployment via Docker

Currently, this method is used for local development.

Start a MySQL container:

`docker run -d --name meh-mysql -e MYSQL_ROOT_PASSWORD=<password> mysql`

Where `<password>` is the password you would like. Then start the
WordPress container linked to the newly created MySQL container.

`docker run -d --name meh-wordpress -p 8080:80 --link meh-mysql:mysql urbanblight/michaeledisonhayden.com`

### Deployment to GCP via Kubernetes

Please review the documentation in the [gcp directory](gcp/).

## Set Up WordPress in UI

Go to the IP assigned to your deployment and go through the workflow to install WordPress.

### Export and Import Content

Whether via Kubernetes or Docker, a new deployment needs to be updated with
existing content. In order to do that, follow these instructions to [export](https://codex.wordpress.org/Tools_Export_Screen)
from the production instance and [import](https://codex.wordpress.org/Importing_Content#WordPress)
to the new deployment. On the Import to WordPress screen, it is suggested that you "create new user with login name" for authors of existing content and "Download and import file attachments." This may take some time. Remember to update any newly created users' roles as necessary.

### Activate Theme

The Dockerfile added the theme to the container, but we have to activate it. Do that at `wp-admin/themes.php`.

### Other required steps to deployment

* remove "Hello World!" post
* delete unwanted categories
 * choose a different default category in order to remove the Uncategorized
 category
* update permalinks
