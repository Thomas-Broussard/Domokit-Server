
#--------------------------------------------------------------------------
# Titre         : read_bouton
# Auteur        : Seldie Mbongo et Thomas Broussard
# Date          : Decembre 2018
# Projet        : Domokit
#--------------------------------------------------------------------------
# Description   : Ce script permet de lire l'etat d'un bouton
#
# Parametre(s) : Numero de la GPIO
#
# Retour : Etat de la pin
# 
###########################################################################

# importation des librairies
import sys
import time
import RPi.GPIO as GPIO

GPIO.setmode(GPIO.BOARD)
if len(sys.argv)==2:
    num_pin = int(sys.argv[1])
    
    # init de la pin
    GPIO.setup(num_pin, GPIO.IN, pull_up_down=GPIO.PUD_UP)

    # lecture de l'etat
    state = GPIO.input(num_pin)
    print(state)
