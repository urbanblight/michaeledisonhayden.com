kubectl delete deployment,service -l app=wordpress
kubectl delete secret mysql-pass
kubectl delete secret meh-registry-key
kubectl delete pvc -l app=wordpress
kubectl delete pv wordpress-pv-1 wordpress-pv-2
gcloud compute disks delete wordpress-1
gcloud compute disks delete wordpress-2
