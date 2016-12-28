# michaeledisonhayden.com

Michael Edison Hayden is a journalist, author, and playwright. This is his
WordPress site.

## Deployment to GCP via Kubernetes

MichaelEdisonHayden.com is hosted on the [Google Cloud Platform](https://console.cloud.google.com/home/dashboard?project=michaeledisonhayden-153721)
and deployed via [Kubernetes](http://kubernetes.io/docs/), in a similar fashion
to [this example](https://github.com/kubernetes/kubernetes/tree/master/examples/mysql-wordpress-pd).

[![CircleCI]
(https://circleci.com/gh/urbanblight/michaeledisonhayden.com?style=shield)]
(https://circleci.com/gh/urbanblight/michaeledisonhayden.com.svg?style=svg)

#### Create a cluster

`gcloud container clusters create meh --num-nodes 2`

Update your local config to use this new cluster.

#### Create GCE PersistentVolumes for storage

Currently, the site's storage spec is for two persistent disks. It remains to be
seen how that might be optimized. These disks can be created as follows with the command:

`gcloud compute disks create --size=20GB --zone=<zone> <name>`

where `<zone>` is the same zone as the Kubernetes cluster created in the
previous step.

Then, create the PersistentVolume objects for those disks:

`kubectl create -f k8s/gce-volumes.yaml`

`pdName` in the PersistentVolume should match the `<name>` for the persistent
disk created in the previous command.

#### Deploy MySQL

##### Create secret

`kubectl create secret generic mysql-pass --from-file=/path/to/password.txt`

##### Create deployment

Where `/path/to/password.txt` is the path to a file containing the root user's
password for the MySQL database.

`kubectl create -f k8s/mysql-deployment.yaml`

Includes Service, PersistentVolumeClaim and Deployment. It may take some time for the pod to complete creation. Wait for the pod to be running, which can be confirmed using the `kubectl get pods` command.

#### Deploy WordPress

`kubectl create -f k8s/wordpress-deployment.yaml`

Includes Service, PersistentVolumeClaim and Deployment. The service will claim be assigned and external IP. This can be viewed by executing `kubectl get services wordpress`.


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
