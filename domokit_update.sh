
#!bin/bash

# telechargement du dossier
wget https://github.com/Thomas-Broussard/Domokit-Server/archive/master.zip

#decompression
unzip -o master.zip

#remise a niveau
mv -f Domokit-Server-master Update

# repartition des fichiers dans les zone associées

echo "Installation de la mise à jour..."
# --- Fichiers d'update ---
mv -f Update/check_update.sh .
mv -f Update/domokit_update.sh .
mv -f Update/version .

# --- Interface Web ---
#mv -f Update/web /var/www/html/DomoKit

# --- NodeRed ---
#mv -f Update/nodered /home/pi/.node-red

# --- Scripts ---
#mv -f Update/scripts /home/pi/.domokit

#suppression de l'archive et du dossier généré
echo "Suppression des fichiers temporaires"
rm master.zip
rm -r Update/

exit 0