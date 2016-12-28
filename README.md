# michaeledisonhayden.com

Michael Edison Hayden is a journalist, author, and playwright. This is his
WordPress site.

## Deployment

MichaelEdisonHayden.com is hosted on the [Google Cloud Platform](https://console.cloud.google.com/home/dashboard?project=michaeledisonhayden-153721)
and deployed via [Kubernetes](http://kubernetes.io/docs/), in a similar fashion
to [this example](https://github.com/kubernetes/kubernetes/tree/master/examples/mysql-wordpress-pd).

### Steps to Deployment

#### Create a cluster

`gcloud container clusters create <name> --num-nodes 2`

Update your local config to use this new cluster.

#### Create GCE PersistentVolumes for persistent storage

Currently, the site's storage spec is for two persistent disks. It remains to be
seen how that might be optimized. These disks can be created as follows with the command:

`gcloud compute disks create --size=20GB --zone=<zone> <name>`

where `<zone>` is the same zone as the Kubernetes cluster created in the
previous step.

Then, create the PersistentVolume objects for those disks:

`kubectl create -f k8s/gce-volumes.yaml`

`pdName` in the PersistentVolume should match the `<name>` for the persistent
disk created in the previous command.

#### Create MySQL secret

`kubectl create secret generic mysql-pass --from-file=/path/to/password.txt`

Where `/path/to/password.txt` is the path to a file containing the root user's
password for the MySQL database.

#### Deploy MySQL

`kubectl create -f k8s/mysql-deployment.yaml`

Includes Service, PersistentVolumeClaim and Deployment. It may take some time for the pod to complete creation. Wait for the pod to be running, which can be confirmed using the `kubectl get pods` command.

#### Deploy WordPress

`kubectl create -f k8s/wordpress-deployment.yaml`

Includes Service, PersistentVolumeClaim and Deployment. The service will claim be assigned and external IP. This can be viewed by executing `kubectl get services wordpress`.
