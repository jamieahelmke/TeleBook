# TeleBook


<img src='https://img.shields.io/badge/Release-beta%200.2.0-green'> <br><img src='https://img.shields.io/badge/License-MIT-green'>

<br>
Telefonbuch-Websoftware für meinen Ausbildungsbetrieb.

### Struktur
- private
  - Konnektor für die Datenbank <br> (Für mysql entwickelt, aber synxtax kann leicht angepasst werden)
  - Hier können andere Module hinzugefügt werden, auf die von außen nicht zugegriffen werden soll.
- public
  - actions
    - add.php (Hinzufügen von Datenbankeinträgen)
    - edit.php (Bearbeiten oder Löschen von DB-Einträgen)
  - assets
    - style.css (CSS Stylesheet)
  - html
    - header.html (Boilerplate für die Leiste oben auf jeder Seite)
  - index.php (Standardseite)
  - login.php (Seite zum Einloggen zum DB-Viewer)
  - viewer.php (DB-Viewer)


### Abhängigkeiten
- Apache2 (oder anderer Webserver)
- PHP
- PHP-Mysqli
- MySQL-Datenbank

### Ressourcen 

