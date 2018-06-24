# teamer
## Installation :snail:
#### Der home Ordner braucht Schreibrechte.
```linux
cd /var/www/html
sudo chmod -R 777 teamer
```
#### Verzeichnisse in folgenden Dateien anpassen:
* index.php
* /libs/setup.php
  
  in den Anweisungen `define()`, `include()`, `require()`
#### Datenbank
* neue mySQL Datenbank in phpMyAdmin erstellen (Name z.B. teamerdb). 
Dazu phpMyAdmin im Browser unter localhost/phpmyadmin bzw 192.168.178.81/phpmyadmin öffnen (wenn 192.168.178.81 deine IP Adresse ist). PhpMyAdmin installieren mit `sudo apt-get install phpmyadmin`.
* die Datei libs/main.php folgendermaßen modifizieren:
  ```php
    var $servername = "localhost";
    var $username = "MYSQL BENUTZERNAME";
    var $password = "PASSWORT";
    var $database = "DATENBANK NAME (EBEN ERSTELLTE DB)";
   ``` 
