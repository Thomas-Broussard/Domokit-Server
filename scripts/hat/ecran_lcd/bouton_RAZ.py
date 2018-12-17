#--------------------------------------------------------------------------
# Titre         : bouton_RAZ
# Auteur        : Seldie Mbongo
# Date          : Novembre 2018
# Projet        : Domokit
#--------------------------------------------------------------------------
# Description   : Ce script permet de gerer le bouton RAZ 
#
# Parametre(s) :
#
# Cablage du bouton : GPIO06
# 
###########################################################################

# importation des librairies

import time
import RPi.GPIO as GPIO

GPIO.setmode(GPIO.BCM)

# on initialise le bouton en mode ecoute
GPIO.setup(06, GPIO.IN, pull_up_down=GPIO.PUD_UP)
state = GPIO.input(06)
print(state)
