#!bin/bash

# Retourne :
# 0 si l'update est faisable
# 1 si la connexion internet ne marche pas
# 2 si l'update est inutile
 
# 1 - Verification de la connexion internet
wget -q --spider http://google.com

if [ $? -eq 0 ]; then
	#echo "Vérification des mises à jour disponibles..."
else
    exit 1
fi

# 2 - Comparaison des versions (online et locale)
version_online=$(curl https://raw.githubusercontent.com/Thomas-Broussard/Domokit-Server/master/version)
version_locale=$(cat version || echo "0.0.0")

#echo "version actuelle :" $version_locale
#echo "dernière version disponible:" $version_online

# on vérifie que la mise à jour est réalisable
if [ $version_online = $version_locale ]
then
	exit 2
fi

exit 0