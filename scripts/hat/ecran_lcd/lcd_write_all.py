#--------------------------------------------------------------------------
# Titre         : lcd_write_all.py
# Auteur        : Seldie Mbongo
# Date          : Octobre 2018
# Projet        : Domokit
#--------------------------------------------------------------------------
# Description   : Ce script permet de piloter l'ecran LCD depuis Node-Red
#
# Parametre(s) :
# - Texte a afficher sur la ligne 1
# - Texte a afficher sur la ligne 2
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


def middle(texte,tailleMax):
        nb_espace_debut = int((tailleMax - len(texte))/2)
        resultat = ''

        for i in range(nb_espace_debut):
                resultat = resultat + " "
        
        resultat += texte
        
        nb_espace_fin = tailleMax - len(resultat)

        for i in range(nb_espace_fin):
                resultat = resultat + " "

        return resultat


if len(sys.argv)==3:
        # initialisation de l'ecran LCD
        lcd = lcddriver.lcd()

        # Efface le contenu de l'ecran
        #lcd.lcd_clear()

        #Nombre de caracteres maximum affichable sur l'ecran LCD par ligne
        tailleMax = 16

        #acquisition des parametres
        chaine1 = sys.argv[1]
        chaine2 = sys.argv[2]

        longueur1 = len(chaine1)
        longueur2 = len(chaine2)

        nb_espace1 = tailleMax - longueur1
        nb_espace2 = tailleMax - longueur2
        #affichage des lignes de texte sur node-red (debug)
        #print 'texte ligne 1 :', chaine1
        #print 'texte ligne 2 :', chaine2

        #on determine les espaces a rajouter pour combler le vide de l'ecran

        chaine1 = middle(chaine1,tailleMax)
        chaine2 = middle(chaine2,tailleMax)
        #for i in range(0, nb_espace1):
        #        chaine1 = chaine1 + ' '
                
        #for j in range(0, nb_espace2):
        #        chaine2 = chaine2 + ' '

        #affichage des chaines sur l'ecran
        lcd.lcd_display_string("%s"%chaine1, 1)
        lcd.lcd_display_string("%s"%chaine2, 2)

        #fin du script
        exit(0)

elif len(sys.argv)>3:
        print("Nombre de parametre invalide")
        exit(1)


