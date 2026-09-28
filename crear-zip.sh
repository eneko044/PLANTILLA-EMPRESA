#!/usr/bin/env bash
# Empaqueta el tema en dist/nexo-empresa.zip, listo para subir a WordPress.
set -euo pipefail
cd "$(dirname "$0")"
mkdir -p dist
rm -f dist/nexo-empresa.zip
zip -rq -X dist/nexo-empresa.zip nexo-empresa -x "*.DS_Store" "*/.git*"
echo "Creado dist/nexo-empresa.zip ($(du -h dist/nexo-empresa.zip | cut -f1))"
