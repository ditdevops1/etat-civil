<?php
require_once 'vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

include 'db.php';

if ($_POST) {
    if (!empty($_POST['prenom_nouvne']) && !empty($_POST['id'])) {
        $prenom_nouvne = $_POST['prenom_nouvne'];
        $id = $_POST['id'];
        $requete = "SELECT * FROM nouveau_ne WHERE prenom_nouvne = '$prenom_nouvne' AND id = '$id' ";
        $query = $db->prepare($requete);
        $query->execute();
        $row = $query->fetch();
        $info = "<div class='p-3'>
            les informations de : <b>" . $row['prenom_nouvne'] . ' ' . $row['nom_nouvne'] . "<div>";
    }
}

$html2pdf = new Html2Pdf('P', 'A4', 'fr');
ob_start();
?>

<body>
    <table style="border: 1.5px solid black;margin-left:18px;">
        <tr>
            <td style="text-align: center; padding-left:90px;padding-right:90px;padding-top:20px; padding-bottom:20px">REGION: DAKAR <br><br> DEPARTEMENT: RUFISQUE <br><br> Commune: RUFISQUE-EST</td>
            <td style="text-align: center;padding-left:90px;padding-right:90px;border-left:1px solid black ;">REPUBLIQUE DU SENEGAL <br> Un Peuple- Un But- Une Foi <br> <strong>ETAT-CIVIL</strong> <br> CENTRE PRINCIPAL(1) <br> RUFISQUE EST</td>
        </tr>

        <tr>
            <td style="border-top:1px solid black ; padding:10px;">
               <strong>EXTRAIT DU REGISTRE DES ACTES DE NAISSANCE</strong><br><br>
                   Pour l'année deux mille vingt <br> <br> NUMERO: QUATORZE DANS LE REGISTRE
            </td>
            <td style="border-top:1px solid black; border-left:1px solid black">
            <p style="text-align: center; margin-left:180px;">
                        <strong>AN: <?php echo  $row["annee_naisse"] ?></strong> <br> <strong><?php echo  $row["id"] ?></strong> <br> N° dans le registre <br> en chiffres
</p>
            </td>
        </tr>
        
        <tr>
            <td style="border-top:1px solid black ; padding:10px;">
            <strong style="text-align: left;">l'an deux mille vingt, le dix-sept du mois de <?php echo  $row["mois_naisse"] ?></strong><br><br><br>
            est né(e) à <b> <?php echo  $row["lieu_naisse"] ?></b><br>
            <i style="margin-left: 50px;">(4) LIEU DE NAISSANCE </i><br>
            <div style="text-align: left;">un enfant de sexe <b> <?php echo  $row["sexe"] ?></b></div> <br>
            <strong style="margin-left: 50px;"><?php echo  $row["prenom_nouvne"] ?></strong><br>
            <i style="margin-left: 45px;"> PRENOM(S) </i><br><br>
            de <span style="margin-left: 30px;"> <?php echo  $row["prenom_pere"] ?></span><br><br>
            <i style="margin-left: 50px;">PRENOM(S) DU PERE</i><br><br>
            et de <span style="margin-left: 17px;"> <?php echo  $row["prenom_mere"] ?></span><br><br>
            <i style="margin-left: 50px;">PRENOM(S) DU LA MERE</i><br><br>
            Le pays de naissance pour les naissances à l'étranger
            </td>
            <td style="border-top:1px solid black ; padding:10px;">
                 à: <b><?php echo  $row["heure_naisse"] ?></b><br>
                 <i>HEURE DE NAISSANCE</i> <br><br><br>
                 <strong><?php echo  $row["nom_nouvne"] ?></strong><br>
                 <i>NOM DE FAMILLE</i> <br><br><br><br><br><br>
                 <?php echo  $row["nom_mere"] ?><br><br>
                 <i>NOM DE FAMILLE DE LA MERE</i>
            </td>
        </tr>
        <tr>
            <td style="border-top:1px solid black ; padding:10px;">
                    MENTIONS MARGINALES <br>
                    <span style="margin-top:200px;">EXTRAIT DELIVRE PAR LE CENTRE PRINCIPAL: <br>RUFISQUE-EST</span><br>
                <span style="margin-top:150px;">RESERVER                   
                <img style="height:35px; width: 200px;" alt='Barcode Generator TEC-IT' src='barre.png' /><br><br><br>
                <img style="height:35px; width: 200px;" alt='Barcode Generator TEC-IT' src='barre.png' />
                </span>
                    
            </td>
            <td style="border-top:1px solid black ; padding:10px;">
            <span style="margin-top:0px;">POUR EXTRAIT CERTIFIE ET CONFORME <br>
                    Fait à RUFISQUE-EST LE <?php
                    // Return current date from the remote server
                    $date = date('d-M-Y');
                    echo $date;
                    ?> <br>
                    L'officier de l'Etat-civil soussigné <br></span>
            </td>
        </tr>

    </table>
</body>

<?php

$html = ob_get_clean();

$html2pdf->writeHTML($html);
$html2pdf->output('mon_pdf.pdf');

?>