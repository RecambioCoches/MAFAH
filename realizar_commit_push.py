import os
rama = input("¿A que rama quieres entrar? (vacio para main): ").strip()
commit = input("¿Cual es el mensaje del commit?: ").strip()
os.system("git add .")
if  commit == "":
    os.system('git commit -m "actualizacion de proyecto"')
else:
    os.system(f'git commit -m "{commit}"')
    
os.system(f'git push origin {rama}')