import platform
import subprocess
import os
os.chdir('server')
os.system("composer i")
os.system("start symfony server:start ")
os.chdir('..')
os.chdir('client')
os.system("npm i")
os.system("start ng serve -o ")
os.chdir('..')
os.system('cls')