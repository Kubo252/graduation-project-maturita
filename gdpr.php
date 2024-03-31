<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="styles/main.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<script src="script.js"></script>
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
<title>GDPR</title>
<body onload = time();>
    
    <?php require_once "./header.php" ?>  
    <?php require_once 'libs/users.php' ?> 
    <?php require_once 'libs/db.php' ?>
    

    <div class="content">
        <div class="gdpr">
            <h1>Základné informácie</h1>
            <div class="gdpr-info">
                <p>Mestská časť Košice-Západ pristupuje k Vašim osobným údajom zodpovedne a preto v zmysle Nariadenia Európskeho Parlamentu a Rady (EÚ)
                2016/679 z 27. apríla 2016 o ochrane fyzických osôb pri spracúvaní osobných údajov a o voľnom pohybe takýchto údajov, 
                ktorým sa zrušuje smernica 95/46/ES (všeobecné nariadenie o ochrane údajov) (ďalej len „nariadenie GDPR“) 
                a zákona č. 18/2018 Z. z. o ochrane osobných údajov a o zmene a doplnení niektorých zákonov (ďalej len ,,Zákon“), 
                Vám ako dotknutej osobe (fyzickej osobe, ktorej osobné údaje sa spracúvajú) na svojom webovom sídle okrem svojich identifikačných 
                a kontaktných údajov a kontaktných údajov zodpovednej osoby, sprístupňuje aj ďalšie potrebné informácie, ktoré sa nachádzajú 
                v záložkách vľavo.
                Prevádzkovateľ v zmysle čl. 24 nariadenia GDPR a ust. § 31 Zákona pristúpil k prijatiu primeraných technických, 
                organizačných, personálnych a bezpečnostných opatrení a záruk, ktoré zohľadňujú najmä:
                <ul class="list">
                <li> zásady spracúvania osobných údajov, ktorými sú zákonnosť, spravodlivosť a transparentnosť, obmedzenie 
                    a kompatibilita účelov spracúvania osobných údajov, ďalej minimalizácia osobných údajov, ich pseudonymizácia a šifrovanie, 
                    ako aj integrita, dôvernosť a dostupnosť;</li>
                <li> zásady nevyhnutnosti a primeranosti (vzťahuje sa aj na rozsah a množstvo spracúvaných osobných údajov, 
                    dobu uchovávania a prístup k osobným údajom dotknutej osoby) spracúvania osobných údajov s ohľadom na účel spracovateľskej operácie;</li>
                <li> povahu, rozsah, kontext a účel spracovateľskej operácie;</li>
                <li> odolnosť a obnovu systémov spracúvania osobných údajov;</li>
                <li> poučenia oprávnených osôb prevádzkovateľa;</li>
                <li> prijatie opatrení na bezodkladné zistenie, či došlo k porušeniu ochrany osobných údajov a promptné informovanie dozorného orgánu 
                    a zodpovednej osoby;</li>
                <li> prijatie opatrení na zabezpečenie opravy alebo vymazanie nesprávnych údajov, či realizáciu iných práv dotknutej osoby;</li>
                <li> riziká s rôznou pravdepodobnosťou a závažnosťou pre práva a slobody fyzických osôb (najmä náhodné alebo 
                    nezákonné zničenie osobných údajov, strata alebo zmena osobných údajov, zneužitie osobných údajov – neoprávnený prístup 
                    alebo neoprávnené poskytnutie, posúdenie rizík so zreteľom na pôvod, povahu, pravdepodobnosť a závažnosť rizika 
                    v súvislosti so spracúvaním a na identifikáciu najlepších postupov na zmiernenie rizika).</li>
                </ul>
                </p>
            </div>
        </div>
    </div>
    <?php require_once "./footer.php" ?>
    

</body>
</html>