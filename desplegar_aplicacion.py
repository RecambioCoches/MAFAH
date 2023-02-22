import platform
import subprocess
import os
#validamos que el sistema operativo sea windows
if( platform.system() == 'Windows'):
    #el comando start en windows crea una nueva ventana prompt
    # Cambiar al directorio de la carpeta hija
    os.chdir('server')
    os.system("composer i")
    os.system("start symfony server:start ")
    os.chdir('..')
    os.chdir('client')
    os.system("npm i")
    os.system("start ng serve -o ")
    os.chdir('..')
    os.system('cls')
# validamos que el sistema sea linux
if( platform.system() == 'Linux'):
    #el comando gnome-terminal ejecuta una nueva termina y se le pasa el command
    subprocess.Popen(["gnome-terminal", "--command=echo 'hellow' "])