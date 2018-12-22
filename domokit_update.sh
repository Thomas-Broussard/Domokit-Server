
#!bin/bash

# Mise en pause des services
sudo service apache2 stop
sudo service nodered stop
# telechargement du dossier
cd /home/pi/.domokit/
echo "Téléchargement en cours..."
wget https://github.com/Thomas-Broussard/Domokit-Server/archive/master.zip

#decompression
unzip -o master.zip

#remise a niveau
mv -f /home/pi/.domokit/Domokit-Server-master /home/pi/.domokit/Update

# repartition des fichiers dans les zone associées

echo "Installation de la mise à jour..."

# --- Interface Web ---
sudo rm -r /var/www/html/DomoKit
mv -f /home/pi/.domokit/Update/web /var/www/html/DomoKit

# --- NodeRed ---
cp -r -f /home/pi/.domokit/Update/nodered/* /home/pi/.node-red/

# --- Scripts ---
#sudo rm -r /home/pi/.domokit/scripts/
cp -r -f /home/pi/.domokit/Update/scripts/* /home/pi/.domokit/scripts/

# --- Fichiers d'update ---
mv -f /home/pi/.domokit/Update/check_update.sh /home/pi/.domokit/
mv -f /home/pi/.domokit/Update/domokit_update.sh /home/pi/.domokit/
mv -f /home/pi/.domokit/Update/version /home/pi/.domokit/

# On effectue une conversion dos2unix pour s'assurer que les scripts fonctionnent la prochaine fois
dos2unix /home/pi/.domokit/check_update.sh
dos2unix /home/pi/.domokit/domokit_update.sh

#suppression de l'archive et du dossier généré
echo "Suppression des fichiers temporaires"
rm /home/pi/.domokit/master.zip
rm -r /home/pi/.domokit/Update/

# reprise des services
sudo service apache2 start
sudo service nodered start

echo "Mise à jour effectuée avec succès"
exit 0