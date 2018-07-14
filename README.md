# teamer
## Installation :snail:

#### Verzeichnisse anpassen:
Die Datei `preferences.json` mit folgendem Inhalt erstellen:
```json
{
    "home_dir" : "/var/www/html/teamer/",
    "servername" : "localhost",
    "username" : "root",
    "password" : "passwort",
    "database" : "teamerdb" 
}
```
#### Der home Ordner braucht Schreibrechte.
```linux
cd /var/www/html
sudo chmod -R 777 teamer
```  
#### Datenbank
neue mySQL Datenbank in phpMyAdmin erstellen (Name z.B. teamerdb). 
Dazu phpMyAdmin im Browser unter localhost/phpmyadmin bzw 192.168.178.81/phpmyadmin öffnen (wenn 192.168.178.81 deine IP Adresse ist). PhpMyAdmin installieren mit `sudo apt-get install phpmyadmin`.

