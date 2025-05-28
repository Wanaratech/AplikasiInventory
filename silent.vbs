Set WshShell = CreateObject("WScript.Shell")
WshShell.Run chr(34) & "C:\laragon\www\AplikasiInventory\larasilent.bat" & chr(34), 0
WScript.Sleep 3000
WshShell.Run "http://127.0.0.1:8000"
Set WshShell = Nothing
