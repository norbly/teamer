# teamer
## Installation :snail:
* Der home Ordner braucht Schreibrechte.
```linux
cd /var/www/html
sudo chmod -R 777 teamer
```
* Verzeichnisse in folgenden Dateien anpassen:
  * index.php
  * /libs/setup.php
  
  in den Anweisungen `define()`, `include()`, `require()`
* Datenbank
  * neue mySQL Datenbank in phpmyadmin erstellen (Name z.B. teamerdb).
  * die Datei libs/main.php folgendermaßen modifizieren:
  ```php
    var $servername = "localhost";
    var $username = "MYSQL BENUTZERNAME";
    var $password = "PASSWORT";
    var $database = "DATENBANK NAME (EBEN ERSTELLTE DB)";
``` 
