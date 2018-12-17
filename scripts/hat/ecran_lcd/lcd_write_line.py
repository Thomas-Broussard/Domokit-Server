#--------------------------------------------------------------------------
# Titre         : lcd_write_line.py
# Auteur        : Seldie Mbongo
# Date          : Octobre 2018
# Projet        : Domokit
#--------------------------------------------------------------------------
# Description   : Permet d'ecrire un texte sur la ligne choisie
#
# Parametre(s) :
# - Texte a afficher
# - ligne sur laquelle on va afficher le texte 
#
# Cablage de l'ecran i2c : 
# SDA = GPIO__
# SCL = GPIO__
#
###########################################################################

# importation des librairies
import sys
import lcddriver
from time import *

if len(sys.argv)==3:
        # initialisation de l'ecran LCD
        lcd = lcddriver.lcd()

        #Nombre de caracteres maximum affichable sur l'ecran LCD par ligne
        tailleMax = 16

        #acquisition des parametres
        chaine = sys.argv[1]
        ligne = sys.argv[2]

        longueur = len(chaine)

        nb_espace = tailleMax - longueur

        #affichage des lignes de texte sur node-red (debug)
        print 'texte :', chaine
        print 'ligne :', ligne

        #on determine les espaces a rajouter pour combler le vide de l'ecran
        for i in range(0, nb_espace):
                chaine = chaine + ' '

        #affichage du texte sur l'ecran
        lcd.lcd_display_string("%s"%chaine, ligne)

        #fin du script
        exit(0)

else:
        print("Erreur : Nombre de parametre invalide")
        exit(1)

