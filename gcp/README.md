MichaelEdisonHayden.com is hosted on the [Google Cloud Platform](https://console.cloud.google.com/home/dashboard?project=michaeledisonhaydendotcom)
and deployed via [Kubernetes](http://kubernetes.io/docs/), in a similar fashion
to [this example](https://github.com/kubernetes/kubernetes/tree/master/examples/mysql-wordpress-pd).

**Please note:** The example commands in this file presume you are executing them
from this directory.

# Deploy

## Create a cluster

`gcloud container clusters create meh --num-nodes 2`

Update your local config to use this new cluster:

```
gcloud config set container/cluster meh
gcloud container clusters get-credentials meh
```

## Create GCE PersistentVolumes for storage

Currently, the site's storage spec is for two persistent disks. It remains to be
seen how that might be optimized. These disks can be created as follows with the command:

`gcloud compute disks create --size=20GB --zone=<zone> <name>`

where `<zone>` is the same zone as the Kubernetes cluster created in the
previous step.

Then, create the PersistentVolume objects for those disks:

`kubectl create -f gce-volumes.yaml`

`pdName` in the PersistentVolume should match the `<name>` for the persistent
disk created in the previous command.

## Deploy MySQL

### Create secret

`kubectl create secret generic mysql-pass --from-file=/path/to/password.txt`

Where `/path/to/password.txt` is the path to a file containing the root user's
password for the MySQL database.

_Pro-Tip: don't include a `#` in the password ;)_


### Create deployment

`kubectl create -f mysql-deployment.yaml`

Includes Service, PersistentVolumeClaim and Deployment. It may take some time for the pod to complete creation. Wait for the pod to be running, which can be confirmed using the `kubectl get pods` command.


## Deploy WordPress

### Create secret

`kubectl create secret docker-registry meh-registry-key --docker-server=https://index.docker.io/v1/ --docker-username=<username> --docker-password=<password> --docker-email=<email>`

### Create Deployment

`kubectl create -f wordpress-deployment.yaml`

Includes Service, PersistentVolumeClaim and Deployment. The service will claim be assigned and external IP. This can be viewed by executing `kubectl get services wordpress`.

# Remove deployment

The [file](teardown.sh) is pretty self-evident.

`source teardown.sh`
