# WDV4 toets voor roosendaal

# installatie stappen:
- Klik op de classroom link en accepteer de opdracht. Als 'team' naam kies je voor je voor- en achternaam
- Clone de repo
- Maak een database 'wdv4toets' aan
- Importeer de database (wdv4toets.sql staat in de repo in het mapje docs)
- Kopieer de config.example.php naar config.php en pas eventueel je settings aan. Let op de baseurl!.
- Klik in laragon op reload en ga in je browser naar de website

**Je bent nu klaar voor de toets. Voor elke opdracht hieronder maak je een eigen commit, als commit message gebruik je het de opdracht naam, bijv 'opdracht 1'.
Doe je dit niet dan wordt die opdracht niet nagekeken, let hier dus goed op!**

# Opdracht 1
Alles op de website zit achter slot en grendel, je hebt een account nodig om in te kunnen loggen. Hiervoor is er een registratiepagina zoals je kunt zien op de site. Echter werkt dit niet helemaal, je krijgt namelijk een foutmelding als je na invullen van het formulier op registreer klik. Los deze foutmelding op. En maak daarna een account aan zodat je kunt inloggen.

# Opdracht 2
Nu je een account hebt aangemaakt wil je inloggen. Echter bij het inloggen krijg je een foutmelding. Los deze op.

# Opdracht 3
Het menu van de website zegt ook na inloggen dat je je nog kunt registreren en inloggen, er is wel code geschreven waardoor er eigenlijk producten en logout zou moeten staan, maar hier zit blijkbaar nog een foutje in. Los dit op.

# Opdracht 4
Rechts boven in de website zie je welkom staan, hier moet welkom naam komen te staan. Met naam bedoelen we uiteraard de naam van de ingelogde gebruiker. Tip: kijk met var_dump() of print_r() wat er in je sessie staat.

# Opdracht 5
Het uitloggen werkt niet naar behoren, als je op de uitlogknop drukt wordt je niet uitgelogd. Los dit op.

# Opdracht 6
Als je op de product toevoegen knop klikt dan krijg je het formulier om een product toe te voegen. Echter als je dat invult en daarna op maak product aan klikt dan wordt je product niet aangemaakt. Los dit op.

**EXTRA INFO**: Bij het veld afbeelding naam kies je de naam van het bestand, bijv: Prime_raspberry.webp Kijk in de img folder van je project voor de afbeeldingen, je hoeft zelf geen afbeeldingen te zoeken of nog aan je project toe te voegen er staan er genoeg.

# Opdracht 7
Bij het aanpassen van een product wordt de data van het product niet goed in geladen in het formulier. Los dit op.

# Opdracht 8
Bij het versturen van dit formulier, je raadt het al, krijg je weer een fout. Los dit op

# Opdracht 9
Als je op de knop verwijder drukt krijg je een fout. Los dit op.

# Opdracht 10
Als een product niet op voorraad is dan moet er ipv "Voorraad: xxxx" "product niet op voorraad komen te staan"

# Opdracht 11
Als een product in de aanbieding is (dus korting/ discount heeft) dan mag de huidige prijs doorgestreept worden en daarachter de nieuwe prijs, dus prijs - korting komen te staan. Let op het kortingsveld in de database bevat percentages

# LET OP:
**Je hebt dus 11 opdrachten, dus ik verwacht 11 commits met de juiste naamgeving (opdracht 1, opdracht 2 etc).**

Succes!
