#--------------------------------------------------------------------------
# Titre         : lcd_clear.py
# Auteur        : Seldie Mbongo
# Date          : Octobre 2018
# Projet        : Domokit
#--------------------------------------------------------------------------
# Description   : Permet d'effacer le contenu de l'ecran LCD depuis Node-Red
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

# initialisation de l'ecran LCD
lcd = lcddriver.lcd()

# Efface le contenu de l'ecran
lcd.lcd_clear()
