@echo off
start "" "C:\laragon\laragon.exe"
timeout /t 3 >nul
cd /d "C:\laragon\www\AplikasiInventory"
php artisan serve
