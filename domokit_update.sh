#!bin/bash

version_online=$(curl https://raw.githubusercontent.com/Thomas-Broussard/Domokit-Server/master/version)
version_locale=$(cat version)

echo "version actuelle :" $version_locale
echo "dernière version :" $version_online

# on vérifie que la mise à jour est réalisable
if [ $version_online = $version_locale ]
then
	echo "Votre Box est à jour."
else
	echo "Téléchargement de la version " $version_online "..."

	# telechargement du dossier
	wget https://github.com/Thomas-Broussard/Domokit-Server/archive/master.zip

	#decompression
	unzip -o master.zip

	#renommage
	mv -f Domokit-Server-master Update

	# repartition des fichiers dans les zone associées

	# --- Interface Web ---
	#mv -r -f Update/web /var/www/html/DomoKit

	# --- NodeRed ---
	#mv -f Update/nodered /home/pi/.node-red

	# --- Scripts ---
	#mv -f Update/scripts /home/pi/.domokit

	#suppression de l'archive
	rm master.zip
fi
