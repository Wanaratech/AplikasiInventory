::[Bat To Exe Converter]
::
::YAwzoRdxOk+EWAjk
::fBw5plQjdCyDJGyX8VAjFDVRWRaNMleeCaIS5Of66/m7q0MLUewrd53ClL2NL4A=
::YAwzuBVtJxjWCl3EqQJgSA==
::ZR4luwNxJguZRRnk
::Yhs/ulQjdF+5
::cxAkpRVqdFKZSjk=
::cBs/ulQjdF+5
::ZR41oxFsdFKZSDk=
::eBoioBt6dFKZSDk=
::cRo6pxp7LAbNWATEpCI=
::egkzugNsPRvcWATEpCI=
::dAsiuh18IRvcCxnZtBJQ
::cRYluBh/LU+EWAnk
::YxY4rhs+aU+IeA==
::cxY6rQJ7JhzQF1fEqQJhZkoaHUrQXA==
::ZQ05rAF9IBncCkqN+0xwdVsEAlTMbSXrZg==
::ZQ05rAF9IAHYFVzEqQIROBddRwWRNSuTCKMZ5vz0/fPHhlgJVaIKbI7W2/SpMuEV407lFQ==
::eg0/rx1wNQPfEVWB+kM9LVsJDCWyDCuTCKMZ5vz0/fPHhlgJVaIKbI7W2/SpMuEV407lFQ==
::fBEirQZwNQPfEVWB+kM9LVsJDGQ=
::cRolqwZ3JBvQF1fEqQJQ
::dhA7uBVwLU+EWDk=
::YQ03rBFzNR3SWATElA==
::dhAmsQZ3MwfNWATElA==
::ZQ0/vhVqMQ3MEVWAtB9wSA==
::Zg8zqx1/OA3MEVWAtB9wSA==
::dhA7pRFwIByZRRnk
::Zh4grVQjdCyDJGyX8VAjFDVRWRaNMleeCaIS5Of66/m7g10NFMsxborVzrucOaA3/1HlNaM513db2OweDR1RdRPlaxcxyQ==
::YB416Ek+ZW8=
::
::
::978f952a14a936cc963da21a135fa983
@echo off
REM Jalankan Laragon
start "" "C:\laragon\laragon.exe"

REM Tunggu sebentar biar Laragon siap
timeout /t 3 >nul

REM Pindah ke folder project
cd /d "C:\laragon\www\AplikasiInventory"

REM Jalankan server Laravel tanpa jendela
start "" /b php artisan serve >nul 2>&1

REM Buka browser ke alamat Laravel
start "" http://127.0.0.1:8000
