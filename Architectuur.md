# Website
## Input
- Joistick en 2 knoppen: joistick: muis bewegen en pijltjes toetsen tergelijk, knop 1: muis klik, knop 2: vorige pagina in de browser (alt + pijltje links).
- Fiche en pagina uploads via wordpress, gebruik template Project.
- Alternatieve manier om fiches weer te geven: upload gewoon de fiche pdf's in de mediabibliotheek van wordpress

## Output
Web paginas met volgende informatie:
- afgelopen bachelorproeven: pagina met afbeelding van fiche.
- richtingen: bekijk alle projecten van een bepaalde richting.
- game pagina met snake, pong en ball-box

## Functies
Wordpress mappenstructuur:
- Thema root
    - recources
        - css: map met alle css (wordt nog geënqueued)
        - js: map met alle js (zelfde)
        - images: afbeeldingen en gifs die we in de html paginas gebruiken
    - Alle php templates (html paginas)
    - style.css
    - functions.js
    
    
wordpress page structuur:
- Menu (template: Menu)
    - Projecten (template: Projecten)
        - Elektronica (template: Projecten)
            - Paginas van Elektronica
        - ICT (template: Projecten)
            - Paginas van ICT
    - Richtingen (template: page Richting)
    - Game
        - Snake
        - Pong
        - Ball-box
    - doc page     

css/js gebruik:
- /recources/css/style.css: wordt gebruikt in elk template

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
