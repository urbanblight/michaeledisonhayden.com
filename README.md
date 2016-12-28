# michaeledisonhayden.com

Michael Edison Hayden is a journalist, author, and playwright. This is his
WordPress site.

## Deployment to GCP via Kubernetes

The production instance is currently served on GCP. Deployment documentation for
that is available [here](k8s/deployment_gcp.md).

## Deployment via Docker

Currently, this method is used for local development.

Start a MySQL container:

`docker run -d --name meh-mysql -e MYSQL_ROOT_PASSWORD=<password> mysql`

Where `<password>` is the password you would like. Then start the
WordPress container linked to the newly created MySQL container.

`docker run -d --name meh-wordpress -p 8080:80 --link meh-mysql:mysql urbanblight/michaeledisonhayden.com`

## Export and Import Content

Whether via Kubernetes or Docker, a new deployment needs to be updated with
existing content. In order to do that, follow these instructions to [export](https://codex.wordpress.org/Tools_Export_Screen)
from the production instance and [import](https://codex.wordpress.org/Importing_Content#WordPress)
to the new deployment.
