import os
#ENTRA EN LA CARPETA SERVER
os.chdir('server')
#INSTALA LAS DEPENDECIAS DEL SYMFONY
os.system("composer i")
#INICIA EL SERVIDOR DE SYMFONY 
os.system("start symfony server:start ")
#VUELVE AL DIRECTORIO PRINCIPAL
os.chdir('..')
#ENTRA A LA CARPETA CLIENT
os.chdir('client')
#INSTALA LAS DEPENDECIAS DEL ANGULAR
os.system("npm i")
#INICIA EL SERVIDOR DE ANGULAR
os.system("start ng serve -o ")
os.chdir('..')
os.system('cls')