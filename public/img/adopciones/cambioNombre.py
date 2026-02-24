import os
import re

folder = "."

# Obtener lista de archivos en la carpeta
files = os.listdir(folder)

# Filtrar solo PNG y ordenar
files = sorted(files)

contador = 1

for f in files:
    # Solo procesar archivos que empiecen con "pagina_"
    if f.startswith("pagina_") and f.endswith(".png"):
        old_path = os.path.join(folder, f)
        new_name = f"img_{contador}.png"
        new_path = os.path.join(folder, new_name)

        os.rename(old_path, new_path)
        print(f"Renombrado: {f} → {new_name}")

        contador += 1

print("\n✔ Renombrado completo.")
