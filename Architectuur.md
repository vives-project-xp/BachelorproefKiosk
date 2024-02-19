# Website
## Input
- Joistick en 2 knoppen: Mogelijks 2 modes:
    - mode 1: gewone mode voor op onze site waar de joystick is voor items te selecteren, 1 knop voor selecteren (klikken) en 1 knop voor terug te gaan (terug pijl in de browser)
    - mode 2: general purpose browser mode: als de toeschouwers doorklikken op de linkedin dan komen ze op een pagina die niet geoptimalliseert is voor joystick en knopjes dus dan wordt de joystick een muis.

## Output
Pagina tree:
    -Menu:
        -projecten
            -project
        -richtingen
            -richting info
        -game
        -admin login
            -admin pagina
Bachelor proeven pagina heeft een radiobutton sidebar om alleen projecten van een bepaalde richting te selecteren. Ook een optie voor random fiche.

## Functies
- database met alle fiches in, waarschijnlijk mysql/mariadb
- http server om onze webpagina en assets af te leveren bij clients, waarschijnlijk express+node
- file service voor afbeeldingen in de fiches/database, als onderdeel van de http server.
- frontend webpagina die aangepast is voor met joystick en knoppen maar kan nogsteeds bestuurdworden door muis, html+css+js.
- Windows 10 met taakplanner om bij opstart al de website in fullschreen weer te geven, ook gebruik makend van de kiosk mode in windows.

# Arcade kast
## Input
- Knoppen en joystick

## Output
- Displayport aangestuurd scherm, verticaal.
- kast is geschilderd door een bedrijf of bestickert met stickers gemaakt in school zelf, als bijde opties te duur zijn gebruiken we grafitti
- Je kan de arcade kast van de onderkant halen en hem op een tafel zetten.
- bovenkant heeft handvaten.
- onderkant heeft wieltjes.
- Opening aan bovenste deel van de kast om maintainance te doen en extra muis of toetsenbord tijdelijk aan te sluiten. 

## Functies
- Knoppen en joystick worden ingelezen door een esp en deze esp geeft dan de input door aan de pc via uart.
- PC draait server en frontend en geeft output weer op display.
- zowel pc als display worden gevoed door 3-pin stekker die uit een verdeelstekker komt die in het interieur van de arcade kast is vastgemaakt en de kabel daarvan zit buiten de kast en kan ergens in een stopcontact gestoken worden.
- PC krijgt een extra wifi kaart om niet afhankelijk te zijn via ethernet.
- Esp en extra ventilator worden gevoedt via usb vanuit de pc.
- PC: we kunnen kiezen voor een kleintje of een grote, grote kunnen we uit elkaar halen en zo past die beter binnen behuizing, leerkrachten hebben kleintje liever omdat als pc'tje stuk gaat dan kunnen ze er een nieuwe in steken en dan werkt het weer.
