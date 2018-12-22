
#!bin/bash

# Mise en pause des services
sudo service apache2 stop
sudo service nodered stop
# telechargement du dossier
echo "Téléchargemen en cours..."
wget https://github.com/Thomas-Broussard/Domokit-Server/archive/master.zip

#decompression
unzip -o master.zip

#remise a niveau
mv -f Domokit-Server-master Update

# repartition des fichiers dans les zone associées

echo "Installation de la mise à jour..."

# --- Interface Web ---
rm -r /var/www/html/DomoKit
mv -f Update/web /var/www/html/DomoKit

# --- NodeRed ---
mv -f Update/nodered /home/pi/.node-red

# --- Scripts ---
mv -f Update/scripts /home/pi/.domokit

# --- Fichiers d'update ---
mv -f Update/check_update.sh .
mv -f Update/domokit_update.sh .
mv -f Update/version .

# On effectue une conversion dos2unix pour s'assurer que les scripts fonctionnent la prochaine fois
dos2unix check_update.sh
dos2unix domokit_update.sh

#suppression de l'archive et du dossier généré
echo "Suppression des fichiers temporaires"
rm master.zip
rm -r Update/

# reprise des services
sudo service apache2 start
sudo service nodered start
exit 0