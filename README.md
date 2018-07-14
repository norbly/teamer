# teamer
## Installation :snail:

#### Verzeichnisse anpassen:
Die Datei `preferences.json` mit folgendem Inhalt erstellen:
```json
{
    "home_dir" : "/var/www/html/teamer/",
    "servername" : "localhost",
    "username" : "your_username",
    "password" : "your_password",
    "database" : "your_database" 
}
```
die soeben erstellte Datei anpassen.
#### Der home Ordner braucht Schreibrechte.
```linux
cd /var/www/html
sudo chmod -R 777 teamer
```  
#### Datenbank
neue mySQL Datenbank (Name z.B. teamerdb) mit zB phpMyAdmin erstellen. 

## hints
#### wenn .gitignore keine Daten ignoriert
```
git rm -r --cached .
git add .
git commit -m ".gitignore is now working"
```
The first line unstages and removes the paths to your files from the git index recursively.
The second line adds all your files back in but because the .gitignore is present it will not add files that should be ignored!
The final line commits all your files back to the index.
http://blog.jonathanchannon.com/2012/11/18/gitignore-not-working-fixed/
