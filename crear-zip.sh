#!/usr/bin/env bash
# Empaqueta los temas en dist/<tema>.zip, listos para subir a WordPress.
set -euo pipefail
cd "$(dirname "$0")"
mkdir -p dist
for tema in nexo-empresa nexo-play; do
	rm -f "dist/$tema.zip"
	zip -rq -X "dist/$tema.zip" "$tema" -x "*.DS_Store" "*/.git*"
	echo "Creado dist/$tema.zip ($(du -h "dist/$tema.zip" | cut -f1))"
done
