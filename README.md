# michaeledisonhayden.com

Michael Edison Hayden is a journalist, author, and playwright. This is his
WordPress site.

## Deployment

MichaelEdisonHayden.com is hosted on the [Google Cloud Platform](https://console.cloud.google.com/home/dashboard?project=michaeledisonhaydendotcom)
and deployed via [Kubernetes](http://kubernetes.io/docs/), in a similar fashion
to [this example](https://github.com/kubernetes/kubernetes/tree/master/examples/mysql-wordpress-pd).

### Steps to Deployment

#### Create GCE PersistentVolumes for persistent storage

`kubectl create -f k8s/meh-pv.yaml`

#### Create MySQL secret

`kubectl create secret generic mysql-pass --from-file=/path/to/password.txt`

Where `/path/to/password.txt` is the path to a file containing the root user's
password for the MySQL database.

#### Deploy MySQL

`kubectl create -f k8s/meh-mysql.yaml`

Includes Service, PersistentVolumeClaim and Deployment.

#### Deploy WordPress

`kubectl create -f k8s/meh-wp.yaml`

Includes Service, PersistentVolumeClaim and Deployment.
